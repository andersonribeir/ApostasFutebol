<?php 

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$sql1 = "SELECT * FROM pontuacao";
$query1 = mysqli_query($conexao,$sql1);
$resultado1 = mysqli_fetch_array($query1);
if (empty($resultado1)) { ?>

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
<div class="container-fluid bg5">

<div class="container">
  <div class="row">
    <div class="container col-sm-12 col-lg-12 col-xl-12">
      <CENTER><h4 class="configcollor rankingg">O ranking ainda não está disponível</h4></CENTER>
    </div>
  </div>
</div>
</div>

<?php  } else { ?>


 
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
<div class="container-fluid bg5">

<?php 
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$sql = "SELECT rodada_idrodada FROM pontuacao ORDER BY rodada_idrodada DESC LIMIT 1";
$query = mysqli_query($conexao,$sql);
$resultado = mysqli_fetch_array($query);
$rodada = $resultado['rodada_idrodada'];


 echo "<div class = 'container'>
    <div class='row'>
    <div container col-sm-3 col-lg-3 col-xl-3>

    ";
      echo "<table class = 'table'>";
    
        echo "<thead>";
    echo "<tr>";
    echo "<th scope = 'col' class='configcolor'>Posição</th>";
    echo "<th scope = 'col' class='configcolor'>Usuario</th>";
    echo "<th scope = 'col' class='configcolor'>Pontos</th>";
    echo "</tr>";
    echo "</thead>";

  $i = 1;
  $sqlrank = "SELECT pontos,usuario_loginuser FROM pontuacao WHERE rodada_idrodada = '{$rodada}' GROUP BY usuario_loginuser ORDER BY pontos DESC ";
    $queryrank = mysqli_query($conexao,$sqlrank);
    
  while ($resultadorank = mysqli_fetch_array($queryrank)) {
    
    
    

    echo "<tbody>";
    echo "<tr class = testetable>";
    echo "<th scope='row' class='testetable'>".$i."</th>";
    echo "<th scope='row' class='testetable'>".$resultadorank['usuario_loginuser']."</th>";
    echo "<th scope='row' class='testetable'>".$resultadorank['pontos']."</th>";
    echo "</tr>";

    
    echo "</tbody>";
    $i++;

  }
  echo "</table>";
  

echo "
</div>
</div>
</div>

";




 ?>
 </div>

</body>
</html>
<?php } ?>