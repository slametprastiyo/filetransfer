<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for pagination links (since CI's styling was removed) */
        .my-pagination-links {
            text-align: center;
            margin-top: 20px;
        }
        .my-pagination-links a,
        .my-pagination-links strong {
            display: inline-block;
            padding: 8px 12px;
            margin: 0 4px;
            border: 1px solid #ccc;
            text-decoration: none;
            color: #333;
            border-radius: 4px;
            transition: background-color 0.2s ease;
        }
        .my-pagination-links strong { /* Active page */
            background-color: #007bff;
            color: white;
            border-color: #007bff;
            font-weight: bold;
        }
        .my-pagination-links a:hover {
            background-color: #eee;
        }

        .product-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .filter-section {
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
        }
        .list-inline-item .btn {
            white-space: nowrap; /* Prevent buttons from wrapping text */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Product Catalog</h1>

        <div class="filter-section">
            <h5>Filter by Category:</h5>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <?php
                    // URL for "All Categories" link
                    $clear_category_params = $this->input->get();
                    unset($clear_category_params['category']); // Remove category filter
                    unset($clear_category_params['page']); // Reset page to 1
                    $clear_category_url = site_url('products/index') . (!empty($clear_category_params) ? '?' . http_build_query($clear_category_params) : '');
                    ?>
                    <a href="<?php echo $clear_category_url; ?>" class="btn btn-sm <?php echo empty($current_category) ? 'btn-primary' : 'btn-outline-primary'; ?>">All</a>
                </li>
                <?php foreach ($all_categories as $cat_row): ?>
                    <li class="list-inline-item">
                        <?php
                        $category_name = $cat_row['category'];
                        $cat_params = $this->input->get(); // Start with current GET parameters
                        $cat_params['category'] = $category_name; // Set the new category
                        unset($cat_params['page']); // Reset page to 1 for a new filter/sort
                        $cat_url = site_url('products/index') . '?' . http_build_query($cat_params);
                        ?>
                        <a href="<?php echo $cat_url; ?>" class="btn btn-sm <?php echo ($current_category == $category_name) ? 'btn-primary' : 'btn-outline-primary'; ?>">
                            <?php echo $category_name; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="filter-section mb-4">
            <h5>Sort By:</h5>
            <ul class="list-inline">
                <?php
                $sort_options = [
                    'Default (ID)' => '', // Empty value clears the sort_by parameter
                    'Price (Low to High)' => 'price_asc',
                    'Price (High to Low)' => 'price_desc',
                    'Date Added (Oldest First)' => 'date_asc',
                    'Date Added (Newest First)' => 'date_desc'
                ];

                foreach ($sort_options as $label => $value):
                    $sort_params = $this->input->get(); // Start with current GET parameters
                    if (empty($value)) {
                        unset($sort_params['sort_by']); // Remove sort_by param for 'Default'
                    } else {
                        $sort_params['sort_by'] = $value; // Set the new sort order
                    }
                    unset($sort_params['page']); // Reset page to 1 for a new filter/sort
                    $sort_url = site_url('products/index');
                    if (!empty($sort_params)) {
                        $sort_url .= '?' . http_build_query($sort_params);
                    }
                ?>
                    <li class="list-inline-item">
                        <a href="<?php echo $sort_url; ?>" class="btn btn-sm <?php echo ($current_sort_by == $value) ? 'btn-primary' : 'btn-outline-primary'; ?>">
                            <?php echo $label; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="row">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-md-6">
                        <div class="product-item">
                            <h5><a href="<?php echo site_url('products/view/' . $product->id); ?>"><?php echo $product->name; ?></a></h5>
                            <p><strong>Category:</strong> <?php echo $product->category; ?></p>
                            <p><strong>Price:</strong> $<?php echo number_format($product->price, 2); ?></p>
                            <small>Added on: <?php echo date('Y-m-d H:i:s', strtotime($product->date_added)); ?></small>
                            <p><?php echo substr($product->description, 0, 100); ?>...</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p>No products found with the applied filters.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="mt-4 my-pagination-links">
            <?php echo $pagination_links; ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>