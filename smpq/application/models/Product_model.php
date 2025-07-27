<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Retrieves a list of products with optional filters, sorting, and pagination.
     *
     * @param int $limit Number of records per page.
     * @param int $start Offset for pagination.
     * @param array $filters Associative array of filters (e.g., ['category' => 'Electronics']).
     * @param array|null $order_by Associative array for sorting (e.g., ['price' => 'ASC']).
     * @return array Array of product objects.
     */
    public function get_products($limit, $start, $filters = [], $order_by = null)
    {
        $this->db->select('*');
        $this->db->from('products');

        // Apply Filters
        if (!empty($filters)) {
            foreach ($filters as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        // Apply Sorting
        if (!empty($order_by)) {
            foreach ($order_by as $column => $direction) {
                $this->db->order_by($column, $direction);
            }
        }

        // Apply Pagination Limit
        $this->db->limit($limit, $start);

        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Counts the total number of products with optional filters.
     *
     * @param array $filters Associative array of filters.
     * @return int Total count of products.
     */
    public function count_products($filters = [])
    {
        $this->db->from('products');

        // Apply Filters
        if (!empty($filters)) {
            foreach ($filters as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        return $this->db->count_all_results();
    }

    /**
     * Retrieves a list of all unique categories from the products table.
     *
     * @return array Array of associative arrays, each containing a 'category' key.
     */
    public function get_categories()
    {
        // Use FALSE as the second argument to prevent CI from quoting 'DISTINCT category'
        $this->db->select('DISTINCT category', FALSE);
        $this->db->from('products');
        $this->db->order_by('category', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Retrieves a single product by its ID.
     *
     * @param int $product_id The ID of the product to retrieve.
     * @return object|null Returns the product object if found, otherwise null.
     */
    public function get_product_by_id($product_id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('id', $product_id);
        $query = $this->db->get();

        return $query->row(); // Returns object or NULL if not found
    }
}