<?php

session_start();
if (!isset($_SESSION['UsuarioID'])) {
  header("Location: index.php");
}

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());





  // Tenta se conectar a um banco de dados MySQL
//  mysql_select_db('pwebfinal') or trigger_error(mysql_error());
    
  $qtdrodada = mysqli_real_escape_string($conexao, $_POST['rodada']);
  $qtdtime = mysqli_real_escape_string($conexao, $_POST['times']);
  
  $sql = "INSERT INTO contagem(idcontagem,qntdrodada,qntdtimes) VALUES (NULL,'$qtdrodada','$qtdtime')";
  $query = mysqli_query($conexao,$sql);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar times</title>
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
        <li class="dropdown">
          <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configurações <span class="caret configcollor"></span></a>
          <ul class="dropdown-menu">
            <li><a href="">Rodadas</a></li>
            
            
            <li role="separator" class="divider"></li>
           <li><a href="">Times</a></li>
            
            
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<div class="container-fluid bg3">
	<div class="espaco1">

<form method="POST" action="cad.php" enctype="multipart/form-data">
<h4 class="cadastrotime">Insira aqui os times e seus respectivos brasões:</h4><br>
<?php
session_start();
$i = 1;

$_SESSION['tottimes'] = $qtdtime;

while ( $i<= $qtdtime) { 


  
	
	echo "<h5 class='cadastrotime'>Nome do time: <input class='formcontroll' type='text' name = '$i' ></h5>"; 
	echo "<h5 class='cadastrotime'>Foto do time: </h5> <input class='cadastrotime' type='file' name='arquivo$i'><br><br>";
 
$i++;
}
?>
	<button type="submit" class="btn btn-success">Cadastrar</button><br>
</div>

</form>
</div>

</body>
</html>
