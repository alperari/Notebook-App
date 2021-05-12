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
            
       
        if($row["nickname"] == "")
            header ("Location: index.html");

        else
            header ("Location: homepage.php");


    }
    else
    {
        echo "failure on sending!!!";
    }
?>