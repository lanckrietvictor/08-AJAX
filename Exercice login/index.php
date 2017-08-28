<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<body>
	<form action="index.php" method="GET">
		Username: <input type="text" id="username">
		<br>
		Password: <input type="password" id="password">
	</form>
	<button onclick="check(); load();">Submit</button>
	<div id="cancel"></div>
	<br>
	<div id="succes"></div>
	<script>
		function check () {
			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
			var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function() {
				if (ajax.readyState == 4 && ajax.status == 200) {
					document.getElementById("succes").innerHTML = ajax.responseText;
					if (ajax.responseText == ("Login was successful, welcome "+username+"!")) {
						document.getElementById("cancel").innerHTML = "";
					}

					else if (ajax.responseText == ("Wrong password, try again.")) {
						document.getElementById("cancel").innerHTML = "";
					}

					else if (ajax.responseText == ("Username does not exist, try again.")) {
						document.getElementById("cancel").innerHTML = "";
					}
				}
			};
			ajax.open("GET", "ajax.php?username="+username+"&password="+password, true);
			ajax.send();

			document.getElementById("cancel").innerHTML = "<button onclick='cancel()'>Cancel</button>";
		}

		function load () {
			document.getElementById("succes").innerHTML = "<img style='height: 100px; width: auto;' src='https://i2.wp.com/media.boingboing.net/wp-content/uploads/2015/10/tumblr_nlohpxGdBi1tlivlxo1_12801.gif?w=970'>" ;
		}

		function cancel () {
			window.stop();
			document.getElementById("cancel").innerHTML = "";
			document.getElementById("succes").innerHTML = "";
		}

			
	</script>
</body>
</html>