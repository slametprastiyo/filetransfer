<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->library('pagination');
        $this->load->helper('url'); // For site_url()
    }

    /**
     * Displays the list of products with filtering, sorting, and pagination.
     */
    public function index()
    {
        // 1. Get Filter Parameters from URL
        $category = $this->input->get('category');
        $sort_by = $this->input->get('sort_by');

        // Prepare filter conditions for the model
        $filters = [];
        if ($category) {
            $filters['category'] = $category;
        }

        // Prepare sort order for the model
        $order_by = null;
        if ($sort_by) {
            switch ($sort_by) {
                case 'price_asc':
                    $order_by = ['price' => 'ASC'];
                    break;
                case 'price_desc':
                    $order_by = ['price' => 'DESC'];
                    break;
                case 'date_asc':
                    $order_by = ['date_added' => 'ASC'];
                    break;
                case 'date_desc':
                    $order_by = ['date_added' => 'DESC'];
                    break;
            }
        }

        // 2. Pagination Configuration
        $config['base_url'] = site_url('products/index');

        // Get current GET parameters to persist filters in pagination links
        $get_params = $this->input->get();
        // Crucially, unset the 'page' parameter so CI's pagination library can add it cleanly
        unset($get_params['page']);

        if (!empty($get_params)) {
            $config['base_url'] .= '?' . http_build_query($get_params);
        }

        $config['total_rows'] = $this->product_model->count_products($filters);
        $config['per_page'] = 5; // Number of items per page

        $config['page_query_string'] = TRUE; // Use GET parameter for page number
        $config['query_string_segment'] = 'page'; // The GET parameter name for pagination ('?page=X')
        $config['use_page_numbers'] = TRUE; // Makes links use 1, 2, 3... instead of 0, 5, 10...

        // --- Pagination Styling Removed for Custom CSS ---
        // $config['full_tag_open'] = '<ul class="pagination">';
        // $config['full_tag_close'] = '</ul>';
        // ... (etc. - all styling config lines are removed/commented out) ...
        // --- END REMOVAL ---

        $this->pagination->initialize($config);

        // Calculate the actual database offset based on 1-based page number
        $page_number = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $offset = ($page_number - 1) * $config['per_page'];

        // 3. Get Products with Filters, Sorting, and Pagination
        $data['products'] = $this->product_model->get_products($config['per_page'], $offset, $filters, $order_by);
        $data['pagination_links'] = $this->pagination->create_links();

        // Pass current filter/sort values back to the view for highlighting active links
        $data['current_category'] = $category;
        $data['current_sort_by'] = $sort_by;

        // Pass all unique categories to the view for generating filter links
        $data['all_categories'] = $this->product_model->get_categories();

        // 4. Load View
        $this->load->view('products/index', $data);
    }

    /**
     * Displays details of a single product.
     * Accessible via: http://localhost/smpq/products/view/PRODUCT_ID
     *
     * @param int $id The ID of the product to display.
     */
    public function view($id = null)
    {
        if ($id === null || !is_numeric($id)) {
            // Handle case where no ID is provided or ID is not valid
            show_404(); // Display CodeIgniter's 404 page
        }

        $data['product'] = $this->product_model->get_product_by_id($id);

        if (empty($data['product'])) {
            // Product not found
            show_404(); // Display CodeIgniter's 404 page
        }

        // Load a new view to display product details
        $this->load->view('products/details', $data);
    }
}