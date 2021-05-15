<html>
<h1>
MY ORDERS
</h1>

<?php 
    session_start();

        $my_uid = $_SESSION['uid']   ;
        $my_username = $_SESSION['username']  ;
        $my_fullname = $_SESSION['fullname']  ;
        $my_email = $_SESSION['email']  ;
        $my_cart_id = $_SESSION['cart_id']  ;


    include "config.php";
    $select_query = "SELECT * from orders,ordered WHERE orders.oid = ordered.oid AND ordered.uid = '$my_uid'";
    $result = mysqli_query($db,$select_query);

    while($row = mysqli_fetch_assoc($result)){
        //echo $row["title"] . "<br>" . $row["description"] . "<br>" . $row["course_name"] . "<br>" . $row["price"]."<br>";
       
       $order_item_array = array(
        'oid' => $row["oid"], 
        'date' =>  $row["date"], 
        'order_price' => $row["price"], 
        'notes_in_this_order' => []
       );
       
       
        echo $order_item_array["oid"] . "<br>".
        $order_item_array["date"] . "<br>".
        $order_item_array["order_price"] . "<br>".
        "<br>";
       
        $select_notes_query = "SELECT * FROM note,notesinorder,ordered WHERE note.note_id = notesinorder.note_id AND ordered.uid = " . $my_uid  . " AND notesinorder.oid = " . $order_item_array['oid'];
        $result_notes_query = mysqli_query($db,$select_notes_query);
        while($row_notes = mysqli_fetch_assoc($result_notes_query)){
            $note_item_array = array(
                'title' => $row_notes["title"], 
                'description' =>  $row_notes["description"], 
                'note_price' => $row_notes["price"],
                'coursename' => $row_notes["course_name"]
            );

            echo $note_item_array["title"] . "<br>".
                $note_item_array["description"] . "<br>".
                $note_item_array["note_price"] . "<br>".
                $note_item_array["coursename"] . "<br>".
                "<br>";

            $order_item_array["notes_in_this_order"][] = $note_item_array;
        }
    }

    
?>

</html>