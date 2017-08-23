<?php
$id = $_GET["id"];

try
{
	// On se connecte à MySQL
	$pdo = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'user');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
	die('Erreur : '.$e->getMessage());
}

//Collect information and put it in an array
$result_clients = $pdo->query("SELECT * FROM clients WHERE id = {$id}");
$clients = $result_clients->fetchAll(pdo::FETCH_OBJ);


//display all the information
foreach ($clients as $key => $value) {
			foreach ($value as $keys => $values) {
				echo $values." ";
			}
			echo "<br>";
		}
?>




