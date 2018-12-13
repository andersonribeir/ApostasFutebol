<?php  
 header('Content-Type: text/html; charset=UTF-8');
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'pwebfinal') or trigger_error(mysql_error());
  // Tenta se conectar a um banco de dados MySQL
//  mysql_select_db('pwebfinal') or trigger_error(mysql_error());
    
  $email = mysqli_real_escape_string($conexao, $_POST['email']);

  $sql = "SELECT loginuser, emailuser FROM usuario WHERE emailuser = '{$email}'";
  $query = mysqli_query($conexao,$sql);
  $linha = mysqli_num_rows($query);
  
  
  if (mysqli_num_rows($query) != 1) {
      // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
      echo "Email não consta no banco de dados";
      header("Location: index.php"); exit;}
  else{

  	$resultado = mysqli_fetch_assoc($query);
    
      // Se a sessão não existir, inicia uma
      session_start();
    
      // Salva os dados encontrados na sessão
      $_SESSION['UsuarioID'] = $resultado['loginuser'];
      $_SESSION['email'] = $resultado['emailuser'];
      $email = $_SESSION['email'];
      $subject = "Recuperação de senha";
      $message = "Registramos a solicitação de recuperação de senha.
      Clique <a href='http://localhost/hairon/recupsenha.php'>aqui</a> para aletrar sua senha.
      Caso não tenha sido você, ignore essa mensagem."; // fim da mensagem
      
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
        $mail->Body = $message;
        $mail->addAddress($email, $usuario);
        if(!$mail->Send()) {
          $error = 'Mail error: '.$mail->ErrorInfo;
          echo $error;
          } else {
          $error = 'Mensagem enviada!';
          header("Location: index.html");
        }
      
      //include envia-email.php;
      //header("Location: index.html");

  }

?>