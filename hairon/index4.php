<?php
session_start();
if (!isset($_SESSION['UsuarioID'])) {
  header("Location: index.php");
}
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
 $sql1 = "SELECT idrodada,status FROM rodada ORDER BY idrodada DESC limit 1";
 $query3 = mysqli_query($conexao,$sql1);
 $linha2 = mysqli_fetch_array($query3);
 $rodada = $linha2['idrodada'];
 $status = $linha2['status'];
 $_SESSION['rodadaatual'] = $rodada;


if($status == 'notok' or empty($status))
{
  ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
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
          <a class="not-active" href="aposta.php" disabled>Apostar</a>
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
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  
  <div class="carousel-inner">
    <div class="item active">
      <img src="imagens/carousel3.png" alt="Chania">
      <div class="carousel-caption">
        <h3>Seja bem vindo</h3>
        <p class="carouselcolor">Palpite, aguarde, pontue!</p>
      </div>
    </div>

    <div class="item">
      <img src="imagens/carousel2.png" alt="Chicago">
      <div class="carousel-caption">
        <h3>Seu ranking</h3>
       <p class="carouselcolor">Você poderá visualizar seu ranking após o final da primeira rodada</p>
      </div>
    </div>

    <div class="item ">
      <img src="imagens/carousel1.png" alt="New York">
      <div class="carousel-caption">
        <h3>Palpite!</h3>
        <p class="carouselcolor">Edite seu palpite quantas vezes quiser, mas antes que a rodada acabe.</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container bg6">
<div class="container">
  <div class="row"><CENTER>
    <h4 class="configcollor vocesabia">VOCÊ SABIA?</h4></CENTER><br>

    <div class="container col-sm-3 col-md-3 col-lg-3 col-xl-3 ">
 <center><h5 class="configcollor negrito" > O cartão mais rápido</h5></center>
       
      <h4 class="configcollor indexborder">
       O jogador que teve a honra dúbia de receber o cartão vermelho mais rápido de sempre foi Lee Todd, da equipe britânica Cross Farm Park Celtic. Quando o juiz apitou para marcar o início do jogo, Lee Todd, que estava muito perto dele, se assustou com o barulho e disse um palavrão. Ele foi imediatamente expulso do jogo.</h4>
    </div>
   
    <div class="container col-sm-3 col-md-3 col-lg-3 col-xl-3  cartao">
      <center><h5 class="configcollor negrito" > Um raio?</h5></center>

      
      <h4 class="configcollor indexborder">
      Em 1998, num dos episódios mais tristes do futebol, uma equipe inteira foi fulminada por um raio. O time Bena Tshadi, na República Democrática do Congo, estava jogando contra o Basanga quando o raio atingiu o campo. Os 11 jogadores do Bena Tshadi morreram mas a outra equipe não sofreu ferimentos. Isso levou a rumores de feitiçaria…</h4>
    </div>
    
    <div class="container col-sm-3 col-md-3 col-lg-3 col-xl-3  cartao">
      <center><h5 class="configcollor negrito" > Três é demais</h5></center>
      
      
      <h4 class="configcollor indexborder">
       Nos anos 1950, o artista dinamarquês Asger Jorn inventou um jogo de futebol para 3 equipes, com um campo hexagonal. A vitória seria da equipe que sofresse menos gols. O objetivo era tornar o jogo menos agressivo, porque a vitória dependia da defesa e não do ataque. Atualmente, existem alguns jogos oficiais de futebol de 3 lados.</h4>
    </div>
    <br>
  </div>  
</div>
</div>

</body>
</html>
<?php } else {
 ?>
 <!DOCTYPE html>
<html lang="pt-br">
<head>
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
          <a href="aposta.php" disabled>Apostar</a>
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
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  
  <div class="carousel-inner">
    <div class="item active">
      <img src="imagens/carousel3.png" alt="Chania">
      <div class="carousel-caption">
        <h3>Seja bem vindo</h3>
        <p class="carouselcolor">Palpite, aguarde, pontue!</p>
      </div>
    </div>

    <div class="item">
      <img src="imagens/carousel2.png" alt="Chicago">
      <div class="carousel-caption">
        <h3>Seu ranking</h3>
        <p class="carouselcolor">Você poderá visualizar seu ranking após o final da primeira rodada</p>
      </div>
    </div>

    <div class="item ">
      <img src="imagens/carousel1.png" alt="New York">
      <div class="carousel-caption">
        <h3>Palpite</h3>
        <p class="carouselcolor">Edite seu palpite quantas vezes quiser, mas antes que a rodada acabe.</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container bg6">
<div class="container">
  <div class="row"><CENTER>
    <h4 class="configcollor vocesabia">VOCÊ SABIA?</h4></CENTER><br>

    <div class="container col-sm-3 col-md-3 col-lg-3 col-xl-3 ">
 <center><h5 class="configcollor negrito" > O cartão mais rápido</h5></center>
       
      <h4 class="configcollor indexborder">
       O jogador que teve a honra dúbia de receber o cartão vermelho mais rápido de sempre foi Lee Todd, da equipe britânica Cross Farm Park Celtic. Quando o juiz apitou para marcar o início do jogo, Lee Todd, que estava muito perto dele, se assustou com o barulho e disse um palavrão. Ele foi imediatamente expulso do jogo.</h4>
    </div>
   
    <div class="container col-sm-3 col-md-3 col-lg-3 col-xl-3  cartao">
      <center><h5 class="configcollor negrito" > Um raio?</h5></center>

      
      <h4 class="configcollor indexborder">
      Em 1998, num dos episódios mais tristes do futebol, uma equipe inteira foi fulminada por um raio. O time Bena Tshadi, na República Democrática do Congo, estava jogando contra o Basanga quando o raio atingiu o campo. Os 11 jogadores do Bena Tshadi morreram mas a outra equipe não sofreu ferimentos. Isso levou a rumores de feitiçaria…</h4>
    </div>
    
    <div class="container col-sm-3 col-md-3 col-lg-3 col-xl-3  cartao">
      <center><h5 class="configcollor negrito" > Três é demais</h5></center>
      
      
      <h4 class="configcollor indexborder">
       Nos anos 1950, o artista dinamarquês Asger Jorn inventou um jogo de futebol para 3 equipes, com um campo hexagonal. A vitória seria da equipe que sofresse menos gols. O objetivo era tornar o jogo menos agressivo, porque a vitória dependia da defesa e não do ataque. Atualmente, existem alguns jogos oficiais de futebol de 3 lados.</h4>
    </div>
    <br>
  </div>  
</div>
</div>

</body>
</html>
	 	
<?php }  ?>
	