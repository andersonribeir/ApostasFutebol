<?php
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$qtdtime = mysqli_real_escape_string($conexao, $_POST['times']);
$sql = "UPDATE contagem set qntdtimes = '{$qtdtime}'";
$query = mysqli_query($conexao,$sql);
header('location: restrito.php');


  ?>