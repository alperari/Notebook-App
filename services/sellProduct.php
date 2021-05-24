<?php 
    include "../config.php";

    session_start();


    $my_uid = $_SESSION['uid']   ;
    $my_username = $_SESSION['username']  ;
    $my_fullname = $_SESSION['fullname']  ;
    $my_email = $_SESSION['email']  ;



    if(isset($_POST["title"])){
        $title = $_POST["title"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $coursename = $_POST["course_name"];
        $url = $_POST["drive_link"];
        //NOW ADD THIS TO DATABASE sells table
        

        //but first we need to create 'note' instance
        $insert_note_query = "INSERT INTO note(note_id, title, description, price, course_name, DriveLink) 
                                VALUES (DEFAULT, '$title', '$description', '$price', '$coursename', '$url')" ;
        $insert_result = mysqli_query($db,$insert_note_query);

        //now get the id of product that we inserted just right now;
        $current_note_id;
        $get_id_query = "SELECT note_id FROM note WHERE title = '$title' AND description = '$description'";
        $get_id_result = mysqli_query($db,$get_id_query);
       
        $row = mysqli_fetch_assoc($get_id_result);
        $current_note_id = $row["note_id"];

        //now we got the note_id, now we can manage sellings, table  insert (uid, note_id) to sells;
        $insert_into_sells_query = "INSERT INTO sells(uid,note_id) VALUES('$my_uid','$current_note_id')";
        $insert_results = mysqli_query($db,$insert_into_sells_query);

        if($insert_results){
            header("location: ../sell.php",true);
        }
        else{
            echo "PROBLEM WITH INSERTION TO SELLS!";
        }
    }
    else{
        echo "THERE IS A PROBLEM WITH SENDING INFORMATION TO sellProduct.php!";
    }
?>