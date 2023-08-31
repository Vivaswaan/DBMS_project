<!DOCTYPE html>
<html>
<head>
    <title>Manage Employees</title>
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

<p class="h4 my-3 text-center">Manage Employees</p>
<hr>

<div class="container">


    <a href='addEmployee.php' class="mb-3 float-right">
        <button type='button' class='btn btn-success' style='background-color:#36210e; color: blanchedalmond;'>Add Employees</button>
    </a>

    <table class='table table-warning'>
        <thead class='table-danger'>
        <tr>

            <th class='text-center' scope='col'><b>Employee ID</b></th>
            <th class='text-center' scope='col'>Employee Name</th>
            <th class='text-center' scope='col'>Manager ID</th>
        </tr>
        </thead>
        <tbody>

        <?php


        $sql_dealers = "SELECT * FROM employee";
        $query_dealers = mysqli_query($con, $sql_dealers);

        if (mysqli_num_rows($query_dealers) > 0) {

            while ($dealers = mysqli_fetch_assoc($query_dealers)) {

                $emp_id = $dealers['emp_id'];
                $emp_name = $dealers['name'];
                $super_id = $dealers['super_id'];

                if($super_id === NULL)
                    $super_id='-';

                echo "<tr>						
										
                <td class='text-center'><b>$emp_id</b></td>
				<td class='text-center'>$emp_name</td> 
				<td class='text-center'>$super_id</td>";
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


					
						