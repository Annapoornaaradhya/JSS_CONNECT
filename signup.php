<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, email, password, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfull...";
		$stmt->close();
		$conn->close();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.search {
  width: 330px;
  float: left;
  margin-left: 270px;
}

.srch {
  font-family: "Times New Roman";
  width: 200px;
  height: 40px;
  background: transparent;
  border: 1px solid #ff7200;
  margin-top: 13px;
  color: #fff;
  border-right: none;
  font-size: 16px;
  float: left;
  padding: 10px;
  border-bottom-left-radius: 5px;
  border-top-left-radius: 5px;
}

.btn {
  width: 100px;
  height: 40px;
  background: #ff7200;
  border: 2px solid #ff7200;
  margin-top: 13px;
  color: #fff;
  font-size: 15px;
  border-bottom-right-radius: 5px;
  border-bottom-right-radius: 5px;
  transition: 0.2s ease;
  cursor: pointer;
}
.btn:hover {
  color: #000;
}

.btn:focus {
  outline: none;
}

.srch:focus {
  outline: none;
}
	</style>
</head>
<body>
<div class="search">
                <input class="srch" type="search" name="" placeholder="Search Here">
                <a href="index.html"> <button class="btn">LOGIN!!</button></a>
            </div>
</body>
</html>