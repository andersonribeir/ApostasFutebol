<?php
header('Content-Type: text/html; charset=UTF-8');
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
$sql = "SELECT loginuser, emailuser FROM usuario";
$query = mysqli_query($conexao,$sql);

$sql1 = "SELECT pontos,usuario_loginuser FROM pontuacao GROUP BY usuario_loginuser ORDER BY pontos DESC";
$query1 = mysqli_query($conexao,$sql1);

$i= 1;
$tabela = "Posição Usuario Pontos <br>";
while ($resultado1 = mysqli_fetch_array($query1)) {
$points = $resultado1['pontos'];
$users = $resultado1['usuario_loginuser'];
$tabela .= $i.".".$users." ".$points."<br>";
 $i++;
  }


while ($resultado = mysqli_fetch_array($query)) {
	$usuario = $resultado['loginuser'];
	$email = $resultado['emailuser'];
	$subject = "Rodada Finalizada";
      $message ="Rodada Finalizada! Veja o ranking dessa rodada: <br>"; //+ a tabela do ranking aqui
      






require_once("phpmailer/class.phpmailer.php");

global $error;
$mail = new PHPMailer();
$mail-> IsHTML(true);
$mail->CharSet = 'UTF-8';
        $mail->IsSMTP();    // Ativar SMTP
        $mail->SMTPDebug = 2;   // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
        $mail->SMTPAuth = true;   // Autenticação ativada
        $mail->SMTPSecure = 'ssl';  // SSL REQUERIDO pelo GMail
        $mail->Host = 'smtp.gmail.com'; // SMTP utilizado
        $mail->Port = 465;      // A porta 587 deverá estar aberta em seu servidor
        $mail->Username = 'pwebfinal@gmail.com';
        $mail->Password = 'caraideasa';
        $mail->setFrom($nosso, $de_nome);
        $mail->Subject = $subject;
        $mail->Body = $message.$tabela;
        $mail->addAddress($email, $usuario);
        if(!$mail->Send()) {
          $error = 'Mail error: '.$mail->ErrorInfo;
          echo $error;
        } else {
          $error = 'Mensagem enviada!';
          header("Location: restrito.php");
        }

      }







      ?>