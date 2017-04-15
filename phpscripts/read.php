<?php
	//echo "From init.php";

	function getAll($tbl) {
		include("connect.php");
		$queryAll = "SELECT * FROM {$tbl}";
		//echo $queryAll;
		$runAll = mysqli_query($link, $queryAll);

		if($runAll) {
			return $runAll;
		}else{
			$error = "There was an error accessing this information. Please contact Web Admin for tech support.";
			return $error;
		}

		mysqli_close();
	}

	function filterType($tbl, $tbl1, $tbl2, $col, $col1, $col2, $filter) {
		include("connect.php");
		$queryFilter = "SELECT * FROM {$tbl}, {$tbl1}, {$tbl2} WHERE {$tbl}.{$col}={$tbl2}.{$col} AND {$tbl1}.{$col1}={$tbl2}.{$col1} AND {$tbl1}.{$col2}='{$filter}'";
		$runFilter = mysqli_query($link, $queryFilter);

		if($runFilter) {
			return $runFilter;
		}else{
			$error = "There was an error accessing this information. Please contact Web Admin for tech support.";
			return $error;
		}

		mysqli_close($link);
	}


		function getSingle($tbl, $col, $id){
			include("connect.php");
			$querySingle = "SELECT * FROM {$tbl} WHERE {$col}={$id}";
			//echo $querySingle;
			$runSingle = mysqli_query($link, $querySingle); //either we get object or error

			if($runSingle){
				return $runSingle;
			}else {
				$error = "This was not the movie you were looking for...";
				return $error;
			}


		mysqli_close($link);

	}


?>
