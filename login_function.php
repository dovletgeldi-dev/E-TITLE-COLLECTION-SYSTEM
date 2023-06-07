<?php

	// Just a function
	function sanitiseInput($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data; 
    } 

    session_start();

		require_once('database.php');

		if ($conn) {
			$username = sanitiseInput($_POST["username"]);
			$password = sanitiseInput($_POST["password"]);

			//Check if name exist
			$querySelect = "select * FROM members WHERE username = '$username' AND password = '$password'";  
			$resultSelect = @mysqli_query($conn, $querySelect);
			$row = @mysqli_fetch_array($resultSelect,MYSQLI_ASSOC);
			$count = @mysqli_num_rows($resultSelect);

			if($count == 1) {

				$_SESSION["MessageThatComeFromLoginProcessPage"] = "Login successfully";
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				header("location:main_page.php");
      		}
      		else {
      			$_SESSION["MessageThatComeFromLoginProcessPage"] = "Username or password invalid - Login failed";
      			header("location:login_page.php");
      		}			
		}
		mysqli_close($conn);	
?>

