<?php
    include "config.php";
    //echo $_POST["username"];
    if ($_POST['username']) {
        # code...
        $username = $_POST["username"];
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password_confirm = $_POST["password-confirm"];

        if($password != $password_confirm)
            header ("Location: register.html");

        

       else{
        echo $fullname . " hello to the system". "<br>" .
        "email" . $email ."<br>" .
        "name: " . $fullname . "<br>";

        #insert this user into Users Table
        $sql_query = "INSERT INTO users(uid, nickname, pwd, name, e_mail)
                        VALUES (DEFAULT,'$username','$password','$fullname', '$email')";

        $result = mysqli_query($db, $sql_query);
        echo "result: " . $result . "<br>";
        if($result == 1){
            header ("Location: homepage.php");
        }
        else{
            header ("Location: register.html");
        }
       }

    }
    else
    {
        echo "failure on sending!!!";
    }
?>