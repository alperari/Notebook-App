<?php
    include "config.php";
    session_start();


    $my_uid = $_SESSION['uid']   ;
    $my_username = $_SESSION['username']  ;
    $my_fullname = $_SESSION['fullname']  ;
    $my_email = $_SESSION['email']  ;


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
    <link rel="stylesheet" href="sell.css">
    <title>Notebook/Sell</title>
</head>
<body>
    <div class="nav">
        <a href="market.php"><header><h4><i class="fa fa-angle-left" style="font-size:24px;padding-right: 5px;"></i>Notebook App</h4></header></a>
        <h5 style="width: 100px;margin: 0 auto;">Sell</h5>
        <h5 style="color: #fff;font-weight: 200;"> <?php echo $my_fullname;?></h5>
    </div>
    <main class="main">
        <div class="container">
            <section class="top">
                <h6 style="margin-top: 1rem;">- Choose File -</h6>
                
                <form action="services/sellProduct.php" method="POST">
                    <button type="submit" value="" class="btn btn-primary" style="box-sizing: border-box;padding: 3rem;margin-bottom: 1rem;">Upload File</button>
                    <br>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" required>
                    <br>
                    <label for="description">Description</label>
                    <textarea style="resize: none;" name="description" id="price" cols="30" rows="2" maxlength="60" required></textarea>
                    <br>
                    <label for="price">Price ($)</label>
                    <input type="number" name="price" id="price" min="0" required>
                    <br>
                    <label for="course_name">Course Name</label>
                    <input type="text" name="course_name" id="course_name" required>
                    <br>
                    <button type="submit" class="m_7324175046419835022mlContentButton" style="margin-top: 1rem;font-family:'Trebuchet MS',Helvetica,sans-serif;background-color: forestgreen;
                    cursor: pointer;border-bottom:5px solid green;border-radius:5px;color:#ffffff;display:inline-block;font-size:18px;font-weight:500;line-height:24px;text-align:center;text-decoration:none;width:100px">SELL</button>
                    </form>

            </section>
            <section class="bottom">
                    <hr>
                    <legend style="text-align: center;font-size: larger;">Products For Sale</legend>

                    <?php 
                    
                    $mysells_query = "SELECT * FROM sells,note WHERE sells.uid = $my_uid AND sells.note_id = note.note_id";
                    $result = mysqli_query($db,$mysells_query);
                    
                    //DISPLAY SELLINGS
                    while($row = mysqli_fetch_assoc($result)){
                        
                        echo
                        '<div class="item">'.
                        '<img src="https://images.pexels.com/photos/6749464/pexels-photo-6749464.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="lecture note photo" id="item-img">'.
                            
                        
                        '<form class="content" id = "my-form" method="POST">'.
                               '<div class="card-top">'.
                               '<h6>' . $row["title"] .'</h6><p id="lecture">'. $row["course_name"] .'</p>'.
                               '</div>'.
                               '<p>'. $row["description"] .'</p>'.
                               '<label for="posted">Posted By: </label>'.
                               '<button id="posted-name" name="posted" style="background: #DCDCDC;border: none;">'. $my_fullname .'</button>'.
                               '<br>'.
                               '<input type="hidden" value= ' .$row["note_id"]  . ' name="removeButton">'.
                               '<label for="other">Contact info:  ' . $my_email . '</label>'.
                            '</form>'.


                            '<div class="two-box">'.
                            '<button style="background: none;border: none;" form="my-form" value= '. $row["note_id"]   .' name = "removeButton">'.
                            '<section style="padding: 0;">'.
                                '<span class="trash" style="transform: scale(0.3);cursor: pointer;">'.
                                    '<span></span>'.
                                    '<i></i>'.
                                '</span>'.
                            '</section>'.
                            '</button>'.
                            '<h6>$<strong>'. $row["price"] .'</strong></h6>'.
                            '</div>'.
                        '</div>';

                    }

                    if(isset($_POST["removeButton"])){
                        echo $_POST["removeButton"] ;
                        $delete_query = "DELETE FROM `sells` WHERE uid = $my_uid AND note_id = ". $_POST['removeButton'];
                        $delete_result = mysqli_query($db,$delete_query);
                        if(isset($delete_result)){
                            echo "<script> window.location.replace('sell.php');</script>";
                        }
                    }

                    ?>

                    
            </section>
        </div>
    </main>
</body>


</html>