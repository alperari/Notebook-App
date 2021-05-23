<?php
    include "../config.php";
    session_start();


    $my_uid = $_SESSION['uid']   ;
    $my_username = $_SESSION['username']  ;
    $my_fullname = $_SESSION['fullname']  ;
    $my_email = $_SESSION['email']  ;



    if(isset($_POST["fullname"])){
        if($_POST["fullname"]!=""){
            $new_name = $_POST["fullname"];
            $update_query = "UPDATE users SET name = '$new_name' WHERE uid = " . $my_uid;
            if(mysqli_query($db,$update_query)){
                echo "YES";
                $_SESSION["fullname"] = $new_name;
            }
        }
        else {
            echo "NO";
        }
        
    }
    if(isset($_POST["username"])){
        if($_POST["username"] != ""){
            $new_name = $_POST["username"];
            $update_query = "UPDATE users SET nickname = '$new_name' WHERE uid = " . $my_uid;
            if(mysqli_query($db,$update_query)){
                echo "YES";
                $_SESSION["username"] = $new_name;
            }
        }
        else {
            echo "NO";
        }
        
    }
    if(isset($_POST["fullname"])){
        if($_POST["fullname"]!= ""){
            $new_name = $_POST["fullname"];
            $update_query = "UPDATE users SET name = '$new_name' WHERE uid = " . $my_uid;
            if(mysqli_query($db,$update_query)){
                echo "YES";
                $_SESSION["fullname"] = $new_name;
            }
        }
        else {
            echo "NO";
        }
        
    }
    if(isset($_POST["email"])){
        if($_POST["email"] != ""){
            $new_email = $_POST["email"];
            $update_query = "UPDATE users SET e_mail = '$new_email' WHERE uid = " . $my_uid;
            if(mysqli_query($db,$update_query)){
                echo "YES";
                $_SESSION["email"] = $new_email;
            }
        }
        else {
            echo "NO";
        }
        
    }
    if(isset($_POST["password"])){
       if($_POST["password"]!=""){
            $new_password = $_POST["password"];
            $update_query = "UPDATE users SET pwd = '$new_password' WHERE uid = " . $my_uid;
            if(mysqli_query($db,$update_query)){
                echo "YES";
                $_SESSION["password"] = $new_password;
            }
       }
        else {
            echo "NO";
        }
        
    }
    header("Location: ../profile.php",true);

?>