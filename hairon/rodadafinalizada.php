<?php
session_start();
if (!isset($_SESSION['UsuarioID'])) {
  header("Location: index.php");
}?>

<!DOCTYPE html>
<html>
<head>
	<title>Finalizar Rodada</title>
	<meta charset="utf-8">
	  

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
            <li><a href="config.php">Configuração inicial</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="configrodada.php">Rodadas</a></li>         
           <li><a href="configtimes.php">Times</a></li>
            
            
          </ul>
        
        <li><a href="rodadafinalizada.php">Resultado Final</a></li>
      </ul>

      <form class="navbar-form navbar-right" method="POST" action="logout.php" >
        <button class="btn btn-outline-danger my-2 my-sm-0">Sair</button>
      </form>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<?php

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$sql = "SELECT count(nometime) FROM timescad";
$query1 = mysqli_query($conexao,$sql);

$totaltime = mysqli_fetch_array($query1);

$qtdtimes = $totaltime['count(nometime)'];
$_SESSION['inputfinal'] = $qtdtimes;  
 
 echo "<form class='container-fluid' method='POST' action ='dadosfinalizados.php'>";
 $c=1;
 echo "<div class = 'container restrito'>";

 echo "<div class = 'row'>";

 echo "<div class='container col-sm-4 col-lg-12 col-xl-12 top'>";
 echo "<center><h5 class = 'configcolor'>Insira o resultado final dessa rodada</h5></center><br>";

 echo "<center>";

 while ($c <= $qtdtimes) {
 	echo "<input class = 'inputtime' type='text' name='$c'><br>";
 	$c++;
 }
 echo "</div>";
 echo "<div class='container col-sm-4 col-lg-12 col-xl-12 top'>";
	echo "<center><button type='submit' class='btn btn-success'>Fechar rodada</button><center>";
	echo "</center>
	</div>
	</div>
	</div>
	</form>
	";


  ?>
  </body>
</html>

  
