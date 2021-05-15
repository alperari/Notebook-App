<?php
    include "config.php";
    session_start();
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
    <script>
         $(document).ready(function() {
            $(".trash").click(() => {
                $(".item").fadeOut("slow");
            });
         });
    </script>
</head>
<body>
    <div class="top">
        <a href="market.php"><header><h4><i class="fa fa-angle-left" style="font-size:24px;padding-right: 5px;"></i>Notebook App</h4></header></a>
        <h5>My Cart</h5>
        <div class="top-right">
            <h5 style="color: #fff;font-weight: 200;">David Hamson</h5>
            <a href="previous_orders.php" style="text-decoration: none;margin: 0 5px;">Previous orders</a>
        </div>
    </div>
    <main class="main">
        <div class="container">
            <section class="left">
                <div class="item">
                    <img src="https://images.pexels.com/photos/6749464/pexels-photo-6749464.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="lecture note photo" id="item-img">
                    <form class="content">
                        <div class="card-top">
                            <h6>best c300 notes!</h6><p id="lecture">CS300</p>
                        </div>
                        <p>Lorem20Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias voluptate assumenda harum quam sapiente velit eaque veritatis incidunt officia consequuntur.</p>
                        <label for="posted">Posted By: </label>
                        <button id="posted-name" name="posted" style="background: none;border: none;">Jhon Doe</button>
                        <br>
                        <label for="other">Contact info: </label>
                        <button id="mail" name="other" style="background: none;border: none;">example@email.com</button>
                    </form>
                    <div class="two-box">
                        <button style="background: none;border: none">
                        <section style="padding: 0;">
                            <span class="trash" style="transform: scale(0.3);cursor: pointer;">
                                <span></span>
                                <i></i>
                            </span>
                        </section>
                        </button>
                        <h6>5$</h6>
                    </div>
                </div>
                <div class="item">
                    <img src="https://images.pexels.com/photos/6749464/pexels-photo-6749464.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="lecture note photo" id="item-img">
                    <form class="content">
                        <div class="card-top">
                            <h6>best c300 notes!</h6><p id="lecture">CS300</p>
                        </div>
                        <p>Lorem20ncidunt officia consequuntur.</p>
                        <label for="posted">Posted By: </label>
                        <button id="posted-name" name="posted" style="background: none;border: none;">Jhon Doe</button>
                        <br>
                        <label for="other">Contact info: </label>
                        <button id="mail" name="other" style="background: none;border: none;">example@email.com</button>
                    </form>
                    <div class="two-box">
                        <button style="background: none;border: none">
                        <section style="padding: 0;">
                            <span class="trash" style="transform: scale(0.3);cursor: pointer;">
                                <span></span>
                                <i></i>
                            </span>
                        </section>
                        </button>
                        <h6>5$</h6>
                    </div>
                </div>
                <div class="item">
                    <img src="https://images.pexels.com/photos/6749464/pexels-photo-6749464.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="lecture note photo" id="item-img">
                    <form class="content">
                        <div class="card-top">
                            <h6>best c300 notes!</h6><p id="lecture">CS300</p>
                        </div>
                        <p>Lorem20Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias voluptate assumenda harum quam sapiente velit eaque veritatis incidunt officia consequuntur.</p>
                        <label for="posted">Posted By: </label>
                        <button id="posted-name" name="posted" style="background: none;border: none;">Jhon Doe</button>
                        <br>
                        <label for="other">Contact info: </label>
                        <button id="mail" name="other" style="background: none;border: none;">example@email.com</button>
                    </form>
                    <div class="two-box">
                        <button style="background: none;border: none">
                        <section style="padding: 0;">
                            <span class="trash" style="transform: scale(0.3);cursor: pointer;">
                                <span></span>
                                <i></i>
                            </span>
                        </section>
                        </button>
                        <h6>5$</h6>
                    </div>
                </div>
            </section>
            <section class="right">
                <form action="">
                <h6 id="total">Total price: 15$</h6>
                <button type="submit" class="btn btn-success" style="margin: 0 20px;">Order!</button>
                </form>
            </section>
        </div>
    </main>
</body>
<?php


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
        "".   //<button>REMOVE</button>"
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