<html>
<head>
        <title>ALL USERS</title>

        <style>
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
            }
        </style>
    </head>

    <body>
        <table>
            <tr>
                <th>seller_uid</th>
                <th>seller_username</th>
                <th>seller_fullname</th>
                <th>seller_email</th>
                <th>seller_note_id</th>
                <th>seller_note_title</th>
                <th>seller_note_description</th>
                <th>seller_note_price</th>
                <th>seller_note_coursename</th>
            </tr>
    
    
    <?php
        include "config.php";

        session_start();
        $my_uid = $_SESSION['uid']   ;
        $my_username = $_SESSION['username']  ;
        $my_fullname = $_SESSION['fullname']  ;
        $my_email = $_SESSION['email']  ;
        $my_cart_id = $_SESSION['cart_id']  ;

        echo $my_uid     . $my_username  . $my_email  . $my_fullname     . $my_cart_id . "<br>";

        $get_detailed_table_query = "SELECT * FROM users,sells,note WHERE users.uid = sells.uid AND note.note_id = sells.note_id";
        $detailed_table_result = mysqli_query($db,$get_detailed_table_query);

        while($row = mysqli_fetch_assoc($detailed_table_result))
    {
        $seller_uid = $row["uid"];
        $seller_username = $row["nickname"];
        $seller_fullname = $row["name"];
        $seller_email = $row["e_mail"];
        $seller_note_id = $row["note_id"];
        $seller_note_title = $row["title"];
        $seller_note_description = $row["description"];
        $seller_note_price = $row["price"];
        $seller_note_coursename = $row["course_name"];


        echo 
            "<tr>" .
                "<td>". $seller_uid."</td>".
                "<td>" .$seller_username."</td>".
                "<td>" .$seller_fullname."</td>".
                "<td>". $seller_email."</td>".
                "<td>" .$seller_note_id."</td>".
                "<td>" .$seller_note_title."</td>".
                "<td>" .$seller_note_description."</td>".
                "<td>" .$seller_note_price."</td>".
                "<td>" .$seller_note_coursename."</td>".
            "</tr>" ;
    }
    ?>
      </table>
    </body>

</html>