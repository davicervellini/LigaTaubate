<?php
session_start();
include "conexao.php";

?>

<meta charset="utf-8">
<?php /*
<form method="post" action="forgot_pass.php">

	e-mail: <input type="email" name="email" required />

	<input type="submit" value="Recuperar senha" />

</form>
*/ ?>
<?php

$email = $_POST['email'];



if(isset($email)){

$sel = mysqli_query($obj,"SELECT * FROM usuarios WHERE email='$email'");

$rs = mysqli_fetch_assoc($sel);



if($rs)

	{

//$hash = hash('sha256', $password1);



FUNCTION createSalt($email)

{

$text = md5(uniqid(date('Y-m-d H:i:s')."$email", TRUE));

RETURN substr($text, 0, 3);

}



$salt = createSalt($email);

$token = hash('sha256', $salt);

$validade = date('Y-m-d', strtotime("+2 days"));

$cadastra_token = mysqli_query($obj,"INSERT INTO recuperar_senha(token,id_usuario,validade,status)VALUES('$token','".$rs['usuario']."','".$validade."','1')");

//MONTAGEM DO E-MAIL

$para = $email;

$assunto = "Recuperar senha - www.ligataubate.com.br";

$mensagem = "

<h1> E-mail de recuperação de senha </h1>



<p> Está mensagem é automática, favor não responder. </p>

<p> Você solicitou a recuperação de senha, para prosseguir com a recuperação <a href='https://www.ligataubate.com.br/cms/new_pass.php?token=$token'> clique no link. </a> 

Se não conseguir acessar o link copie e cole o endereço completo no seu navegador: <a href='https://www.ligataubate.com.br/cms/new_pass.php?token=$token'> http://www.ligataubate.com.br.com.br/cms/new_pass.php?token=$token </a> </p>



<p> <b> Dados de acesso: </b> </p>

https://www.ligataubate.com.br/cms/painel <br />

usuario:". $rs['usuario']."<br />

<p> Caso não tenha sido você que solicitou favor entrar em contato com: desenvolvimento@ligataubate.com.br </p>



<p> Suporte Vergueiro Digital </p>

<p>regis@vergueirodigital.com.br</p>

<p>TEL: 12 3026-7108</p>

";



// To send HTML mail, the Content-type header must be set

$headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

// Additional headers

$headers .= 'From: Suporte <desenvolvimento@ligataubate.com.br>' . "\r\n";

// Mail it

$envio = mail($para, $assunto, $mensagem, $headers);



if($envio)

	{
		$_SESSION['msg'] = "Um e-mail com o link para redefinição de senha foi enviado para $email";
		echo "<script>window.location = 'https://www.ligataubate.com.br/cms/painel'</script>";

	}

else

	{

		$_SESSION['msg'] = "Ocorreu um erro, tente mais tarde!";
		echo "<script>window.location = 'https://www.ligataubate.com.br/cms/painel'</script>";

	}

	}

else

	{

		$_SESSION['msg'] = "Não encontramos seu cadastro, confira o e-mail digitado";
		echo "<script>window.location = 'https://www.ligataubate.com.br/cms/painel'</script>";

	}

}

