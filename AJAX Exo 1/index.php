<!DOCTYPE html>
<html>
<head>
	<title>Ajax exo 1</title>
	<meta charset="utf-8">
</head>
<body>
	<div id="change"></div>
	<input type="text" id="gary">
	<button onclick="changement()">Afficher les données</button>
	<script type="text/javascript">
		function changement() {
			var id = document.getElementById("gary").value;
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function () {
				if(xhr.readyState == 4 && xhr.status == 200) {
					document.getElementById("change").innerHTML = xhr.responseText;
				}
			}
			xhr.open("GET", "ajax.php?id="+id, true);
			xhr.send();
		}
	</script>
</body>
</html>