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

date_default_timezone_set('Asia/Kolkata');
$today = date('d-m-Y');

echo "<p class='h4 my-3 text-center' style='color: #4d3d01; font-family: sans serif; font-size: 2.0rem;'>All Products</p><hr>";
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 pb-2">
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










