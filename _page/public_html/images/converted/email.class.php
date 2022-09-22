<?php
	class Email{
		
		public function enviaEmail($id, $email, $nome){
			// Aqui vamos configurar o cabeçalho (header) do e-mail, formatos, remetentes, destinatários de cópias
		$headers = "MIME-Version: 1.0\n";  
		// Abaixo estabelecemos o Remetente do E-mail com o From:
		$headers.= "From: CaffeineDev <contato@caffeinedev.com.br>\r\n";
		// Caso se queira especificar o e-mail de Resposta, utilizamos o Reply-To:, caso você não queira, basta excluir a linha abaixo
		//$headers.= "Reply-To: roberto.carlos@gmail.com\r\n";
		// Se desejar enviar cópia para outro e-mail utiliza-se o Bcc:, especificando o e-mail de destino, se não quiser mandar essa cópia, basta remover a linha abaixo
		//$headers.= "Bcc: roberto_carlos@hotmail.com\r\n";
		// Nesta linha abaixo, configuramos o "limite" ou boundary em inglês que é necessário para o arquivo em anexo.
		$boundary = "XYZ-" . date("dmYis") . "-ZYX";
		// Especificamos o tipo de conteúdo do e-mail
		$headers.= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";  
		$headers.= "$boundary\n"; 
		
		
		
		$conteudo = "<p style='font-size:22px;'> <br/><br/>Senhor(a) ".$nome."---".$id." viemos por meio deste email informar o serial para liberação da licença comprada para nosso sistema. Confira os dados "
			. "presentes nesse email e coloque o serial informado quando solicitado pelo software. Lembramos que este serial refere-se à licença de "
			." dias comprada, e que é atrelado ao seu usuário de sistema e não pode ser transferido nem vendido e só poderá ser usado uma única vez."
			."O serial e o arquivo hash anexado à esse email tem o mesmo valor de licença, e o uso de um anula o uso do outro. Para inserção da sua licença"
			."aguarde a solicitação do sistema, e quando solicitado baixe e utilize o arquivo hash no campo de selecionar arquivo, que o sistema gerará automáticamente"
			. "a licença, ou utilize o serial à seguir, fazendo a inserção manual para que seja gerada a licença no sistema."
			. "<br/><br/> Nome: ".$nome."<br/>Usuário: "."<br/>Licença de: "." dias <br/>Licença Gerada em: "."</p><br/><br/>"
			."<center style='font-size:22px; font-weight:bold;'>Serial:</center><p style='text-align:center; font-size:26px; font-weight:bold;'>"."</p><br/><br/>"
			."<p style='font-size:22px;'>Copie e cole todo o código serial em negrito para que funcione corretamente, incluindo caracteres especiais como '=', '@' ou '-' <br/><br/>"
			.".<br/><br/>A CaffeineDev agradece a atenção e a preferência pelo nosso sistema e para qualquer dúvida responda esse email. </p>";
	
	$corpo_mensagem = "<html>
	<head>
	   <title>Licença de Software</title>
	</head>
	<body'>
	".$conteudo.
	"</font>
	</body>
	</html>";
	
	
	$mensagem = "--$boundary\n"; 
    $mensagem.= "Content-Transfer-Encoding: 8bits\n"; 
    $mensagem.= "Content-Type: text/html; charset=\"ISO-8859-1\"\n\n";
    $mensagem.= "$corpo_mensagem\n"; 
    $mensagem.= "--$boundary\n"; 
    $mensagem.= "Content-Type: \n";  
    $mensagem.= "Content-Disposition: attachment; filename=\"\"\n";  
    $mensagem.= "Content-Transfer-Encoding: base64\n\n";  
    $mensagem.= "$anexo\n";  
    $mensagem.= "--$boundary--\r\n"; 
	
	
			// Cconfiguramos o e-mail do destinatário
		$destinatario = $email;
		// Definimos o assuntos do nosso e-mail
		$assunto = "Teste";
		
		// Após ter configurado tudo que é necessário, vamos fazer o envio propriamente dito
		mail($destinatario, $assunto, $mensagem, $headers);  
		
		
		return true;
		
		  
		
		
		}
}
?>