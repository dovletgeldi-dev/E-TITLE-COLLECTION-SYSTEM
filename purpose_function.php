<?php

	session_start();

		
	$dispatchic = $_POST['dispatchic'];	
	$nameofdeveloper = $_POST['nameofdeveloper'];
	$titleid = $_POST['titleid'];
	$titlename = $_POST['titlename'];
	$documentname = $_POST['documentname'];
	$remarks = $_POST['remarks'];


	$conn = new mysqli('localhost','root','','etcs_database');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else  {
		$stmt = $conn->prepare("insert into visit_purpose (developer_name, remarks, dispatch_ic ) values (?, ?, ? )");
		$stmt->bind_param("sss", $nameofdeveloper, $remarks, $dispatchic );
		
		$stmts = $conn->prepare("insert into titles (title_id, title_name, document_name, dispatch_ic  ) values (?, ?, ?, ? )");
		$stmts->bind_param("ssss", $titleid, $titlename, $documentname, $dispatchic );
		
		$execval = $stmt->execute();
		$execvals = $stmts->execute();
		
		
		
	
		$_SESSION["MessageThatComeFromPurposePage"] = "Registration Successfully";		
		header("location:main_page.php");
		
		$stmt->close();
		$conn->close();
	}
?>


