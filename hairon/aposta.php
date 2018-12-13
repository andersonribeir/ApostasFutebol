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
$statusrodadaatual = $resultado['status'];

$_SESSION['rodadas'] = $rodadaatual;
$login = $_SESSION['UsuarioID'];
$sql1 = "SELECT * FROM aposta WHERE usuario_loginuser = '{$login}' AND  rodada_idrodada = '{$rodadaatual}' ";

$query2 = mysqli_query($conexao,$sql1);
$linha = mysqli_num_rows($query2);


if (mysqli_num_rows($query2) == 0) { ?>



  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
   <title>Início</title>
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





    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><br><br>
<div class="container-fluid bg2 ">
<form class = "container-fluid" method="POST" action="apostar.php">


  <?php

  $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
  $sql = "SELECT nometime,fototime FROM timescad ORDER BY nometime";
  $query = mysqli_query($conexao,$sql);
  $dadosrecebidos = mysqli_fetch_array($query);
  $time = $dadosrecebidos['nometime'];
  $foto = $dadosrecebidos['fototime'];
  $c = 1;
  if(!!$query){

    echo "<div class='container'>
    <div class='row'>

    <div class='container-fixed col-sm-12 col-lg-6 col-xl-6'> <center><h5 class='configcollor'>Times Disponíveis</h5></center>
    <row>";

    foreach($query as $item){
      $timee = $item['nometime'];
      $fotoo = $item['fototime'];

      echo "<div class='container col-sm-3 col-lg-3 col-xl-3'><div class='telinha '><img src='backup/$fotoo'>

      <h5 class='configcolor'>$timee</h5></div>";

      echo "</div>";

    }

    echo "</row></div>";  
  } 

  ?>

  <?php 
  $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
  $sql = "SELECT count(idtime) FROM timescad";
  $query1 = mysqli_query($conexao,$sql);

  $totaltime = mysqli_fetch_array($query1);

  $qtdtimes = $totaltime['count(idtime)'];

  $_SESSION['totaltimes'] = $qtdtimes;



  echo "<div class = 'container col-sm-12 col-lg-4 col-xl-4 inputalinha'><h5 class='configcollor'>Faça a sua aposta</h5>";


  $i = 1;

  while ($i <= $qtdtimes) {
   echo "<input class = 'inputtime' type='text' name='$i'><br>";
   $i++;
 }
 echo "<button class='btinput btn-success' type='submit'>Apostar</button>";
 echo "</div>";
 echo "</div>";
 echo "</div>"
 ?>




</form>
</div>
</body>
</html>

<?php }


else {
      // Salva os dados encontrados na variável $resultado
  $resultado = mysqli_fetch_assoc($query2);
  
  ?>
  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
   <title>Início</title>
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





    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><br><br>
<div class="container-fluid bg2">
<form class = "container-fluid" method="POST" action="editapostar.php">


  <?php

  $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
  $sql = "SELECT nometime,fototime FROM timescad ORDER BY nometime";
  $query = mysqli_query($conexao,$sql);
  $dadosrecebidos = mysqli_fetch_array($query);
  $time = $dadosrecebidos['nometime'];
  $foto = $dadosrecebidos['fototime'];
  $c = 1;
  if(!!$query){

    echo "<div class='container'>
    <div class='row'>

    <div class='container-fixed col-sm-12 col-lg-6 col-xl-6'> <center><h5 class='configcollor'>Times Disponíveis</h5></center>
    <row>";

    foreach($query as $item){
      $timee = $item['nometime'];
      $fotoo = $item['fototime'];

      echo "<div class='container col-sm-3 col-lg-3 col-xl-3'><div class='telinha '><img src='backup/$fotoo'>

      <h5 class='configcolor'>$timee</h5></div>";

      echo "</div>";

    }

    echo "</row></div>";  
  } 

  ?>

  <?php 
  $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
  $sql = "SELECT count(idtime) FROM timescad";
  $query1 = mysqli_query($conexao,$sql);

  $totaltime = mysqli_fetch_array($query1);

  $qtdtimes = $totaltime['count(idtime)'];

  $_SESSION['totaltimes'] = $qtdtimes;



  echo "<div class = 'container col-sm-12 col-lg-4 col-xl-4 inputalinha'><h5 class='configcollor'>Faça a sua aposta</h5>";


  $i = 1;

  while ($i <= $qtdtimes) {
    $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
    $sqlinput = "SELECT times_idtime FROM aposta WHERE colocacaotime_idcolocacaotime = '{$i}' and rodada_idrodada = '{$rodadaatual}' and usuario_loginuser = '{$login}' ";

    $queryinput = mysqli_query($conexao,$sqlinput);
    $result = mysqli_fetch_assoc($queryinput);
    $preencherinput = $result['times_idtime'];

    $sqlinput1 = "SELECT nometime FROM timescad WHERE idtime = '{$preencherinput}'";
    $queryinput1 = mysqli_query($conexao,$sqlinput1);
    $result1 = mysqli_fetch_assoc($queryinput1);
    $valueinput = $result1['nometime'];



    echo "<input class = 'inputtime' type='text' name='$i' value = '$valueinput'><br>";
    $i++;
  }
  echo "<button class='btinput not-active btn-success' type='submit'>Apostar</button><br>";
  echo "<button class='btinput btn-info' type='submit'>Editar Aposta</button>";
  echo "</div>";
  echo "</div>";
  echo "</div>"
  ?>




</form>
</div>
</body>
</html>



<?php } ?>















