<?php
    include "config.php";
    //echo $_POST["username"];
    if ($_POST['email']) {
        # code...
       
        $email = $_POST["email"];
        $password = $_POST["password"];
        



        $select_query = "SELECT * FROM users WHERE e_mail = '$email' AND pwd = '$password' ";
        $result = mysqli_query($db,$select_query);
        $row = mysqli_fetch_assoc($result);
        if($row == NULL){
            header ("Location: index.html", true);
        }    

        else{
        //echo $row["uid"] . $row["nickname"] . $row["name"];
            session_start();
            $_SESSION['uid']   = $row["uid"];
            $_SESSION['username']  = $row["nickname"];
            $_SESSION['fullname']  = $row["name"];
            $_SESSION["email"] = $row["e_mail"];
            $_SESSION['cart_id']  = $row["uid"];

            header ("Location: homepage.php",true);
        }

    }
    else
    {
        echo "failure on sending!!!";
    }
?>