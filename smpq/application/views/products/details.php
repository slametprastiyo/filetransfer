<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product->name; ?> - Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2><?php echo $product->name; ?></h2>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> <?php echo $product->id; ?></p>
                <p><strong>Category:</strong> <?php echo $product->category; ?></p>
                <p><strong>Price:</strong> $<?php echo number_format($product->price, 2); ?></p>
                <p><strong>Description:</strong></p>
                <p><?php echo $product->description; ?></p>
                <p><small>Added on: <?php echo date('Y-m-d H:i:s', strtotime($product->date_added)); ?></small></p>
            </div>
            <div class="card-footer">
                <a href="<?php echo site_url('products'); ?>" class="btn btn-secondary">Back to Products List</a>
            </div>
        </div>
    </div>
</body>
</html>