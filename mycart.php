<html>
<h1>CART</h1>

<?php

session_start();
if(!empty($_SESSION['mycart'])){
    foreach($_SESSION['mycart'] as $key => $value){
        echo $value['seller_note_title'] . '<br>' .
            $value['seller_note_description'] . '<br>' .
            $value['seller_note_price'] . '<br>' .
            $value['seller_note_coursename'] . '<br> <br>' ;

    }
}

?>

</html>