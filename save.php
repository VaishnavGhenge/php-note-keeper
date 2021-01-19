<?php
    include "connection.php";
    session_start();
    $email = $_SESSION['email'];
    $password = $_POST['pass'];
    $cpasword = $_POST['cpass'];
    $rpass="";
    $sql="SELECT password FROM useracc WHERE email='$email'";
    $result = mysqli_query($conn,$sql);
    foreach($result as $row){
        $rpass= $row['password'];
    }

    if($rpass==null){
        if ($password==$cpasword){
            $sql="INSERT INTO useracc VALUES ('$email','$password')";
            $result = mysqli_query($conn,$sql);
            if ($result){
                echo "<script>alert('Account Created Successfully');window.location.replace('login.php')</script>";
            }
        }
        else{
            echo "<script>alert('Oops! Password not matched!');window.location.replace('set_pass.php')</script>";
        }
    }
    else{
        if ($password==$cpasword){
            $sql="UPDATE useracc set password='$password' WHERE email='$email'";
            $result = mysqli_query($conn,$sql);
            if ($result){
                echo "<script>alert('Password Changed Successfully');window.location.replace('login.php')</script>";
            }
        }
        else{
            echo "<script>alert('Oops! Password not matched!');window.location.replace('set_pass.php')</script>";
        }

    }


?>
