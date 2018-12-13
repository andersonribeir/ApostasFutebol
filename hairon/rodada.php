
<?php 


$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$sqlverifstatus = "SELECT count(idrodada)FROM rodada";
$queryverifstatus = mysqli_query($conexao,$sqlverifstatus);

$resultado = mysqli_fetch_array($queryverifstatus);
$numero = $resultado['count(idrodada)'];

$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$sqlpag = "SELECT status from rodada ORDER BY idrodada DESC LIMIT 1";
$querypag = mysqli_query($conexao,$sqlpag);
$result = mysqli_fetch_array($querypag);
$pagcheck = $result['status'];



$sqlqtdrodada =  "SELECT qntdrodada FROM contagem ORDER BY idcontagem DESC LIMIT 1";
$queryqtdrodada = mysqli_query($conexao,$sqlqtdrodada);
$resultadorodada = mysqli_fetch_array($queryqtdrodada);
$qntdrodada = $resultadorodada['qntdrodada'];
echo $numero."<br>";
echo $qntdrodada;

if($numero<=$qntdrodada){
	if (empty($pagcheck)) {

		if(isset($_POST["statusrodada"])){
			$rodadastatus = 'ok';
			$sqlstatus = "INSERT INTO rodada(idrodada,status) VALUES (null,'$rodadastatus')";
			$query = mysqli_query($conexao,$sqlstatus);
			header('location: restrito.php');
			
		}
		elseif (empty($_POST["statusrodada"])) {
			header('location: restrito.php');
		}
	}



	elseif ($pagcheck == 'ok') {
		if (isset($_POST["statusrodada"])) {
			header('location: restrito.php');
		}
		elseif (empty($_POST["statusrodada"])) {
			$rodadastatus = 'notok';
			$sqlstatus = "UPDATE rodada SET status = '$rodadastatus'";
			$query = mysqli_query($conexao,$sqlstatus);
			header('location: restrito.php');	 
		}

	}
	elseif ($pagcheck == 'notok') {
		if (empty($_POST["statusrodada"])){
			header('location: restrito.php');
		}
		elseif (isset($_POST["statusrodada"])) {
			$rodadastatus = 'ok';
			$sqlstatus = "INSERT INTO rodada(idrodada,status) VALUES (null,'$rodadastatus')";
			$query = mysqli_query($conexao,$sqlstatus);
			header('location: restrito.php');
			
		}
	}
}

else{
	header("Location: configrodada.php");
}

?>