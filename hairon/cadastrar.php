<?php
    
  
// Tenta se conectar ao servidor MySQL
  $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
  // Tenta se conectar a um banco de dados MySQL
//  mysql_select_db('pwebfinal') or trigger_error(mysql_error());
    
  $usuariocad = mysqli_real_escape_string($conexao, $_POST['usercad']);
  $nomecad = mysqli_real_escape_string($conexao, $_POST['nome']);
  $emailcad = mysqli_real_escape_string($conexao, $_POST['email']);
  $senhacad = mysqli_real_escape_string($conexao, $_POST['senhacad']);
  $senharep = mysqli_real_escape_string($conexao, $_POST['senhacad2']); 



  // Validação do usuário/senha digitados
  $sql = "INSERT INTO usuario(loginuser,nomeuser,senhauser,emailuser) VALUES ('$usuariocad','$nomecad','$senhacad','$emailcad')";
  $query = mysqli_query($conexao,$sql);
 header("Location: index.php"); exit;
          
  ?>