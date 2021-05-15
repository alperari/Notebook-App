<?php
    include "config.php";
    session_start();


    $my_uid = $_SESSION['uid']   ;
    $my_username = $_SESSION['username']  ;
    $my_fullname = $_SESSION['fullname']  ;
    $my_email = $_SESSION['email']  ;
    $my_cart_id = $_SESSION['cart_id']  ;


    $select_query = "SELECT * FROM notesincart,note WHERE notesincart.note_id = note.note_id AND notesincart.uid = $my_uid";
    $result = mysqli_query($db,$select_query);
    $total_cost = 0;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="mycart.css">
    <title>Notebook/My Cart</title>
</head>
<body>
    <div class="top">
        <a href="market.php"><header><h4><i class="fa fa-angle-left" style="font-size:24px;padding-right: 5px;"></i>Notebook App</h4></header></a>
        <h5>My Cart</h5>
        <div class="top-right">
            <h5 style="color: #fff;font-weight: 200;"> <?php echo $my_fullname ?> </h5>
            <a href="previous_orders.php" style="text-decoration: none;margin: 0 5px;">Previous orders</a>
        </div>
    </div>
    <main class="main">
        <div class="container">
            <section class="left">
            
                

                <?php
                while($row = mysqli_fetch_assoc($result)){
                //echo $row["title"] . "<br>" . $row["description"] . "<br>" . $row["course_name"] . "<br>" . $row["price"]."<br>";
                
                
                   //GET THE SELLER INFO FROM DATABASE
                   $current_note_id = $row['note_id'];
                   $get_seller_info_query = "SELECT * from users WHERE uid = (SELECT uid from sells WHERE sells.note_id = $current_note_id )";
                   $get_seller_info_result = mysqli_query($db,$get_seller_info_query);
                   $row2 = mysqli_fetch_assoc($get_seller_info_result);
                   
                   $seller_fullname = $row2["name"];
                   $seller_email = $row2["e_mail"];

                    echo
                   
                    '<div class="item">'.
                    '<img src="https://images.pexels.com/photos/6749464/pexels-photo-6749464.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="lecture note photo" id="item-img">'.
                    
                   
                        '<form class="content" id = "my-form" method="POST">'.
                            '<div class="card-top">'.
                            '<h6>' . $row["title"]. '</h6><p id="lecture">'. $row["course_name"]. '</p>'.
                            '</div>'.
                            '<p>'. $row["description"] .'</p>'.
                            '<label for="posted">Posted By: </label>'.
                            '<button id="posted-name" name="posted" style="background: #DCDCDC;border: none;">'. "$seller_fullname   note_id: ". $row["note_id"] .'</button>'.
                            '<br>'.
                            '<input type="hidden" value=' . $row["note_id"] . ' name="removeButton">'.
                            '<label for="other">Contact info: '. "$seller_email" .'</label>'.

                        '</form>'.


                        '<div class="two-box">'.
                        
                        '<button style="background: none;border: none;" form="my-form" value='. $row["note_id"] . ' name = "removeButton">'.
                        '<svg xmlns="http://www.w3.org/2000/svg" style ="cursor: pointer;" width="24"       height="24" fill="red" class="bi bi-trash" viewBox="0 0 16 16">'.
                            '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>'.
                            '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>'.
                        '</svg>'.
                        '</button>'.
                        '<h6>' . $row["price"] . '$</h6>'.
                        '</div>'.



                    '</div>';
                    $total_cost += $row["price"];
                }
                
                ?>  


                    <?php

                        
                    if(isset($_POST["removeButton"])){
                        echo $_POST["removeButton"] ;
                        $delete_query = "DELETE FROM notesincart WHERE note_id = ". $_POST["removeButton"] . " AND uid = " . "$my_uid";
                        $delete_result = mysqli_query($db,$delete_query);
                        if(isset($delete_result)){
                            echo "<script> window.location.replace('mycart.php');</script>";
                        }
                    }

                    ?>
                                


            </section>
            <section class="right">
                <form action="">
                <h6 id="total">Total price: <?php echo $total_cost?>$</h6>
                <button type="submit" class="btn btn-success" style="margin: 0 20px;">Order!</button>
                </form>
            </section>
        </div>
    </main>
</body>


</html>

