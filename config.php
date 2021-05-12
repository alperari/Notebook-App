<?php

    $db = mysqli_connect("localhost", "root" , "", "notebook_app");
    if($db->connect_error)
    {
        die("UNABLE TO CONNECT TO DATABASE [". $db->connect_error. "]");
    }
    else
    {
        echo "CONNECTED DATABASE SUCCESSFULLY. <br> Info: ". $db->info . "<br>Host Info: " . $db->host_info. "<br>Server Info:" . $db->server_info. "<br>";
    }
   
?>