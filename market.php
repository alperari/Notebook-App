<!DOCTYPE html>
<?php
        include "config.php";
        $orderBy = "ASC";
        $sortByCourseName = "";
        $sortBySearchResult = "";
        $get_detailed_table_query = "SELECT * FROM users,sells,note WHERE users.uid = sells.uid AND note.note_id = sells.note_id ORDER BY note.price " . "$orderBy" ;


        session_start();
        $my_uid = $_SESSION['uid']   ;
        $my_username = $_SESSION['username']  ;
        $my_fullname = $_SESSION['fullname']  ;
        $my_email = $_SESSION['email']  ;
        $my_cart_id = $_SESSION['cart_id']  ;



        

        //echo $my_uid     . $my_username  . $my_email  . $my_fullname     . $my_cart_id . "<br>";

?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="market.css">
  <title>Notebook/Market Place</title>
  <script>
      $("document").ready(function () {
        
      });
  </script>
</head>
<body>
    <a href="market.php"><header><h4>Notebook App</h4></header></a>
  <div class="top" id="top">
    <h5 id="app-name">Paper Market</h5>

  <!--SEARCH BOX, SEARCH ACCORDING TO TITLE,DESCRIPTION,COURSENAME -->
  <form action="" method="post">
    <input type="text" name="searchResult" id="search" placeholder="Search">
    <button> SEARCH </button> 
  </form>




  <div id="profile-box">
    <p> <?php echo "$my_fullname"; ?> </p>
    <button type="button" id="card">My Card<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
      <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
    </svg></button>
  </div>  
