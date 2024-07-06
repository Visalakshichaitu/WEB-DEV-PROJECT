<?php
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = "websitelogin";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($conn->connect_error) {
		die('Connection failed: ' . $conn->connect_error);
	} else {
	
    $stmt = $conn->prepare("INSERT INTO register(firstname,lastname,email,password) VALUES ( ?, ?,?,?)");
          $stmt->bind_param("ssss", $firstname,$lastname,$email,$password); 
          $stmt->execute();
          echo "Signed successfully";
          readfile('login.html');
          $stmt->close();
          $conn->close();
}


?>