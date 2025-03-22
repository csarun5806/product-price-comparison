<?php
<<<<<<< HEAD
include 'db.php';

=======
include 'db.php'; // Database connection

// Fetch products
>>>>>>> f166ed1b50af1acb5b0870695acd8f5b2b0032b1
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
<<<<<<< HEAD
        <div class="col-md-4 mb-4 product-card" data-category="'.$row["category"].'" data-brand="'.$row["brand"].'">
            <div class="card shadow-lg border-0">
                <img src="'.$row["image"].'" class="card-img-top" alt="'.$row["name"].'" style="height:250px; object-fit:cover; border-radius:10px;">
                <div class="card-body text-center">
                    <h5 class="card-title font-weight-bold text-primary">'.$row["name"].'</h5>
                    <p class="card-text text-muted">Brand: <strong>'.$row["brand"].'</strong></p>
                    <p class="card-text text-success fw-bold">Flipkart: ₹'.$row["price_flipkart"].'</p>
                    <p class="card-text text-danger fw-bold">Amazon: ₹'.$row["price_amazon"].'</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="'.$row["url_flipkart"].'" class="btn btn-outline-primary btn-sm" target="_blank">Buy on Flipkart</a>
                        <a href="'.$row["url_amazon"].'" class="btn btn-outline-warning btn-sm" target="_blank">Buy on Amazon</a>
                    </div>
                    <button class="btn btn-info btn-sm mt-2 price-alert" data-product="'.$row["id"].'">Set Price Alert</button>
=======
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
>>>>>>> f166ed1b50af1acb5b0870695acd8f5b2b0032b1
                </div>
            </div>
        </div>';
    }
} else {
<<<<<<< HEAD
    echo '<p class="text-center text-danger">No products found.</p>';
}
?>

<script>
    $(document).ready(function(){
        $(".price-alert").click(function(){
            var productId = $(this).data("product");

            $.post("price_alert.php", { product_id: productId }, function(response){
                var data = JSON.parse(response);
                alert(data.message);
            });
        });
    });
</script>
=======
    echo "<p>No products found.</p>";
}
?>
>>>>>>> f166ed1b50af1acb5b0870695acd8f5b2b0032b1
