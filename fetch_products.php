<?php
include 'db.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '
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
                </div>
            </div>
        </div>';
    }
} else {
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
