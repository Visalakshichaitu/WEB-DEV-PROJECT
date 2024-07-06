<?php
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = "websitelogin";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	$username = $_POST['username'];
	$password = $_POST['password'];

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $stmt = $conn->prepare("INSERT INTO login(username,password) VALUES ( ?, ?)");
          $stmt->bind_param("ss", $username,$password); 
          $stmt->execute();
          echo "Logged in successfully";
          readfile('login.html');
          $stmt->close();
          $conn->close();
}


?>