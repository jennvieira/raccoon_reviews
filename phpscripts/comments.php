
<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

include("connect.php");

if(isset($_POST['user_name']) && isset($_POST['user_review']))
{

  $review = $_POST['user_review'];
  $name = $_POST['user_name'];

  $title = $_POST['movie_title'];

  $query = "INSERT INTO tbl_reviews VALUES(NULL,'$title','$name','$review')";
  $insert = mysqli_query($link, $query);

  $query2 = "SELECT reviews_name,reviews_review FROM tbl_reviews WHERE reviews_name='$name' AND reviews_review ='$review'";
  $select = mysqli_query($link, $query2);



  if($row = mysqli_fetch_array($select))
  {
    echo "<h6 class=\"rev_name\">{$row['reviews_name']}</h6>";
    echo "<p class=\"rev_rev\">{$row['reviews_review']}</p>";
  }
exit;
}




 ?>
