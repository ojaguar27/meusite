<?php

// Mudar Aqui

$email_envio = 'contato@lcdrj.com.br'; // E-mail receptor
$email_pass = 'ltlat'; // Senha do e-mail

$site_name = 'lcdrj'; // Nome do Site
$site_url = 'www.lcdrj.com.br'; // URL do Site

$host_smtp = 'http://br968.hostgator.com.br/'; // HOST SMTP Ex: smtp.domain.com.br
$host_port = '587'; // Porta do Host
$mail->SMTPSecure = 'tls';

// Variáveis do Formulário


$email = $_POST['email'];
;

// Conteúdo do Formulário

$body_content = "E-mail: $email";

// Não mudar a partir daqui

if ($_POST['leaveblank'] != '' or $_POST['dontchange'] != 'http://') {

  echo "<h2
	style=\"
	font-size: 1em;
	margin-top: 20%;
	text-align: center;
	font-family: 'Helvetica', 'Arial', 'Sans-Serif';
	font-weight: normal;
	color: #1b1b1b;
	\"><center><span>Aconteceu algum erro!</span><p>Você pode tentar denovo ou enviar direto para " . $email_envio . "!</p></center><h2>";
	
	echo "<html style=\"background: #fff;\"></html>";
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='10;URL=" . $site_url . "'>";
}

else if (isset($_POST['nome'])){

require ('./PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';

$mail->isSMTP();
$mail->Host = $host_smtp;
$mail->SMTPAuth = true;
$mail->Username = $email_envio;
$mail->Password = $email_pass;
$mail->Port = $host_port; 

$mail->From = $email_envio;

$mail->addAddress($email_envio);

$mail->FromName = 'Formulário de Contato';
$mail->AddReplyTo($_POST['email'], $_POST['nome']);

$mail->WordWrap = 70;

$mail->Subject = 'Formulário - ' . $site_name . ' - ' . $_POST['nome'];

$mail->Body = $body_content;

if(!$mail->send()) {
  
  echo "<h2
	style=\"
	font-size: 1.5em;
	margin-top: 20%;
	text-align: center;
	font-family: Inconsolata', 'Helvetica', 'Arial', 'sans-serif';
	font-weight: normal;
	color: #fdc64b;
	\"><center><span>Aconteceu algum erro!</span><p>Você pode tentar denovo ou enviar direto para " . $email_envio . "!</p></center><h2>";
	
	echo "<html style=\"background: #fff;\"></html>";
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='10;URL=" . $site_url . "'>";
  
} else {

  echo "<h2
	style=\"
	font-size: 1.5em;
	margin-top: 20%;
	text-align: center;
	font-family: 'Inconsolata', 'Helvetica', 'Arial', 'sans-serif';
	font-weight: normal;
	color: #89bb50;
	\"><center><span>Formulário Enviado</span><p>Em breve eu entro em contato com você. Abraços.</p></center><h2>";
	
	echo "<html style=\"background: #fff;\"></html>";
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=" . $site_url . "'>";
}
}
?>