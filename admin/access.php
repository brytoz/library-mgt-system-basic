<?php
require ('../all/conn.php');
date_default_timezone_set('Africa/lagos');

function load($conn) {
	if (isset($_POST['submit'])) {
		if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["dept"]) && isset($_POST["position"]) ) {

			if (!empty($_POST["id"]) && !empty($_POST["name"]) && !empty($_POST["dept"])  && !empty($_POST["position"])) {

				$id =  $_POST["id"];
				$name =  $_POST["name"];
				$dept =  $_POST["dept"];
				$pos =  $_POST["position"];
				$status =  'Available';

				$insert = "INSERT INTO books VALUES (
				'".mysqli_real_escape_string($conn, $id)."',
				'".mysqli_real_escape_string($conn, $name)."',
				'".mysqli_real_escape_string($conn, $dept)."',
				'".mysqli_real_escape_string($conn, $pos)."',
				'".mysqli_real_escape_string($conn, $status)."')";


				$insert_query =  mysqli_query($conn, $insert);


				if ($insert_query == true ) {
					echo '<script> alert("Succesfully Updated");</script>';
					echo '<script> window.location.replace("viewAll.php") </script>';
				} else{
					echo '<script> alert("Sorry, we couldn\'t update info at this time. please try again later");</script>';
					echo'<script> window.location.replace("viewAll.php")';
				}


			} else {
				echo'<script> alert("Please fill in all fields"); </script>';
				echo'<script> window.location.replace("viewAll.php")</script>';
			}
		} else {
			echo'<script> alert("Please fill in all fields"); </script>';
			echo'<script> window.location.replace("viewAll.php")</script>';
		}
	} 

}


function addload($conn) {
	if (isset($_POST['submit'])) {
		if (isset($_POST["id"]) && isset($_POST["reg_num"]) && isset($_POST["dept"]) ) {

			if (!empty($_POST["id"]) && !empty($_POST["reg_num"]) && !empty($_POST["dept"]) ) {

				$id =  $_POST["id"];
				$reg_num =  $_POST["reg_num"];
				$dept =  $_POST["dept"];
				$status =  'Unavailable';
				$timestamp = date('Y-m-d  H:i:s');


				$insert = "INSERT INTO `borrowed_books` VALUES (
				'".mysqli_real_escape_string($conn, $id)."',
				'".mysqli_real_escape_string($conn, $reg_num)."',
				'".mysqli_real_escape_string($conn, $dept)."',
				'".$timestamp."')";



				$insert_query =  mysqli_query($conn, $insert);


				$sql_select = "UPDATE `books` SET `status` = '".mysqli_real_escape_string($conn, $status)."' WHERE `books`.`books_id` = '".mysqli_real_escape_string($conn, $id)."'" ;

				$up_result = mysqli_query($conn, $sql_select);


				if ($insert_query == true ) {
					echo '<script> alert("Succesfully Updated");</script>';
					echo '<script> window.location.replace("borrowed.php") </script>';
				} else{
					echo '<script> alert("Sorry, we couldn\'t update info at this time. please try again later");</script>';
					echo'<script> window.location.replace("borrowed.php")';
				}


			} else {
				echo'<script> alert("Please fill in all fields"); </script>';
				echo'<script> window.location.replace("borrowed.php")</script>';
			}
		} else {
			echo'<script> alert("Please fill in all fields"); </script>';
			echo'<script> window.location.replace("borrowed.php")</script>';
		}
	} 

}
