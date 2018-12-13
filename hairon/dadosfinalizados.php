<?php
session_start();

if (!isset($_SESSION['UsuarioID'])) {
  header("Location: index.php");
}

$qtdtimes = $_SESSION['inputfinal'];

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$sql = "SELECT idrodada FROM rodada ORDER BY idrodada DESC LIMIT 1";
$query = mysqli_query($conexao,$sql);
$ultrodada = mysqli_fetch_array($query);
$idultrod = $ultrodada['idrodada'];



$i = 1;
while ($i <= $qtdtimes) {
 $time = $_POST[$i];
 $sql1 = "SELECT idtime FROM timescad WHERE nometime = '{$time}'";
 $query1 = mysqli_query($conexao,$sql1);
 $veriftime = mysqli_fetch_array($query1);
 $idtime = $veriftime['idtime'];
  
 
 $sql2 = "INSERT INTO colocacaoreal(idcolocacaoreal,colocacao,times_idtime,rodada_idrodada) VALUES (null,'$i','$idtime','$idultrod')";
 $query2 = mysqli_query($conexao,$sql2);

 $i++;
}
include 'ranking.php';
include 'email_ranking.php';

  ?>