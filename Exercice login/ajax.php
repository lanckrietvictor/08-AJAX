<?php 

sleep(1);

$username = $_GET["username"];
$password = $_GET["password"];


$table = array (
	"user1" => array (
		"username" => "test",
		"password" => "test"),

	"user2" => array (
		"username" => "Victor",
		"password" => "Hello"),

	"user3" => array (
		"username" => "root",
		"password" => "user"),
	);

$length = count($table);

$i = 0;


foreach ($table as $key => $value) {
	if ($value["username"]==$username) {
		if ($value["password"]==$password) {
			echo "Login was successful, welcome ".$username."!";
			break;
		}

		else {
			echo "Wrong password, try again.";
			break;
		}
	}

	else {
		$i++;
	}
}

if ($i == $length) {
	echo "Username does not exist, try again.";
}

?>