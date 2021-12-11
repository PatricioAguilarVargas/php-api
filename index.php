<!DOCTYPE html>
<?php //var_dump( $_SERVER) ?>
<html>
	<head>
		<link rel="icon" href="favicon.ico">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
		<h2>API REST en PHP</h2>
			<form id="form">
			 <div class="mb-3">
			  <label for="metodo" class="form-label">Metodos Api</label>
			  <select id="metodo" class="form-select">
				<option value="user">User List</option>
			  </select>
			  <label for="limit" class="form-label">Limit</label>
			  <select id="limit" class="form-select">
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="15">15</option>
			  </select>
			</div>
			  <input class="btn btn-primary" type="button" id="enviar" value="Enviar">
			</form> 

			<p>Llama a la api de la pagina call.php</p>
			<div id="respuesta"></div>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script>
			function callApi(){
				// Creamos un nuevo XMLHttpRequest
				var xhttp = new XMLHttpRequest();

				// Esta es la función que se ejecutará al finalizar la llamada
				xhttp.onreadystatechange = function() {
				  // Si nada da error
				  if (this.readyState == 4 && this.status == 200) {
					// La respuesta, aunque sea JSON, viene en formato texto, por lo que tendremos que hace run parse
					//console.log(JSON.parse(this.responseText));
					document.getElementById('respuesta').innerHTML  = this.responseText
				  }
				};
				
				var method = document.getElementById("metodo").value;
				var limit = document.getElementById("limit").value;
				
				// Endpoint de la API y método que se va a usar para llamar
				xhttp.open("GET", "call.php/" + method + "/list?limit=" + limit, true);
				xhttp.setRequestHeader("Content-type", "application/json");
				// Si quisieramos mandar parámetros a nuestra API, podríamos hacerlo desde el método send()
				xhttp.send(null);
			}
			document.getElementById('enviar').addEventListener('click', callApi);
		</script>
	</body>
</html>
