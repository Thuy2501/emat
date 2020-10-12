<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail_Library {
	function send1($url,$data){
		require 'PHPMailer-master/src/PHPMailer.php';
		require 'PHPMailer-master/src/Exception.php';
		//require 'PHPMailer-master/src/OAuth.php';
		//require 'PHPMailer-master/src/POP3.php';
		require 'PHPMailer-master/src/SMTP.php';

		//$data['base_url'] = $this->_config->item('base_url');

		$mail = new PHPMailer(true); //print_r($mail);

		$body = file_get_contents($url.'/tu-van/mail');

		$body = str_replace('%name%',$data['name'], $body);
		$body = str_replace('%phone%',$data['phone'], $body);
		$body = str_replace('%mail%',$data['mail'], $body);
		$body = str_replace('%namsinh%',$data['namsinh'], $body);
		$body = str_replace('%truong%',$data['truong'], $body);
		$body = str_replace('%monhocdk%',$data['monhocdk'], $body);
		$body = str_replace('%dkthithu%',$data['dkthithu'], $body);
		$body = str_replace('%mondkthi%',$data['mondkthi'], $body);
		$body = str_replace('%ckdkthi%',$data['ckdkthi'], $body);
		$body = str_replace('%note%',$data['note'], $body);

		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'ssl://smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;
			//$mail->SMTPAutoTLS = false;                              // Enable SMTP authentication
		    $mail->Username = 'cftnotify@gmail.com';                 // SMTP username
		    $mail->Password = 'Cft@292#20';                           // SMTP password
		    //$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 465;   
		    $mail->CharSet = 'UTF-8';
		    $mail->ContentType = 'text/html; charset=utf-8\r\n';                                 // TCP port to connect to
		 
		    //Recipients
		    //$mail->setFrom('baolochn2@gmail.com', 'Cooftech');
		    $mail->addAddress('cooftechdev@gmail.com', 'Admin');
		    //$mail->addCC('baolochn1@gmail.com','Bao Loc');
		 
		    //Attachments
		    //$mail->addAttachment('');         // Add attachments
		    //$mail->addAttachment('');    // Optional name
		 
		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'MSA - Liên hệ khách hàng';
		    $mail->Body    = $body;
		    //$mail->AltBody = $this->_view->load('mail',$data);
		 
		    $mail->send();
		    return false;
		} catch (Exception $e) {
		    return false;
		}
	}
}