<?
    require("classes/validarconexao.php");
    
    if($c->rowCount()){ 

    require ("gerarserial.php");
    require ("classes/conexao.class.php");

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

    $user = $_GET['user'];
    $hash = $_GET['hash'];
    
    function gerarArquivo($hash)
    {
        $user = getUser($hash);
        $data = getData($hash);
        $data = date("d-m-Y",strtotime($data));
        file_put_contents("arquivos/".$user.".".$data.".hash", $hash);
    }
    
    gerarArquivo($hash);

    
    $selectUser = $pdo->prepare("SELECT * FROM clientes WHERE user ='$user'");
    $selectUser->execute();
    foreach ($selectUser as $selu => $su)
    {
        $nome = $su['nome'];
        $email = $su['email'];
    }
    
    
    
    $dias = getDias($hash);
    $gerado = getData($hash);
    $gerado = date("d/m/Y",strtotime($gerado));
    $data = date("d-m-Y",strtotime(getData($hash)));
    
// Aqui abaixo, vamos colocar o corpo da mensagem, como vamos utilizar padrão HTML, teremos de utilizar tags HTML abaixo
    
$conteudo = "<p style='font-size:22px;'> <br/><br/>Senhor(a) ".$nome." viemos por meio deste email informar o serial para liberação da licença comprada para nosso sistema. Confira os dados "
        . "presentes nesse email e coloque o serial informado quando solicitado pelo software. Lembramos que este serial refere-se à licença de "
        .$dias." dias comprada, e que é atrelado ao seu usuário de sistema e não pode ser transferido nem vendido e só poderá ser usado uma única vez."
        ."O serial e o arquivo hash anexado à esse email tem o mesmo valor de licença, e o uso de um anula o uso do outro. Para inserção da sua licença"
        ."aguarde a solicitação do sistema, e quando solicitado baixe e utilize o arquivo hash no campo de selecionar arquivo, que o sistema gerará automáticamente"
        . "a licença, ou utilize o serial à seguir, fazendo a inserção manual para que seja gerada a licença no sistema."
        . "<br/><br/> Nome: ".$nome."<br/>Usuário: ".$user."<br/>Licença de: ".$dias." dias <br/>Licença Gerada em: ".$gerado."</p><br/><br/>"
        ."<center style='font-size:22px; font-weight:bold;'>Serial:</center><p style='text-align:center; font-size:26px; font-weight:bold;'>".$hash."</p><br/><br/>"
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

// Agora vem a parte própriamente dita do arquivo anexo. 
// Aqui verificamos se foi enviado pelo formulário o arquivo. Lembrando que o nome do campo no formulário terá de ser "arquivo", caso você queira usar outro, terá de mudar aqui abaixo.
// Caso não tenha sido enviado um arquivo, ele desconsidera e envia o e-mail normalmente, mas sem nada anexado.


//definir o arquivo à ser aberto

    $file_name=$user.".".$data.".hash";
    $file_type="hash";
    
    $file_size=filesize("arquivos/".$user.".".$data.".hash");
    $file_temp="arquivos/".$user.".".$data.".hash";
 
// Nesta linha abaixo, abrimos o arquivo enviado.
    $fp = fopen($file_temp,"rb"); 
	// Agora vamos ler o arquivo aberto na linha anterior
    $anexo = fread($fp,$file_size);            
	// Codificamos os dados com MIME para o e-mail 
    $anexo = base64_encode($anexo);
	// Fechamos o arquivo aberto anteriormente
	fclose($fp); 
    // Nesta linha a seguir, vamos dividir a variável do arquivo em pequenos pedaços para podermos enviar
	$anexo = chunk_split($anexo);
	// Nas linhas abaixo vamos passar os parâmetros de formatação e codificação, juntamente com a inclusão do arquivo anexado no corpo da mensagem.
    $mensagem = "--$boundary\n"; 
    $mensagem.= "Content-Transfer-Encoding: 8bits\n"; 
    $mensagem.= "Content-Type: text/html; charset=\"ISO-8859-1\"\n\n";
    $mensagem.= "$corpo_mensagem\n"; 
    $mensagem.= "--$boundary\n"; 
    $mensagem.= "Content-Type: ".$file_type."\n";  
    $mensagem.= "Content-Disposition: attachment; filename=\"".$file_name."\"\n";  
    $mensagem.= "Content-Transfer-Encoding: base64\n\n";  
    $mensagem.= "$anexo\n";  
    $mensagem.= "--$boundary--\r\n"; 


// Cconfiguramos o e-mail do destinatário
$destinatario = "$email";
// Definimos o assuntos do nosso e-mail
$assunto = "Licença de Software";

// Após ter configurado tudo que é necessário, vamos fazer o envio propriamente dito
mail($destinatario, $assunto, $mensagem, $headers);  

//Header para redirecionamento para página buscarhashs.php
header("Location: http://www.caffeinedev.com.br/Projetos/ControleSistemasOn/buscarhashs.php");

  }else{
      header("Location: http://www.caffeinedev.com.br/Projetos/ControleSistemasOn/login.php");
  }
?>