<?php
include 'db.php'; // Database connection

// Fetch products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="col-md-4 mb-4 product-card" data-brand="'.$row["brand"].'" data-category="'.$row["category"].'">
            <div class="card shadow">
                <img src="'.$row["image"].'" class="card-img-top" alt="'.$row["name"].'" style="height:250px; object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title text-dark">'.$row["name"].'</h5>
                    <p class="card-text text-secondary">Brand: '.$row["brand"].'</p>
                    <p class="card-text text-success">Flipkart: ₹'.$row["price_flipkart"].'</p>
                    <p class="card-text text-danger">Amazon: ₹'.$row["price_amazon"].'</p>
                    <a href="'.$row["url_flipkart"].'" class="btn btn-primary" target="_blank">Buy on Flipkart</a>
                    <a href="'.$row["url_amazon"].'" class="btn btn-warning" target="_blank">Buy on Amazon</a>
                </div>
            </div>
        </div>';
    }
} else {
    echo "<p>No products found.</p>";
}
?>
