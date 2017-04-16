<?php
	ini_set("display_errors", 1);
	error_reporting(E_ALL);
	// Above for Mac only
	require_once("admin/phpscripts/init.php");
	$tbl = "tbl_movies";
	if(isset($_GET['filter'])){
		//echo $_GET['filter'];
		$filter = $_GET['filter'];
		$tbl1 = "tbl_cat";
		$tbl2 = "tbl_l_mc";
		$col = "movies_id";
		$col1 = "cat_id";
		$col2 = "cat_name";
		$getMovies = filterType($tbl, $tbl1, $tbl2, $col, $col1, $col2, $filter);

		//echo "SELECT * FROM {$tbl}, {$tbl1}, {$tbl2} WHERE {$tbl}.{$col}={$tbl2}.{$col} AND {$tbl1}.{$col1}={$tbl2}.{$col1} AND {$tbl1}.{$col2}='{$filter}'";

	}else{
		$getMovies = getAll($tbl);
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

  </head>

<body>

  <?php
  include("includes/header.html")
  ?>

  <section id="movies_section">

        <div class="container">
          <div class="row justify-content-center movies_row">
            <?php
              if(!is_string($getMovies)) {
                //echo "object";
                while($row = mysqli_fetch_array($getMovies)) {
                  echo "<div class=\"col-6 col-sm-4 movie_con\">";
                  echo "<img src=\"img/{$row['movies_fimg']}\" class=\"img-fluid\" alt=\"{$row['movies_title']}\">";
                  echo "<div class=\"overlay hidden-md-down\"></div>";
                  echo "<div class=\"view_button\"><a href=\"details.php?id={$row['movies_id']}\"><button class=\"movie_button\">view</button></a></div>";
                  echo "</div>";
                }
              }else{
                //echo "String";
                echo "<p>{$getMovies}</p>";
              }
            ?>



          </div>
        </div>


  </section>






<!--.................
... BEGIN SITE.......
..................-->


<!--.................
... END SITE.......
..................-->




<script src="script/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="script/bootstrap/bootstrap.js"></script>

</body>

</html>
