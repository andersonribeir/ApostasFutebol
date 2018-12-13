<?php
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$qtdrodada = mysqli_real_escape_string($conexao, $_POST['rodada']);
$sql = "UPDATE contagem set qntdrodada = '{$qtdrodada}'";
$query = mysqli_query($conexao,$sql);
header('location: restrito.php');


  ?>