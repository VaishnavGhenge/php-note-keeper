<?php
    include "connection.php";
    session_start();
    if(isset($_POST["email"]) && isset($_POST["pass"])){
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $rpass="";
        $sql="SELECT password FROM useracc WHERE email='$email'";
        $result = mysqli_query($conn,$sql);
        foreach($result as $row){
         $rpass= $row['password'];
        }
        if($rpass==$pass){
            $_SESSION["user"]=$email;
            header("Location: home.php");
        }
        else{
            echo "<script>alert('Oops! Incorrect email or password');window.location.replace('login.php')</script>";

        }


    }

?>
