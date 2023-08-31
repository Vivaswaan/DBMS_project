<?php

include "connection/connect.php";

if (isset($_POST['mno']) && isset($_POST['password'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);

       return $data;
    }

    $uname = validate($_POST['mno']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=Username is required");
        exit();
    }else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM employees WHERE username='$uname' AND u_password='$pass'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {            
                header("Location: index1.php");
                exit();
            
        }else{
            header("Location: index.php?error=Incorrect Username or password");
            exit();
        }
    } 
}else{
    header("Location: index.php");
    exit();
}
?>