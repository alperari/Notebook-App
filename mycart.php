<html>
<h1>CART</h1>

<?php

include "config.php";

session_start();

        $my_uid = $_SESSION['uid']   ;
        $my_username = $_SESSION['username']  ;
        $my_fullname = $_SESSION['fullname']  ;
        $my_email = $_SESSION['email']  ;
        $my_cart_id = $_SESSION['cart_id']  ;


$select_query = "SELECT * FROM notesincart,note WHERE notesincart.note_id = note.note_id";
$result = mysqli_query($db,$select_query);

while($row = mysqli_fetch_assoc($result)){
    //echo $row["title"] . "<br>" . $row["description"] . "<br>" . $row["course_name"] . "<br>" . $row["price"]."<br>";
    echo
        "<form action='' method='post'>".
        "<input type='hidden' value=" .$row["note_id"] . " name='removeButton'>".
        "<button>REMOVE</button>".   
        "</form>  <br> <br>"  ; 
}
if(isset($_POST["removeButton"])){
    //echo $_POST["removeButton"] . " " . $my_uid;
    $delete_query = "DELETE FROM notesincart WHERE note_id = ". $_POST["removeButton"] . " AND uid = " . "$my_uid";
    $delete_result = mysqli_query($db,$delete_query);
    if(!isset($delete_result)){
        echo "failed to delete";
    }
    else {
        echo "deleted";
    }
}

?>

</html>