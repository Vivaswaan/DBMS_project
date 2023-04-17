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
    <script>
function func() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</head>

<style>
  div.transbox{
    width:  35%;
    margin: 100px;
    background-color: #1e1e1e;
    border: 0.5px solid black;
    opacity: 0.95;
    padding: 1.5% 1.5% 1.5% 1.5%;
 }
</style>

<?php
include "connection/connect.php";
include "header.php";

?>

<body style=" 
    background-position: center;
    background-image: url('images/bg_2.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    color: #c9b98b;">

<div align="center" style="font-size: 135%;">
<div class='transbox'>
<form action='login.php' method="post">
Enter your credentials:
<br>
<?php if (isset($_GET['error'])) { ?>

<p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>
<br>
Employee ID: <input type="text" name="mno" style="background-color: #59391d; color: #c9b98b;" required><br><br>
Password: <input type="password" name="password" required id="myInput" style="background-color: #59391d; color: #c9b98b;"><br><br>
<input type="checkbox" name="visible" onclick="func()" style="height: 25px; width: 25px; vertical-align: middle; position: middle; background-color: #36210e;"> Show Password <br><br>

<input type="submit" id="but" value="Login"></a>
</form>


</div>
</div>

<script src="js/script.js"></script>
</body>
</html>
