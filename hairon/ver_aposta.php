<?php
session_start();
if (!isset($_SESSION['UsuarioID'])) {
  header("Location: index.php");
}?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Início</title>
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
      <a class="navbar-brand" href="index4.php">Início</a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="ver_ranking.php">Ranking</a></li>    

        </li>

        <li>
          <a href="aposta.php">Apostar</a>
        </li>
        <li>
          <a href="minhas_apostas.php">Minha aposta</a>
        </li>
      </ul>

      <form class="navbar-form navbar-right" method="POST" action="logout.php" >
        <button class="btn btn-outline-danger my-2 my-sm-0">Sair</button>
      </form>

    </div>
  </div>

</nav>
<br><br><br>



<?php
 

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$usuario = $_SESSION['UsuarioID'];
$rodadap = mysqli_real_escape_string($conexao,$_POST['rodada']);
$sqlaposta = "SELECT colocacaotime_idcolocacaotime,times_idtime FROM aposta WHERE rodada_idrodada = '{$rodadap}' and usuario_loginuser = '{$usuario}' ";
	$queryaposta = mysqli_query($conexao,$sqlaposta);  
  
  
  if (mysqli_num_rows($queryaposta) == 0) {
      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
      echo "Você não jogou nessa partida";
  }
  else{
    echo "<div class = 'container'>
    <div class='row'>
    <div container col-sm-6 col-lg-6 col-xl-6>

    ";
  		echo "<table class = 'table'>";
  	
  	    echo "<thead>";
		echo "<tr>";
		echo "<th scope = 'col' class='configcolor'>Posição</th>";
		echo "<th scope = 'col' class='configcolor'>Time</th>";
		echo "</tr>";
		echo "</thead>";

	
	while ($resultadoaposta = mysqli_fetch_array($queryaposta)) {
		$sqltime = "SELECT nometime FROM timescad WHERE idtime = '{$resultadoaposta['times_idtime']}'";
		$querytime = mysqli_query($conexao,$sqltime);
		$resultadotime = mysqli_fetch_array($querytime);
		
		

		echo "<tbody>";
		echo "<tr class = testetable>";
		echo "<th scope='row' class='testetable'>".$resultadoaposta['colocacaotime_idcolocacaotime']."</th>";
		echo "<th scope='row' class='testetable'>".$resultadotime['nometime']."</th>";
		echo "</tr>";

		
		echo "</tbody>";

	}
	echo "</table>";
	echo "<form  class method='POST' action = 'minhas_apostas.php'><button class = 'btn btn-success' >Voltar</button>";
}
echo "
</div>
</div>
</div>

";


 ?>


</body>
</html>