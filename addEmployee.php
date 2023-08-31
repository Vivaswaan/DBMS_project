<!DOCTYPE html>
<html>
<head>
	<title>Add Employees</title>
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

echo "
<p class='h4 text-center my-3 '>Add New Employee</p><hr>";

if(isset($_POST['submit'])){

    // Escape user inputs for security
    $emp_name = mysqli_real_escape_string($con, $_POST['name']);
    $emp_id = mysqli_real_escape_string($con, $_POST['emp_id']);
    $super_id = mysqli_real_escape_string($con, $_POST['super_id']);


    $Empcheck = "SELECT * FROM employee WHERE `emp_id` = '$emp_id' AND `name` = '$emp_name'";

    $query = mysqli_query($con, $Empcheck);

    if(mysqli_num_rows($query)>0){
        echo "<div class='container'>
				<div class='row'>
				<h4 style='background: #B71C1C; color:#ffffff' class='col-md-12 py-3 btn btn-block mb-4'>This employee is already present!!</h4></div></div>";
    }else{
        $sql_dealer = "INSERT INTO employee VALUES ('$emp_id', '$emp_name', '$super_id')";
        mysqli_query($con, $sql_dealer);
        echo "<div class='container'>
				<div class='row'>
				<div style='background: #0091EA; color:#ffffff' class='col-md-12 py-3 btn  btn-block mb-4'> Employee Added Successfully.</div></div></div>";
    }
}
?>

<div class="container">	
	<form class="text-center  border-light  " action="addEmployee.php" method="post">

        <div class="form-row mb-4">
            <div class="col">
                <!-- Institution's name -->
                <input type="text" value="" name="name" class="form-control" placeholder="Employee Name *" required>
            </div>
            <div class="col">
                <!-- Class -->
                <input type="text" value="" name="emp_id" class="form-control" placeholder="Employee ID *" required>
            </div>
            <div class="col">
                <!-- Class -->
                <input type="text" value="" name="super_id" class="form-control" placeholder="Manager ID *" required>
            </div>
        </div>
        <input class="btn btn-info my-4" name="submit" type="submit" value="Submit" style='background-color:#36210e; color: blanchedalmond;'>        
    </form>

</div>
<script src="js/script.js"></script>
</body>
</html>