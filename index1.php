<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
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

?>
<p class='h4 my-3 text-center' style='color: #4d3d01; font-family: sans serif; font-size: 2.0rem;'>Products</p><hr>
<div class="container">
    <table class='table table-warning'>
        <thead class='table-danger'>
            <tr>
                <th class='text-center' scope='col'>Product Name</th>
                <th class='text-center' scope='col'>Total Production</th>
                <th class='text-center' scope='col'>Total Sold</th>
                <th class='text-center' scope='col'>Total Remaining</th>
            </tr>
        </thead>
        <tbody>

        <?php

        $record = "SELECT * FROM products";
        $query = mysqli_query($con, $record);
        if (mysqli_num_rows($query) > 0) {
            while ($data = mysqli_fetch_assoc($query)) {

                //AND DATE_FORMAT(record_date, '%Y %m %d') = DATE_FORMAT('$today', '%Y %m %d')
                $product_id = $data['id'];
                $p_name = $data['p_name'];

                $check_production = "SELECT * FROM daily_records WHERE `products_id` = '$product_id'  GROUP BY products_id";
                $query_production = mysqli_query($con, $check_production);
                if (mysqli_num_rows($query_production) > 0) {
                    while ($daily = mysqli_fetch_assoc($query_production)) {

                        //todays calculations
                        $sql_count_today = "SELECT SUM(sell) AS total_sell, SUM(production) AS total_production FROM daily_records  WHERE `products_id` = '$product_id'";
                        $query_count_today = mysqli_query($con, $sql_count_today);
                        $count_today = mysqli_fetch_assoc($query_count_today);

                        $sell = $count_today['total_sell'];
                        $production = $count_today['total_production'];
                        $remaining = $production - $sell;

                        echo "<tr>
                                <td class='text-center'>$p_name</td>
                                <td class='text-center'>$production</td>
                                <td class='text-center'>$sell</td>
                                <td class='text-center'>$remaining</td>";
                    }
                }
            }
        }
        ?>
        </tr>
        </tbody>
    </table>
</div>
</div>

<script src="js/script.js"></script>
</body>
</html>
