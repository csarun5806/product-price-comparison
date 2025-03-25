<<<<<<< HEAD
<?php
session_start();
include 'db.php';


    if(isset($_SESSION['login']) && $_SESSION['login'] != 1)
    {
        // Unset all session variables
        session_unset();
        
        // Destroy the session
        session_destroy();

        header("Location: index.php");exit();
        
    }



// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

=======
<!DOCTYPE html>
<html lang="en">
>>>>>>> f166ed1b50af1acb5b0870695acd8f5b2b0032b1
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Price Comparison</title>
<<<<<<< HEAD
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Price Comparison</a>
                <!-- Login & Signup Buttons -->





                    <?php if(isset($_SESSION['login']) && $_SESSION['login'] == 1){?>
                        <div class="d-flex">
                            <p class='text-dark px-2 m-0 p-2'><?= $_SESSION['username']?></p>
                            <a href="logout.php" class="btn btn-outline-danger">Logout</a>
                        </div>
                    <?php }else { ?>
                        <div class="d-flex ms-auto">
                            <a href="login.php" class="btn btn-outline-primary me-2">Login</a>
                            <a href="signup.php" class="btn btn-outline-success">Signup</a>
                        </div>
                    <?php } ?>

            </div>
        </nav>
    </header>

    <div id="home-content">
    <?php
// Display alert message if available
if (isset($_SESSION['alert_message'])) {
    echo '<div class="alert alert-success text-center">'.$_SESSION['alert_message'].'</div>';
    unset($_SESSION['alert_message']); // Clear message after displaying
}
?>

        <!-- Instruction Section -->
        <div class="container text-center mt-4">
            <h2>Find the Best Deals!</h2>
            <p>Compare prices from Amazon & Flipkart and get the best offers.</p>
        </div>

        <!-- Product Filter/Search Section -->
        <div class="container my-4 text-center">
            <div class="d-flex justify-content-center">
                <!-- Search Bar -->
                <input type="text" id="search" class="form-control w-25 me-2" placeholder="Search Products...">
                <!-- Category Filter -->
                <select id="category-filter" class="form-select w-25 me-2">
                    <option value="">Filter by Category</option>
                    <option value="Watch">Watches</option>
                    <option value="Smartphone">Smartphones</option>
                    <option value="Laptop">Laptops</option>
                    <option value="Shoes">Shoes</option>
                </select>
                <!-- Brand Filter -->
                <select id="brand-filter" class="form-select w-25">
                    <option value="">Filter by Brand</option>
                    <option value="Apple">Apple</option>
                    <option value="Samsung">Samsung</option>
                    <option value="Nike">Nike</option>
                    <option value="Titan">Titan</option>
                </select>
            </div>

            <!-- Product Listing Section -->
            <div class="row mt-4" id="product-list">
                <?php if ($result->num_rows > 0) :
                    while ($row = $result->fetch_assoc()) :
                ?>
                        <div class="col-md-4 mb-4 product-card" data-category="<?= $row['category'] ?>" data-brand="<?= $row['brand'] ?>">
                            <div class="card shadow-lg border-0">
                                <img src="<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['name'] ?>" style="block-size:250px; object-fit:cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-dark"><?= $row['name'] ?></h5>
                                    <p class="card-text text-secondary">Brand: <?= $row['brand'] ?></p>
                                    <p class="card-text text-success">Flipkart: ₹<?= $row['price_flipkart'] ?></p>
                                    <p class="card-text text-danger">Amazon: ₹<?= $row['price_amazon'] ?></p>

                                    <div class="row mb-3">
                                    <div class="col text-center">
                                        <a href="<?= $row['url_flipkart'] ?>" class="btn btn-warning" target="_blank">Buy on Flipkart</a>
                                    </div>
                                    <div class="col text-center">
                                        <a href="<?= $row['url_amazon'] ?>" class="btn btn-warning" target="_blank">Buy on Amazon</a>
                                    </div>
                                        </div>

                                      <!-- Set Price Alert Button Centered Below -->
                                    <div class="row">
                                        <div class="col text-center">
                                            <form action="set_price_alert.php" method="POST">
                                                <button type="submit" name="setPriceAlert" class="btn btn-warning">Set Price Alert</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                <?php endwhile;
                else :
                    echo "<p class='text-danger text-center'>No products found.</p>";
                endif; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="js/script.js"></script>
</body>

=======
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
>>>>>>> f166ed1b50af1acb5b0870695acd8f5b2b0032b1
</html>
