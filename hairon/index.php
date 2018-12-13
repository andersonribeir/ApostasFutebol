<?php
session_start();
	if (isset($_SESSION['erro'])) {
		# code...
	
	if ($_SESSION['erro'] == 1) {
	echo "<script>alert('Login incorreto, tente novamente');</script>";
	session_destroy();
}
}
  ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="css/global.css" type="text/css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

	<div class="container-fluid bg">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12"></div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<!--inicio-->
				<form class="form-conatiner" method="POST" action="validar.php">
					<center><h1>Bem Vindo!!</h1></center>


  <div class="form-group"> 	
    <label for="user">Login</label>
    <input type="text" class="form-control" id="user" name="user" placeholder="Login" required >
  </div>
  <div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" id="senha" name="senha" placeholder="Password" required>
  </div>
  
  
  <button type="submit" class="btn btn-success btn-block">Logar</button><br>
  <center>
  	<div id="botao" class="form-group">
  <a class="btnn btn-link btn-block" href="index3.php">Esqueceu sua senha?</a>
  <a class="btnn btn-link btn-block" href="index2.html">Não tem uma conta?</a>
  </div>
  </center>
</form>

			<!--fim-->
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12"></div>
	</div>
</div>


</body>
</html>
