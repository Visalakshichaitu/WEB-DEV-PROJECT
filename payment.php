<?php
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'websitelogin';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
	    $stmt = $conn->prepare("INSERT INTO appointment(name, phone, address) VALUES (?, ?, ?)");
          $stmt->bind_param("sss", $name, $phone, $address); 
          $stmt->execute();
          echo "Booked successfully";
          readfile('payment.html');
          $stmt->close();
          $conn->close();
    }
?>
