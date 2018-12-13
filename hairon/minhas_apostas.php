<?php 
session_start();

if (!isset($_SESSION['UsuarioID'])) {
  header("Location: index.php");
}

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$sql = "SELECT idrodada,status FROM rodada ORDER BY idrodada DESC LIMIT 1";
$query1 = mysqli_query($conexao,$sql);

$resultado = mysqli_fetch_array($query1);
$rodadaatual = $resultado['idrodada'];

if (empty($rodadaatual)) {?>

<!DOCTYPE html>
<html>
<head>
	<title>Minhas Apostas</title>
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
<body><nav class="navbar navbar-default navbar-fixed-top">
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
          <a class="not-active" href="aposta.php">Apostar</a>
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
<br>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="divh4">
		<div class="col-xl-6">
<form method="POST" action="ver_aposta.php">
	<h4 class="minhasapostas">Selecione a rodada desejada:</h4>
	<select class="minhasapostas" name = "rodada" value = "rodada">
	</div>
	</div>

<?php 
echo "<div class='divselect'>";
echo "<div class='col-sm-6'>";
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$sql = "SELECT idrodada FROM rodada ORDER BY idrodada";
$query = mysqli_query($conexao, $sql);


while ($resultado = mysqli_fetch_assoc($query)) {?>
	<option class="configcollor" value = "<?php $resultado['idrodada'] ?>"><?php echo $resultado['idrodada'];?> 
	</option>
	<?php
	}
	echo "</div>";
	echo "</div>";
	?>

 </select>
 <div class="divexibiraposta"><input class="btn btn-success" type="submit" name="ver" value="Exibir Apostas"></div>
 
</div>
</form>
</div>




</body>
</html>


<?php  }  else  { ?>
  <!DOCTYPE html>
<html>
<head>
  <title>Minhas Apostas</title>
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
<body><nav class="navbar navbar-default navbar-fixed-top">
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
          <a  href="aposta.php">Apostar</a>
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
<div class="container-fluid bg1">
<br>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="divh4">
    <div class="col-xl-6">
<form method="POST" action="ver_aposta.php">
  <h4 class="minhasapostas">Selecione a rodada desejada:</h4><br>
  <center><select class="minhasapostas1 form-select" name = "rodada" value = "rodada"></center>
  </div>
  </div>

<?php 
echo "<div class='divselect'>";
echo "<div class='col-sm-6'>";
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$sql = "SELECT idrodada FROM rodada ORDER BY idrodada";
$query = mysqli_query($conexao, $sql);


while ($resultado = mysqli_fetch_assoc($query)) {?>
  <option class="minhasapostas1" value = "<?php echo $resultado['idrodada'];?>"><?php echo $resultado['idrodada'];?> 
  </option>
  <?php
  }
  echo "</div>";
  echo "</div>";
  ?>

 </select>
 <br>
 <div class="divexibiraposta"><input class="btn btn-success" type="submit" name="ver" value="Exibir Apostas"></div>
 
</div>
</form>
</div>



</div>
</body>
</html>
<?php }  ?>