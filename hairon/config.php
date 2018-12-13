<?php 

session_start();
if (!isset($_SESSION['UsuarioID'])) {
  header("Location: index.php");
}

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$sql1 = "SELECT idcontagem from contagem";
$query = mysqli_query($conexao,$sql1);
$resultado = mysqli_fetch_array($query);

if (isset($resultado)) {
header('location: restrito.php');

}
else{
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Configurações</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="css/global.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
	
  <div class="container-header">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="restrito.php">Início</a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="config.php">Configurações</a></li>    

        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
<form class="config container-fluid bginicio"  action="cadastro_time.php" method="POST">
<div class="espaco">
	<center>
		<label for = "rodada" class="configcollor" >Nº de rodadas:</label><br>
		<select  id="rodada" name="rodada" class="selects2 configcolor">
		<option class=" configcolor">1</option>
		<option class=" configcolor">2</option>
		<option class=" configcolor">3</option>
		<option class=" configcolor">4</option>
		<option class=" configcolor">5</option>
		<option class=" configcolor">6</option>
		<option class=" configcolor">7</option>
		<option class=" configcolor">8</option>
		</select>		
		</center>
		
<br>
<center>
		<label for = "times" class="configcollor">Nº de times:</label><br>
		<select id="times" name="times" class="selects2 configcolor">
		<option class=" configcolor">1</option>
		<option class=" configcolor">2</option>
		<option class=" configcolor">3</option>
		<option class=" configcolor">4</option>
		<option class=" configcolor">5</option>
		<option class=" configcolor">6</option>
		<option class=" configcolor">7</option>
		<option class=" configcolor">8</option>
		<option class=" configcolor">9</option>
		<option class=" configcolor">10</option>
		<option class=" configcolor">11</option>
		<option class=" configcolor">12</option>
		<option class=" configcolor">13</option>
		<option class=" configcolor">14</option>
		<option class=" configcolor">15</option>
		<option class=" configcolor">16</option>
		<option class=" configcolor">17</option>
		<option class=" configcolor">18</option>
		<option class=" configcolor">19</option>
		<option class=" configcolor">20</option>
		</select>
		</center>
		
		</div>


		<div>
<center>
	 	<button class=" botaoapostar btn-success" type="submit" >Cadastrar</button><br>
	 	</center>
</div>
	



</body>
</html>
<?php }  ?>