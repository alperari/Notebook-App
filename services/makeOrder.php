<?php
include "../config.php";

session_start();


    $my_uid = $_SESSION['uid']   ;
    $my_username = $_SESSION['username']  ;
    $my_fullname = $_SESSION['fullname']  ;
    $my_email = $_SESSION['email']  ;
    $my_cart_id = $_SESSION['cart_id']  ;

    $order_id = rand(100,10000);
    $current_date =  date("Y/m/d");

    $select_items_in_cart_qeury = "SELECT * FROM notesincart WHERE uid = $my_uid";
    $result = mysqli_query($db, $select_items_in_cart_qeury);

    if(mysqli_num_rows($result)==0){
        header("location: ../mycart.php",true);
    }
    else{

        
        
      
        
        //store all note items in an array
        
        $all_notes = [];
        $total_price = 0;
        while($row = mysqli_fetch_assoc($result)){

            //need to get all details from notes table
            $get_details_query = "SELECT * FROM note WHERE note_id = " . $row["note_id"];
            $result2 = mysqli_query($db, $get_details_query);
            $note_info = mysqli_fetch_assoc($result2);

            $current_note = array(
                'title' => $note_info["title"],
                'description' =>$note_info["description"],
                'note_id' =>$note_info["note_id"],
                'price' =>$note_info["price"],
                'coursename' =>$note_info["course_name"],
                'url' => $note_info["DriveLink"],
            );

            $all_notes[] = $current_note;

            $total_price += $note_info["price"];
        }

        //insert into orders table (oid, price, date)
        $insert_into_orders_query = "INSERT INTO orders(oid,price,date)
        VALUES ('$order_id', '$total_price','$current_date')";
        mysqli_query($db,$insert_into_orders_query);



        //add this order to ordered table insert(oid,uid)
        $add_query = "INSERT INTO ordered(oid,uid) VALUES('$order_id','$my_uid')";
        mysqli_query($db,$add_query);

        
        //now add these notes into the notes_in_order table
        foreach($all_notes as $value){
            $id =$value["note_id"];
            $insert_notes_query = 'INSERT INTO notesinorder(oid,note_id)
                                    VALUES ('.$order_id . ',' . $id .')';
            $res = mysqli_query($db,$insert_notes_query);
        }
        


        //after this step, empty my cart
        $empty_cart_query = "DELETE FROM notesincart WHERE uid = $my_uid";
        mysqli_query($db,$empty_cart_query);
        ?>
        <html>
            <center>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRW5TDV3smdpUP9M7i7Nu2ptvKnbal46QCjnYjXu_kHGaRLNVyY9asEDgSiBWB1xCJ43Jo&usqp=CAU" 
                alt="alternatetext">
                <h2><p style="font-family:'Arial'">YOUR ORDER IS SUCCESSFULLY COMPLETED!</p></h2>
                <h2><p style="font-family:'Arial'">YOU CAN CHECK YOUR ORDERINGS FROM "PREVIOUS ORDERS" SECTION</p><h2>
                <a href="../market.php"><button>RETURN</button></a>
            </center>
        </html>
        <?php
        sleep(5);
        //header("location: market.php",true);
    }

?>