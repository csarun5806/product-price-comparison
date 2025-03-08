<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Price Comparison</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your custom CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Product Price Comparison</h1>
    </header>

    <div class="container mt-4">
        <!-- Filters Section -->
        <div class="row">
            <div class="col-md-4">
                <input type="text" id="search" class="form-control" placeholder="Search for products...">
            </div>
            <div class="col-md-4">
                <select id="category-filter" class="form-control">
                    <option value="">Select Category</option>
                    <option value="Smartphone">Smartphone</option>
                    <option value="Watch">Watch</option>
                    <option value="Laptop">Laptop</option>
                    <option value="Shoes">Shoes</option>
                </select>
            </div>
            <div class="col-md-4">
                <select id="brand-filter" class="form-control">
                    <option value="">Select Brand</option>
                    <option value="Apple">Apple</option>
                    <option value="Samsung">Samsung</option>
                    <option value="Nike">Nike</option>
                    <option value="Puma">Puma</option>
                    <option value="Fastrack">Fastrack</option>
                    <option value="Timex">Timex</option>
                </select>
            </div>
        </div>

        <!-- Products Section -->
        <div class="row mt-4" id="product-list">
            <?php
            include 'fetch_products.php'; // Fetch and display products
            ?>
        </div>
    </div>

    <footer>
        <p>© 2025 Product Price Comparison. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script> <!-- Link to your script.js for search/filtering -->
</body>
</html>
