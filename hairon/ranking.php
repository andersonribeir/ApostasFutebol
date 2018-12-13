<?php

session_start();
if (!isset($_SESSION['UsuarioID'])) {
  header("Location: index.php");
}

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());	
$sqlrodada = "SELECT idrodada from rodada order by idrodada desc limit 1";
$queryrodada = mysqli_query($conexao,$sqlrodada);
$atual = mysqli_fetch_array($queryrodada);
$rodadaatual = $atual['idrodada'];

$vetor1 =  [];

$i = 1;

$sqlreal =  "SELECT times_idtime FROM colocacaoreal WHERE rodada_idrodada = '{$rodadaatual}'";
$queryreal = mysqli_query($conexao,$sqlreal);

	//$result = $resultadoreal['count(colocacao)'];

while ($resultadoreal = mysqli_fetch_array($queryreal)) {
	$vetor1[$i] = $resultadoreal['times_idtime'];
	$i++;

}
$carai = count($vetor1);
$sqluser = "SELECT loginuser FROM usuario";
$queryuser = mysqli_query($conexao, $sqluser);

while ($users = mysqli_fetch_array($queryuser)) {
	
	if ($users['loginuser'] != 'admin') {
		$usu = $users['loginuser'];
		$sqlaposta = "SELECT times_idtime FROM aposta WHERE rodada_idrodada = '{$rodadaatual}' AND usuario_loginuser = '{$usu}'";
		$queryaposta = mysqli_query($conexao,$sqlaposta);
		$vetor2 = [];
		$x = 1;
		while ($resultadoaposta = mysqli_fetch_array($queryaposta)) {
			$vetor2[$x] = $resultadoaposta['times_idtime'];

			$x++;
		}
		$c = 1;
		$acertos = 0;
		while ($c <= $carai) {
			if (empty($vetor2)) {
				$acertos = 0;
			}
			elseif ($vetor1[$c]==$vetor2[$c]) {
				$acertos++;
				
			}
			$c++;
		}
	
		$pontos = $acertos*100;
		

		$sql1 = "SELECT pontos from pontuacao WHERE usuario_loginuser = '{$usu}'";
		$queryveri = mysqli_query($conexao,$sql1);
		$resultado = mysqli_fetch_array($queryveri);
		$pontinhos = $resultado['pontos'];


		$pontos1 = $pontinhos + $pontos;



		$sql = "INSERT INTO `pontuacao` (`idpontuacao`, `pontos`, `usuario_loginuser`, `rodada_idrodada`) VALUES (NULL, '$pontos1', '$usu', '$rodadaatual')";
		$querypontos = mysqli_query($conexao,$sql);
		
		
		

		

		
		
		
	}	
	
}



?>