<!DOCTYPE html>
<html>
<head>
    <title>Manage Products</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>


<?php
include "connection/connect.php";
include "sideNav.php";
include "header.php";

if (isset($_POST['addProduct'])) {

    $productsName = mysqli_real_escape_string($con, $_POST['productsName']);
    $price = mysqli_real_escape_string($con, $_POST['price']);


    $product = "SELECT * FROM products WHERE `p_name` = '$productsName' ";

    $query = mysqli_query($con, $product);

    if (mysqli_num_rows($query) > 0) {

        echo "<div class='container'>
				<div class='row'>
				<h4 style='background: #d50000; color:#ffffff' class='col-md-12 py-3 btn btn-block mb-4'>This Product has been Already Added!!!</h4></div></div>";
    } else {
        $add_products = "INSERT INTO products ( p_name, unit_price) 
				
						VALUES ('$productsName', '$price')";
        mysqli_query($con, $add_products);

        echo "<div class='container'>
				<div class='row'>
				<div style='background: #0091EA; color:#ffffff' class='col-md-12 py-3 btn  btn-block mb-4'> Product Added Successfully.</div></div></div>";


    }

}

if (isset($_POST['update_product_info'])){

    for ($i = 0; $i < sizeof($_POST['p_id']); $i++) {

        $p_id = mysqli_real_escape_string($con, $_POST['p_id'][$i]);
        $p_name = mysqli_real_escape_string($con, $_POST['productsName'][$i]);
        $u_price = mysqli_real_escape_string($con, $_POST['price'][$i]);

        $update_prod_info = "UPDATE products SET p_name = '$p_name', unit_price = '$u_price' WHERE id = '$p_id'";

        mysqli_query($con, $update_prod_info);


    }
    echo "<div class='container'>
			<div class='row'>
				<div style='background: #0091EA; color:#ffffff' class='col-md-12 py-3 btn  btn-block mb-4'> Product Info Updated Successfully .
			    </div>
			</div>
		  </div>";



}

date_default_timezone_set('Asia/Kolkata');
$today = date('d-m-Y');

echo "<p class='h4 my-3 text-center' style='color: #4d3d01; font-family: sans serif; font-size: 2.0rem;'>All Products</p><hr>";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 pb-2">
        <a href='addProducts.php' class="mb-3 float-right btn btn-success">Add Products</a>
            <a href='updateProducts.php' class="mb-3 mx-1 float-right btn btn-success">Update Products Info</a>
            <table class='table table-warning'>
                <thead class='table-danger'>
                <tr>
                    <th scope='col '>No.</th>
                    <th scope='col '>Products Name</th>
                    <th class='text-center' scope='col'>Price</th>
                </tr>
                </thead>
                <tbody>
                <?php

                $sql_products = "SELECT * FROM products";
                $query_products = mysqli_query($con, $sql_products);

                if (mysqli_num_rows($query_products) > 0) {
                    while ($product = mysqli_fetch_assoc($query_products)) {

                        $id = $product['id'];
                        $name = $product['p_name'];
                        $price = $product['unit_price'];

                        

                        echo "
								<tr>
									<td class=''><b>#$id</b></td>
									<td class=''>$name</td>
									<td class='text-center'><b>₹ $price </b></td>
											
								</tr>
							";
                    }

                }

                ?>

                </tbody>
            </table>

        </div>


    </div>
</div>
</div>

<script src="js/script.js"></script>

</body>
</html>










