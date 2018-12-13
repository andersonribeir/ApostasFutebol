<?php 
session_start();
  $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
  // Tenta se conectar a um banco de dados MySQL
//  mysql_select_db('pwebfinal') or trigger_error(mysql_error());
    
  $senhalog = mysqli_real_escape_string($conexao, $_POST['senha']);
  $senhalog2 = mysqli_real_escape_string($conexao, $_POST['senhacad2']);
  $email = $_SESSION['email'];
  $sql = "UPDATE usuario SET senhauser = '{$senhalog}' WHERE emailuser =  '{$_SESSION['email']}'";
  $query = mysqli_query($conexao,$sql);
  header("Location: index.php");


 ?>