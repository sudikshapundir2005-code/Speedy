<?php
include "db.php";

if(isset($_POST['order'])){

    $name = $_POST['name'];
    $address = $_POST['address'];
    $total = $_POST['total'];

    mysqli_query($conn,
    "INSERT INTO orders(customer_name,address,total_amount)
    VALUES('$name','$address','$total')");

    echo "🎉 Order Placed Successfully!";
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 shadow p-5 bg-white rounded border">
            <h2 class="text-center mb-4">📦 Checkout</h2>
            <form method="POST" action="place_orders.php">
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" required placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Current Address</label>
                    <div class="input-group">
                        <textarea id="address" name="address" class="form-control" rows="3" required></textarea>
                        <button type="button" class="btn btn-info text-white" onclick="getLocation()">📍 Detect</button>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100 btn-lg">Place Order</button>
            </form>
        </div>
    </div>
</div>

<script>
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((pos) => {
            document.getElementById("address").value = "Lat: " + pos.coords.latitude + ", Lon: " + pos.coords.longitude;
        });
    } else { alert("Geolocation not supported."); }
}
</script>

<script>
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((pos) => {
            document.getElementById("address").value = "Lat: " + pos.coords.latitude + ", Lon: " + pos.coords.longitude;
        });
    }
}
</script>
</button>