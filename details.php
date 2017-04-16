<?php
  //echo $_GET['id'];
  include("phpscripts/init.php");
  if(isset($_GET['id'])) {
    //echo "ID has been set";
    $id = $_GET['id']; //gaining acess to id
    //query to select a single movie:
    $tbl = "tbl_movies";
    $col = "movies_id";
    $getSingle = getSingle($tbl, $col, $id);
    $getSingle2 = getSingle($tbl, $col, $id);
    $getSingle3 = getSingle($tbl, $col, $id);

  }else{
    $noMovie = "No movie was selected...";
  }

 ?>

 <!DOCTYPE HTML>
 <HTML lang="en">
   <head>
     <meta charset="utf-8">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Raccoon Reviews</title>

     <link href="css/bootstrap/bootstrap-flex.css" rel="stylesheet" type="text/css">
     <link href="css/bootstrap/bootstrap-grid.css" rel="stylesheet" type="text/css">
     <link href="css/bootstrap/bootstrap-reboot.css" rel="stylesheet" type="text/css">
     <link href="css/bootstrap/bootstrap.css" rel="stylesheet" type="text/css">

     <link href="css/main.css" rel="stylesheet" type="text/css">


         <script src="script/greensock/TweenMax.min.js"></script>
         <script src="script/greensock/TimelineMax.min.js"></script>
         <script src="script/greensock/ScrollToPlugin.min.js"></script>
         <script src="script/greensock/TweenLite.min.js"></script>

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

   </head>

 <body>

   <?php
   include("includes/header.html")
   ?>

<section id="details_section1">

  <div class="container">
    <div class="row justify-content-center align-items-center">

<?php

   if(!is_string($getSingle)) {
     $row = mysqli_fetch_array($getSingle);

      echo "<div class=\"col-12 col-md-5 detail_movie_con\">";
     	echo "<img src=\"img/{$row['movies_fimg']}\" class=\"img-fluid\" alt=\"{$row['movies_title']}\">";
      echo "</div>";

      echo "<div class=\"col-12 col-md-6\">";
      echo "<h3 class=\"mov_title\">{$row['movies_title']}</h3>";
      echo "<p class=\"mov_desc\">{$row['movies_storyline']}</p>";
      echo "</div>";

   }

 ?>
 </div>
 </div>

</section>

<section id="details_trailer">

  <div class="container-fluid nogutter">
    <div class="row justify-content-center align-items-center">
      <div class="col-12">

        <video id="mov_trailer" poster="img/hangover-feature.png" class="img-fluid">
          <?php
          if(!is_string($getSingle2)){
            while($row = mysqli_fetch_array($getSingle2)){

              echo "<source type=\"video/mp4\" src=\"video/{$row['movies_trailer']}\"></source>";
              echo "Your browser does not support video";
            }
          }else{
            echo "<p>{$getSingle2}</p>";
          }
           ?>
        </video>
      </div>

    </div>

    <div class="row justify-content-around align-items-center" id="controls">
      <div class="col-1">

            <a href="#" class="playpause"><img src="img/controls/play.svg" class="playbut" alt="Play Button"></a>
      </div>

      <div class="col-2">

            <a href="#" class="muteunmute"><img src="img/controls/volume_full.svg" class="mutebut" alt="Mute/unmute Button"></a>
      </div>
    </div>
  </div>

</section>


<section id="details_review">

<div class="container">

  <div class="row justify-content-center">
  <div class="col-11">
  <div id="reviews">

    <h3 class="rev_heading">Reviews</h3>

    <?php

      include("phpscripts/connect.php");

      if(!is_string($getSingle3)){

        while($row = mysqli_fetch_array($getSingle3)){

              // echo "<p>{$row['movies_title']}</p>";
              $title = $row['movies_title'];
            }
          }

    $query = "SELECT reviews_name, reviews_review FROM tbl_reviews WHERE reviews_movie = '{$title}'";

    $reviews = mysqli_query($link, $query);

    while($row2 = mysqli_fetch_array($reviews)){


            echo "<h6 class=\"rev_name\">{$row2['reviews_name']}</h6>";
            echo "<p class=\"rev_rev\">{$row2['reviews_review']}</p>";
    }



     ?>
      <div id="reviews_box">
      </div>

  </div>
</div>
</div>



  <div class="row justify-content-center">
        <div class="col-11">
    <h3 class="rev_heading">Write a Review</h3>

              <form method="post" id="review_form" name="review_form" action="">


                    <label class="rev_name">Name:</label>
                    <input type="text" name="name" id="review_name" required>

                    <label class="rev_name">Your Review:</label>
                    <textarea name="review" id="review_review" cols="30" rows="10" required>
                    </textarea>

                  <input type="submit" id="review_submit" value="submit">

              </form>



        </div>
  </div>

</div>



</section>

<script src="script/reviews.js"></script>
<script src="script/video.js"></script>

 <!-- <script src="script/main.js"></script> -->
 <script src="script/bootstrap/bootstrap.js"></script>

 </body>

 </html>
