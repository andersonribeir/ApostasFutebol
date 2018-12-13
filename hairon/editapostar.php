<?php
session_start();

if (!isset($_SESSION['UsuarioID'])) {
  header("Location: index.php");
}
$login = $_SESSION['UsuarioID'];
$qtdtimes = $_SESSION['totaltimes'];
$rodada = $_SESSION['rodadaatual'];

// Tenta se conectar ao servidor MySQL
 $conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
 


 $i = 1;
 while ($i <= $qtdtimes) {
   
   $timerec = mysqli_real_escape_string($conexao, $_POST[$i]);

    $sql = "SELECT idtime FROM timescad WHERE nometime = '{$timerec}'";
    $query = mysqli_query($conexao,$sql);
    $linha = mysqli_num_rows($query);
      // Salva os dados encontrados na variável $resultado
    $resultado = mysqli_fetch_assoc($query);
    $time = $resultado['idtime'];
    
  $aposta = "UPDATE aposta set times_idtime = '{$time}' WHERE colocacaotime_idcolocacaotime = '{$i}' and usuario_loginuser = '{$login}' and rodada_idrodada = '{$rodada}'" ;
  $query2 = mysqli_query($conexao,$aposta);

   $i++;
 }
 header('location: index4.php')
 ?>