<?php
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = "websitelogin";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	$username = $_POST['username'];
	$email = $_POST['email'];
    $phone = $_POST['phone'];
	$message = $_POST['message'];

	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($conn->connect_error) {
		die('Connection failed: ' . $conn->connect_error);
	} else {
	
    $stmt = $conn->prepare("INSERT INTO help(username,email,phone,message) VALUES ( ?, ?,?,?)");
          $stmt->bind_param("ssis", $username,$email,$phone,$message); 
          $stmt->execute();
          echo "Submitted successfully";
          readfile('helpPage.html');
          $stmt->close();
          $conn->close();
}


?>