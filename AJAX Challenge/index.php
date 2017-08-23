<?php 

//Faire le line avec le base de donnée
include "connection.php";

//retrieve data from table
$drop_clients = $pdo->query("SELECT * FROM clients");
$dropdown = $drop_clients->fetchAll();

$results_clients = $pdo->query("SELECT * FROM clients");
$clients = $results_clients->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Ajax challenge</title>
	<meta charset="utf-8">
</head>
<body>

	<div id="dropdown">
		<select name="name" id="lastName">
			<?php 
			foreach ($dropdown as $key => $value) {
				echo "<option value='".$value["lastName"]."'>".$value["firstName"]." ".$value["lastName"]."</option>";
			}

			?>
		</select>
	</div>

	<br>
	<button onclick="affiche();">Afficher les coordonées</button>
	<br>
	<br>
	<div id="change">
	</div>
	
	<script type="text/javascript">
		function affiche () {
			var lastName = document.getElementById("lastName").value;
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function () {
				if (xhr.readyState == 4 && xhr.status == 200) {
					document.getElementById("change").innerHTML = xhr.responseText;
				}
			}
			xhr.open("GET", "ajax.php?lastName="+lastName, true)
			xhr.send();
		}
	</script>
</body>
</htm