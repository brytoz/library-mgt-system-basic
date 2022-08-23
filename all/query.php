<?php
date_default_timezone_set('Africa/lagos');
ob_start();
session_start();
require('conn.php');	
	
function register($conn){ 

	if (isset($_POST['submit'])) {

	if (isset($_POST["Reg_num"]) && isset($_POST["fullname"]) && isset($_POST["dept"]) && isset($_POST["password"]) ) {

		if (!empty($_POST["Reg_num"]) && !empty($_POST["fullname"]) && !empty($_POST["dept"])  && !empty($_POST["password"])) {
			
			$Reg_num = $_POST["Reg_num"];
			$fullname = $_POST["fullname"];
			$dept = $_POST["dept"];
			$password = $_POST["password"]; 
			//crypt the password
			$salt = sha1(md5($password)).'^#|!@#$%%vZsQ2lB8g0s'; 
			$password_hash = md5($password.$salt);
			$timestamp = date('Y-m-d  H:i:s');


			$sql_Reg_num = "SELECT `Reg_num` FROM users WHERE Reg_num LIKE '".mysqli_real_escape_string($conn, $Reg_num)."'";

			
			$userResult = mysqli_query($conn, $sql_Reg_num);

			//check for similar users
			if (  mysqli_num_rows($userResult) === 1){
				echo '<script>document.getElementById("labelfor").innerHTML = "Registration Number already exist!" ;</script>';
			
			} else {

				//INSERTING
				//i am here
				$insert = "INSERT INTO users VALUES ('', 
				'".mysqli_real_escape_string($conn, $Reg_num)."',
				'".mysqli_real_escape_string($conn, $fullname)."',
				'".mysqli_real_escape_string($conn, $dept)."',
				'".mysqli_real_escape_string($conn, $password_hash)."',
				'".mysqli_real_escape_string($conn, $timestamp)."')";


				$insert_query =  mysqli_query($conn, $insert);

				if ($insert_query == true ) {
					echo '<script> window.location.replace("login.php") </script>';
				} else{
					echo '<script> alert("Sorry, we couldn\'t Register you this time please try again later");</script>';
					echo'<script> window.location.replace("register.php")';
				}
			}


		} else {
			echo'<script> alert("Please fill in all fields"); </script>';
			echo'<script> window.location.replace("register.php")</script>';
		}

	} else {
		echo'<script> alert("Please fill in all fields"); </script>';
		echo'<script> window.location.replace("register.php")</script>';
	}

}


}



function login($conn){

	if (isset($_POST['submit'])) {


		if(isset($_POST['Reg_num']) && isset($_POST['password'])){

			$Reg_num = $_POST["Reg_num"];
			$password = $_POST["password"]; 
			//crypt the password
			$salt = sha1(md5($password)).'^#|!@#$%%vZsQ2lB8g0s'; 
			$password_hash = md5($password.$salt);

			if (!empty($Reg_num) &&!empty($password)){

				//$Reg_num1 = substr($Reg_num, 0, 4);


					//echo '<script>document.getElementById("labelforw").innerHTML = " Reg_num or password!";</script>';
					
					$adminw = 10108928740;
					if ($Reg_num == $adminw ) {



							$sql_select = "SELECT `id` FROM admin WHERE admin_code LIKE 
							'".mysqli_real_escape_string($conn, $Reg_num)."' AND password LIKE 
							'".mysqli_real_escape_string($conn, $password_hash)."'";

							$login_query = mysqli_query($conn, $sql_select);
							$rows = mysqli_num_rows($login_query);



							
							

							if ($rows==0) {
								
								echo '<script>document.getElementById("labelforw").innerHTML = "Incorrect Reg_num or password!";</script>';
							}else if ($rows==1) {

								$count = mysqli_fetch_row($login_query);
								$user_id = $count[0];
									//set cookie 
								setcookie('Reg_num', $Reg_num, time() + 28800, '/');
								setcookie('password', $password_hash, time() + 28800, '/');
								
								$_SESSION['user_id'] = $user_id;

								
									//Redirect to profile.php page
								header('Location: admin/dashboard.php');	
								
															
							}	


					} else {
						
					



						$sql_select = "SELECT `id` FROM users WHERE reg_num LIKE 
						'".mysqli_real_escape_string($conn, $Reg_num)."' AND password LIKE 
						'".mysqli_real_escape_string($conn, $password_hash)."'";

						$login_query = mysqli_query($conn, $sql_select);
						$rows = mysqli_num_rows($login_query);



					
						
						if ($rows==0) {

							echo '<script>document.getElementById("labelforw").innerHTML = "Incorrect Reg_num or password!";</script>';
						}else if ($rows==1) {

							$count = mysqli_fetch_row($login_query);
							$user_id = $count[0];
								//set cookie 
							setcookie('Reg_num', $Reg_num, time() + 28800, '/');
							setcookie('password', $password_hash, time() + 28800, '/');
							
							$_SESSION['user_id'] = $user_id;

							
								//Redirect to profile.php page
							header('Location: user/dashboard.php');
							
														
						}



					} 

			} else {
				echo '<script>document.getElementById("info").innerHTML = "Fields are empty!"; </script>';
			}
		}
	}

}









//logged in function
function loggedin() {
	if (isset($_COOKIE['Reg_num']) && isset($_COOKIE['password']) && isset($_SESSION['user_id'])) {
		return true;
	} else {
		return false; 
	}
}







/*

 //change password function
 function changepassword($conn) {
	$Reg_num = UserId('Reg_num'); 
	$_SESSION['Reg_num'] = $Reg_num;
	 
	 if (isset($_POST['passwordchange']) && isset($_POST['new_password']) && isset($_POST['password_again']) && isset($_POST['submit'])) {
		 $passwordchange = mysqli_real_escape_string($conn, $_POST['passwordchange']);
		 $hash = md5($passwordchange);
		 
		 $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
		 $password_again = mysqli_real_escape_string($conn, $_POST['password_again']);
		 
		 
		 if (empty($passwordchange) && empty($new_password) && empty($password_again)) {
			 echo '<script>alert("Please fill all fields");</script>';
		 } else {
			if ($new_password == $password_again) {
				$sql = "SELECT * FROM myguests WHERE `Reg_num` LIKE '".$_SESSION['Reg_num']."'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($result);
				
				if ($hash == $row["password"]) {
					$new_hash = md5($new_password);
					$up = "UPDATE myguests SET password='".$new_hash."' WHERE Reg_num='".$_SESSION['Reg_num']."'";
					$up_result = mysqli_query($conn, $up);
					//Redirect to the profile page with a success domain
					header('Location: setting.php?PasswordChanged succesfully');
					
				} else {
					 echo 'your recent password is incorrect!';
				}
				
			} else {
				 echo '<script>alert("Your new password do not match!");</script>';
			}
		 }
	 }
 }
 
 
 */