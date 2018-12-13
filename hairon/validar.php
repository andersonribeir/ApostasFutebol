


<?php
    
  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['user']) OR empty($_POST['senha']))) {
      header("Location: index.php"); exit;
  }

// Tenta se conectar ao servidor MySQL
  $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
  // Tenta se conectar a um banco de dados MySQL
//  mysql_select_db('pwebfinal') or trigger_error(mysql_error());
    
  $usuariolog = mysqli_real_escape_string($conexao, $_POST['user']);
  $senhalog = mysqli_real_escape_string($conexao, $_POST['senha']);


  // Validação do usuário/senha digitados
  $sql = "SELECT loginuser, nomeuser FROM usuario WHERE loginuser = '{$usuariolog}' AND senhauser = '{$senhalog}'";
  $query = mysqli_query($conexao,$sql);
  $linha = mysqli_num_rows($query);
  
  
  if (mysqli_num_rows($query) != 1) {
$erro = 1;
session_start();
$_SESSION['erro'] = $erro;
echo $_SESSION['erro'];
    
    
   
   echo "<script> window.location='index.php';</script>";
   

     
      
      exit();

  } else {
      // Salva os dados encontrados na variável $resultado
      $resultado = mysqli_fetch_assoc($query);
    
      // Se a sessão não existir, inicia uma
      session_start();
    
      // Salva os dados encontrados na sessão
      $_SESSION['UsuarioID'] = $resultado['loginuser'];
      $_SESSION['UsuarioNome'] = $resultado['nomeuser'];
    
      // Redireciona o visitante
      if ($_SESSION['UsuarioID'] == "admin"){
      header("Location: restrito.php"); exit;}
      else{
      	header("Location: index4.php"); exit;
      }
  }





    
  ?>