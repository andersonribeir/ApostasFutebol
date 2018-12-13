<?php 

session_start();
if (!isset($_SESSION['UsuarioID'])) {
  header("Location: index.php");
}

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$sql = "SELECT status from rodada order by idrodada desc limit 1";
$query = mysqli_query($conexao,$sql);
$resu = mysqli_fetch_array($query);
$rodd = $resu['status'];
if ($rodd == 'notok') {
  
 ?>
<!DOCTYPE html>
<html <html lang="pt-br">
<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title>Início</title> 
  <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  
</head>
<body>
  <!-- container section start -->
  

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
<div class="container-fluid bg4 restrito">

      
   

         <div class="margemcheck">
          <?php 
          $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
          $sql = "SELECT status FROM rodada ORDER BY idrodada DESC LIMIT 1";
          $query1 = mysqli_query($conexao,$sql);
          $resultado = mysqli_fetch_array($query1);
          $result = $resultado['status'];
          ?>
          <?php if ($result == 'ok') {
            ?>
            <form method="POST" action="rodada.php">
          <div class="toggle">

         <input type="checkbox" id="foo" name = "statusrodada" checked>
         <label for="foo"></label>
         <H6 class='configcollor centro'>Fechar Rodada</H6>

         </div>
          </div>
          <?php } else { 
            ?>
            <form method="POST" action="rodada.php">
          <div class="toggle">

         <input type="checkbox" id="foo" name = "statusrodada">
         <label for="foo"></label>
          <H6 class='configcollor centro'>Iniciar Rodada</H6>

         </div>
          </div>
          <?php } ?>
          <div class="container">
  <div class="row">
    <div class="container col-sm-6 col-lg-12 col-xs-12">

     <div class="reduzir">
    <section id="main-content">
      <section class="wrapper">
<?php  $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
          $sql = "SELECT count(loginuser) - 1 as num FROM usuario";
          $query1 = mysqli_query($conexao,$sql);
          $resultado = mysqli_fetch_array($query1);
          $numero = $resultado['num']  ?>


        <div class="displayacert">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg borders">
              <i class="fa fa-user"></i>
             <?php echo "<div class='count'>$numero</div> "?>
             <div class="title">Usuários</div>
            </div>
          
          </div>

<?php $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
          $sql = "SELECT count(idtime)  as num FROM timescad";
          $query1 = mysqli_query($conexao,$sql);
          $resultado = mysqli_fetch_array($query1);
          $numero = $resultado['num']  ?>          
         

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg borders">
              <i class="fa fa-futbol-o" aria-hidden="true"></i>
              <?php echo "<div class='count'>$numero</div> "?>
              <div class="title">Times</div>
            </div>
           
          </div>
 <?php $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
          $sql = "SELECT qntdrodada as num FROM contagem";
          $query1 = mysqli_query($conexao,$sql);
          $resultado = mysqli_fetch_array($query1);
          $numero = $resultado['num']  ?>  
          

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg borders">
              <i class="fa fa-clipboard" aria-hidden="true"></i>
              <?php echo "<div class='count'>$numero</div> "?>
              <div class="title">Rodadas</div>
            </div>
           
          </div>
          


          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg borders divclick" id="myDiv" >
              <i class="fa fa-cubes"></i>
              <div class="count">$</div>
              <div class="title">Ranking</div>

            </div>
            
          </div>
          <script>

  document.getElementById("myDiv").onclick = function() {

   window.open('rankingadm.php');
   
  };

</script>
          

        </div>
        
</div>
 </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="container col-sm-12 col-md-12 col-lg-12 col-xl-12 configcollor">
      <center><div><H3 class='configcollor'>Usuários cadastrados no momento</H3></div></center> 
<?php
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$sql = "SELECT loginuser, nomeuser,emailuser FROM usuario WHERE loginuser<> 'admin' ";
$query = mysqli_query($conexao,$sql);

echo "<div class = 'container'>
    <div class='row'>
    <div container col-sm-3 col-lg-3 col-xl-3>

    ";
      echo "<table class = 'table'>";
    
        echo "<thead>";
    echo "<tr>";
    echo "<th scope = 'col' class='configcolor'>Usuario</th>";
    echo "<th scope = 'col' class='configcolor'>Nome Usuario</th>";
    echo "<th scope = 'col' class='configcolor'>Email Usuario</th>";
    echo "</tr>";
    echo "</thead>";

    while ($resultadouser = mysqli_fetch_array($query)) {

    echo "<tbody>";
    echo "<tr class = testetable1>";
    echo "<th scope='row' class='testetable1'>".$resultadouser['loginuser']."</th>";
    echo "<th scope='row' class='testetable1'>".$resultadouser['nomeuser']."</th>";
    echo "<th scope='row' class='testetable1'>".$resultadouser['emailuser']."</th>";
    echo "</tr>";

    
    echo "</tbody>";
      
    }
     echo "</table>";

echo "
</div>
</div>
</div>

";  ?>

    </div>
  </div>

</div>
<div><button class="btn btn-success botao" type="submit">Salvar Alterações</button></div>

</form>
        
</div>
</body>
</html>
<?php } else { ?>
  <!DOCTYPE html>
<html <html lang="pt-br">
<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title>Início</title> 
  <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  
</head>
<body>
  <!-- container section start -->
  

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
        
        <li><a href="rodadafinalizada.php" class="not-active" disabled>Resultado Final</a></li>
      </ul>

      <form class="navbar-form navbar-right" method="POST" action="logout.php" >
        <button class="btn btn-outline-danger my-2 my-sm-0">Sair</button>
      </form>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid bg4 restrito">

      
   

         <div class="margemcheck">
          <?php 
          $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
          $sql = "SELECT status FROM rodada ORDER BY idrodada DESC LIMIT 1";
          $query1 = mysqli_query($conexao,$sql);
          $resultado = mysqli_fetch_array($query1);
          $result = $resultado['status'];
          ?>
          <?php if ($result == 'ok') {
            ?>
            <form method="POST" action="rodada.php">
          <div class="toggle">

         <input type="checkbox" id="foo" name = "statusrodada" checked>
         <label for="foo"></label>
         <H6 class='configcollor centro'>Fechar Rodada</H6>

         </div>
          </div>
          <?php } else { 
            ?>
            <form method="POST" action="rodada.php">
          <div class="toggle">

         <input type="checkbox" id="foo" name = "statusrodada">
         <label for="foo"></label>
          <H6 class='configcollor centro'>Iniciar Rodada</H6>

         </div>
          </div>
          <?php } ?>
          <div class="container">
  <div class="row">
    <div class="container col-sm-6 col-lg-12 col-xs-12">

     <div class="reduzir">
    <section id="main-content">
      <section class="wrapper">
<?php  $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
          $sql = "SELECT count(loginuser) - 1 as num FROM usuario";
          $query1 = mysqli_query($conexao,$sql);
          $resultado = mysqli_fetch_array($query1);
          $numero = $resultado['num']  ?>


        <div class="displayacert">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg borders">
              <i class="fa fa-user"></i>
             <?php echo "<div class='count'>$numero</div> "?>
             <div class="title">Usuários</div>
            </div>
          
          </div>

<?php $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
          $sql = "SELECT count(idtime)  as num FROM timescad";
          $query1 = mysqli_query($conexao,$sql);
          $resultado = mysqli_fetch_array($query1);
          $numero = $resultado['num']  ?>          
         

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg borders">
              <i class="fa fa-futbol-o" aria-hidden="true"></i>
              <?php echo "<div class='count'>$numero</div> "?>
              <div class="title">Times</div>
            </div>
           
          </div>
 <?php $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
          $sql = "SELECT qntdrodada as num FROM contagem";
          $query1 = mysqli_query($conexao,$sql);
          $resultado = mysqli_fetch_array($query1);
          $numero = $resultado['num']  ?>  
          

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg borders">
              <i class="fa fa-clipboard" aria-hidden="true"></i>
              <?php echo "<div class='count'>$numero</div> "?>
              <div class="title">Rodadas</div>
            </div>
           
          </div>
          


          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg borders divclick" id="myDiv" >
              <i class="fa fa-cubes"></i>
              <div class="count">$</div>
              <div class="title">Ranking</div>

            </div>
            
          </div>
          <script>

  document.getElementById("myDiv").onclick = function() {

   window.open('rankingadm.php');
   
  };

</script>
          

        </div>
        
</div>
 </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="container col-sm-12 col-md-12 col-lg-12 col-xl-12 configcollor">
      <center><div><H3 class='configcollor'>Usuários cadastrados no momento</H3></div></center> 
<?php
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$sql = "SELECT loginuser, nomeuser,emailuser FROM usuario WHERE loginuser<> 'admin' ";
$query = mysqli_query($conexao,$sql);

echo "<div class = 'container'>
    <div class='row'>
    <div container col-sm-3 col-lg-3 col-xl-3>

    ";
      echo "<table class = 'table'>";
    
        echo "<thead>";
    echo "<tr>";
    echo "<th scope = 'col' class='configcolor'>Usuario</th>";
    echo "<th scope = 'col' class='configcolor'>Nome Usuario</th>";
    echo "<th scope = 'col' class='configcolor'>Email Usuario</th>";
    echo "</tr>";
    echo "</thead>";

    while ($resultadouser = mysqli_fetch_array($query)) {

    echo "<tbody>";
    echo "<tr class = testetable1>";
    echo "<th scope='row' class='testetable1'>".$resultadouser['loginuser']."</th>";
    echo "<th scope='row' class='testetable1'>".$resultadouser['nomeuser']."</th>";
    echo "<th scope='row' class='testetable1'>".$resultadouser['emailuser']."</th>";
    echo "</tr>";

    
    echo "</tbody>";
      
    }
     echo "</table>";

echo "
</div>
</div>
</div>

";  ?>

    </div>
  </div>

</div>



<div><button class="btn btn-success botao" type="submit">Salvar Alterações</button></div>
</form>
        
</div>
</body>
</html>
<?php } ?>
