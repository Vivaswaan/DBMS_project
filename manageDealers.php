<!DOCTYPE html>
<html>
<head>
    <title>Manage Dealers</title>
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

<p class="h4 my-3 text-center"  style='color: #4d3d01; font-family: sans serif; font-size: 2.0rem;'>Manage Dealers</p>
<hr>

<div class="container">


    <a href='addDealers.php' class="mb-3 float-right">
        <button type='button' class='btn btn-success' style='background-color:#36210e; color: blanchedalmond;'>Add Dealers</button>
    </a>

    <table class='table table-warning'>
        <thead class='table-danger'>
        <tr>

            <th scope='col '>Dealers name</th>
            <th class='text-center' scope='col'>Company</th>
            <th class='text-center' scope='col'>Address</th>
            <th class='text-center' scope='col'>Email</th>
            <th class='text-center' scope='col'>Contact Number</th>

        </tr>
        </thead>
        <tbody>

        <?php


        $sql_dealers = "SELECT * FROM dealers";
        $query_dealers = mysqli_query($con, $sql_dealers);

        if (mysqli_num_rows($query_dealers) > 0) {

            while ($dealers = mysqli_fetch_assoc($query_dealers)) {

                $id = $dealers['id'];
                $skey = $dealers['skey'];
                $dealers_name = $dealers['d_name'];
                $company_name = $dealers['company'];
                $address = $dealers['address'];
                $email = $dealers['email'];
                $phone = $dealers['phone'];
                $email = $dealers['email'];

                echo "<tr>						
										
                <td class=''><b>$dealers_name</b></td>
				<td class='text-center'>$company_name</td> 
				<td class='text-center'>$address</td>
				<td class='text-center'>$email</td>
				<td class='text-center'>$phone</td>";
            }
        }
        ?>
        </tr>
        </tbody>
    </table>
</div>
<script src="js/script.js"></script>
</body>
</html>


					
						
