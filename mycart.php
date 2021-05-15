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
</head>
<body>
    <div class="top">
        <a href="market.php"><header><h4><i class="fa fa-angle-left" style="font-size:24px;padding-right: 5px;"></i>Notebook App</h4></header></a>
        <h5>My Cart</h5>
        <h5 style="color: #fff">David Hamson</h5>
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
                        <button id="posted-name" name="posted" style="background: #DCDCDC;border: none;">Jhon Doe</button>
                        <br>
                        <label for="other">Contact info: </label>
                        <button id="mail" name="other" style="background: #DCDCDC;border: none;">example@email.com</button>
                    </form>
                    <div class="two-box">
                    <svg xmlns="http://www.w3.org/2000/svg" style ="cursor: pointer;" width="24"       height="24" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
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
                        <button id="posted-name" name="posted" style="background: #DCDCDC;border: none;">Jhon Doe</button>
                        <br>
                        <label for="other">Contact info: </label>
                        <button id="mail" name="other" style="background: #DCDCDC;border: none;">example@email.com</button>
                    </form>
                    <div class="two-box">
                    <svg xmlns="http://www.w3.org/2000/svg" style ="cursor: pointer;" width="24"       height="24" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
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
                        <button id="posted-name" name="posted" style="background: #DCDCDC;border: none;">Jhon Doe</button>
                        <br>
                        <label for="other">Contact info: </label>
                        <button id="mail" name="other" style="background: #DCDCDC;border: none;">example@email.com</button>
                    </form>
                    <div class="two-box">
                    <svg xmlns="http://www.w3.org/2000/svg" style ="cursor: pointer;" width="24"       height="24" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
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
                        <button id="posted-name" name="posted" style="background: #DCDCDC;border: none;">Jhon Doe</button>
                        <br>
                        <label for="other">Contact info: </label>
                        <button id="mail" name="other" style="background: #DCDCDC;border: none;">example@email.com</button>
                    </form>
                    <div class="two-box">
                    <svg xmlns="http://www.w3.org/2000/svg" style ="cursor: pointer;" width="24"       height="24" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
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
                        <button id="posted-name" name="posted" style="background: #DCDCDC;border: none;">Jhon Doe</button>
                        <br>
                        <label for="other">Contact info: </label>
                        <button id="mail" name="other" style="background: #DCDCDC;border: none;">example@email.com</button>
                    </form>
                    <div class="two-box">
                    <svg xmlns="http://www.w3.org/2000/svg" style ="cursor: pointer;" width="24"       height="24" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
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