<?php
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
    <link rel="stylesheet" href="profile.css">
    <title>Notebook/Profile-Page</title>
</head>
<body>
    <div class="nav">
        <a href="market.php"><header><h4>Notebook App</h4></header></a>
        <h5 style="width: 100px;margin-right: 1.5rem;">Profile</h5>
        <h5 style="color: #fff;font-weight: 200;"><?php echo $my_fullname?> </h5>
    </div>
    <form action="./services/editProfile.php" method="POST">
        <fieldset>
            <legend class="portrait">
            </legend>
            <div>
            <label for="name">Full Name</label>
            <input type="text" name="fullname"id="name" placeholder= <?php echo $my_fullname?>>
            </div>
            <div>
            <label for="user">Username</label>
            <input type="text" name="username" id="user" placeholder=<?php echo $my_username?>>
            </div>
            <div>
            <label for="mail">E-Mail</label>
            <input type="email" name="email" id="mail" placeholder=<?php echo $my_email?>>
            </div>
            <div>
            <label for="password">New Password</label>
            <input type="password" name="password" id="password">
            </div>
            <div>
            <input class="btn-primary" style="width: fit-content;" type="submit" value="SAVE" id="btn">
            </div>
        </fieldset>
    </form>
</body>
</html>