<?php
/*
 * A Design by W3layouts
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
 *
 */			
 						$userEmail=$_REQUEST['userEmail'];
						$webadd= "http://". $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
						$subject = "new subscription received ".$webadd;  
			$message = '<html><head><title>'.$subject.'</title></head><body><table><tr><td>Email id :  </td><td>'.$userEmail.'</td></tr><tr><td></td><td> '.$subject.'</td>
</tr></table></body></html>';
			//$message = "Email id :  ".$userEmail. "\r\nPhone No : ".$userPhone."\r\nName : ".$userName."\r\nSays : ".$userMsg;
			$to=$email_id;
			$headers = "From: " . strip_tags($userEmail) . "\r\n";
			$headers .= "Reply-To: ". strip_tags($userEmail) . "\r\n";
			//$headers .= "CC: susan@example.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			if(!mail($to, $subject, $message, $headers)){
             $mail_status='no';
				header("Location: index.html");
			exit();
          }else{
          	  $mail_status='yes';
          	header("Location: index.html");
			exit();
           
         } ?>