</div>
  <main>
  
    <div class="bg-image"></div>
    <div class="content">
      <section id="left">
        
        <button type="button" class="sort">Sort By</button>
        <div class="panel">
            <form action="" method="post">
              <input type="hidden" value="t" name="ascButton">
              <button class="asc">ASCENDING PRICE</button> 
            </form>

            <form action="" method="post">
              <input type="hidden" value="t" name="descButton">
              <button class="dsc">DESCENDING PRICE</button>   
            </form>
        </div>

        <?php
          if(isset($_POST["ascButton"]))
            $orderBy = "ASC";
          else if(isset($_POST["descButton"]))
            $orderBy = "DESC";

          
        ?>


        
        


        <ul class="classes">
          <form action='' method='POST'> 
            <button type='submit' class="all" name= "sortByCourseName" value="ALL"> ALL  </button>
          </form>
          <br>

          <?php  //FILTER BY COURSENAME  //FETCH DATA FROM DB,  SELECT ALL COURSENAMES
            $select_query = "SELECT course_name FROM note" ;
            $result = mysqli_query($db,$select_query);
            
            while($row = mysqli_fetch_assoc($result))
            {
              
              echo
              "<form action='' method='POST'>" .
                "<button type='submit' class='left-btn' name= sortByCourseName value= " . $row['course_name'] . ">" . $row['course_name'] . "</button>".
              "</form>";
            }

            ?>

        </ul>

        <hr>
        <button type="button" id="sell">Sell</button>
        <hr>
        <a href="#top" class="scroll-top"><i class="fa fa-angle-double-up" style="font-size:36px"></i></a>
      </section>
      <section id="right">


        <?php
        //FILTER BY COURSENAME
        if(isset($_POST["sortByCourseName"])){
          $sortByCourseName = $_POST["sortByCourseName"];
          $get_detailed_table_query =  "SELECT * FROM users,sells,note WHERE users.uid = sells.uid AND note.note_id = sells.note_id AND note.course_name = '$sortByCourseName'";
          
          if($_POST["sortByCourseName"] == "ALL"){
            $get_detailed_table_query = "SELECT * FROM users,sells,note WHERE users.uid = sells.uid AND note.note_id = sells.note_id ORDER BY note.price " . "$orderBy";
          }
        }
        else{
          $get_detailed_table_query = "SELECT * FROM users,sells,note WHERE users.uid = sells.uid AND note.note_id = sells.note_id ORDER BY note.price " . "$orderBy";
        }

        //FILTER BY SEARCH RESULT
        if(isset($_POST["searchResult"])){
          $sortBySearchResult = $_POST["searchResult"];
          $get_detailed_table_query =  "SELECT * FROM users,sells,note 
                                        WHERE users.uid = sells.uid 
                                        AND note.note_id = sells.note_id 
                                        AND note.title LIKE '%$sortBySearchResult%' 
                                        OR note.description LIKE '%$sortBySearchResult%'";

          if($_POST["searchResult"] == ""){
            $get_detailed_table_query = "SELECT * FROM users,sells,note WHERE users.uid = sells.uid AND note.note_id = sells.note_id ORDER BY note.price " . "$orderBy";
          }
        }
        else{
          $get_detailed_table_query = "SELECT * FROM users,sells,note WHERE users.uid = sells.uid AND note.note_id = sells.note_id ORDER BY note.price " . "$orderBy";
        }

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
          "<div class='card'>" . 
          "<img src='https://images.pexels.com/photos/6749464/pexels-photo-6749464.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940' alt='seller'>".
          "<div class='card-content'>".
          "<div>".
          "<h3 class='Lecture'> " . $seller_note_coursename . "</h3><h3 class='card-value'>" . "$seller_note_price" . "$</h3>".
          "</div>".
          "<button type='submit'>Add to card</button>".
          "</div>".
          "<div class='overlay'><h6>". "$seller_note_title" . "</h6><br><h6>". "$seller_username" . "</h6><br><p>" . "$seller_note_description" ."</p></div>".
          "</div>";
        }
        ?>
        <!--
                  <div class="card">
                    <img src="https://images.pexels.com/photos/6749464/pexels-photo-6749464.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                        alt="seller">
                    <div class="card-content">
                      <div>
                        <h3 class="Lecture"> lecture  </h3><h3 class="card-value">  5$</h3>
                      </div>
                      <button type="submit">Add to card</button>
                    </div>
                    <div class="overlay"><h6> title1 </h6><br><h6> testeerer </h6><br><p> asdasdasdassda </p></div>
                </div>
                
                <div class="card">
                  <img src="https://images.pexels.com/photos/6045687/pexels-photo-6045687.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                      alt="seller">
                  <div class="card-content">
                      <div>
                        <h3 class="Lecture">Lecture</h3><h3 class="card-value">5$</h3>
                      </div>
                      <button type="submit">Add to card</button>
                      <div class="overlay">My Name is John</div>
                  </div>
              </div>
              <div class="card">
                <img src="https://images.pexels.com/photos/5490895/pexels-photo-5490895.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    alt="seller">
                <div class="card-content">
                    <div>
                        <h3 class="Lecture">Lecture</h3><h3 class="card-value">5$</h3>
                      </div>
                    <button type="submit">Add to card</button>
                    <div class="overlay">My Name is John</div>
                </div>
            </div>
            <div class="card">
              <img src="https://images.pexels.com/photos/6696899/pexels-photo-6696899.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                  alt="seller">
              <div class="card-content">
                <div>
                        <h3 class="Lecture">Lecture</h3><h3 class="card-value">5$</h3>
                      </div>
                  <button type="submit">Add to card</button>
                  <div class="overlay">My Name is John</div>
              </div>
          </div>
              <div class="card">
                <img src="https://images.pexels.com/photos/5490830/pexels-photo-5490830.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    alt="seller">
                <div class="card-content">
                    <div>
                        <h3 class="Lecture">Lecture</h3><h3 class="card-value">5$</h3>
                      </div>
                      <button type="submit">Add to card</button>
                      <div class="overlay">My Name is John</div>
                </div>
            </div>  
            <div class="card">
              <img src="https://images.pexels.com/photos/6696905/pexels-photo-6696905.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                  alt="seller">
              <div class="card-content">
                <div>
                        <h3 class="Lecture">Lecture</h3><h3 class="card-value">5$</h3>
                      </div>
                  <button type="submit">Add to card</button>
                  <div class="overlay">My Name is John</div>
              </div>
          </div>
              <div class="card">
                <img src="https://images.pexels.com/photos/6487941/pexels-photo-6487941.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 "
                    alt="seller">
                <div class="card-content">
                    <div>
                        <h3 class="Lecture">Lecture</h3><h3 class="card-value">5$</h3>
                      </div>
                    <button type="submit">Add to card</button>
                    <div class="overlay">My Name is John</div>
                </div>
            </div>
            <div class="card">
                <img src="https://images.pexels.com/photos/62693/pexels-photo-62693.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    alt="seller">
                <div class="card-content">
                    <div>
                        <h3 class="Lecture">Lecture</h3><h3 class="card-value">5$</h3>
                      </div>
                    <button type="submit">Add to card</button>
                    <div class="overlay">My Name is John</div>
                </div>
            </div>
            <div class="card">
                <img src="https://images.pexels.com/photos/6480200/pexels-photo-6480200.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    alt="seller">
                <div class="card-content">
                    <div>
                        <h3 class="Lecture">Lecture</h3><h3 class="card-value">5$</h3>
                      </div>
                    <button type="submit">Add to card</button>
                    <div class="overlay">My Name is John</div>
                </div>
            </div>
          <div class="card">
                <img src="https://images.pexels.com/photos/62693/pexels-photo-62693.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    alt="seller">
                <div class="card-content">
                    <div>
                        <h3 class="Lecture">Lecture</h3><h3 class="card-value">5$</h3>
                      </div>
                    <button type="submit">Add to card</button>
                    <div class="overlay">My Name is John</div>
                </div>
            </div>
        <div class="card">
              <img src="https://images.pexels.com/photos/6444249/pexels-photo-6444249.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                  alt="seller">
              <div class="card-content">
                <div>
                        <h3 class="Lecture">Lecture</h3><h3 class="card-value">5$</h3>
                      </div>
                  <button type="submit">Add to card</button>
                  <div class="overlay">My Name is John</div>
              </div>
          </div>
          -->
      </section>
    </div>  
  </main>
  <script>
      var acc = document.getElementsByClassName("sort");
        var i;

        for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
            } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
            } 
        });
        }

      

  </script>
</body>
</html>