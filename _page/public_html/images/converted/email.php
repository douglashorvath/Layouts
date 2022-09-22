<?
    require("classes/validarconexao.php");
    
    if($c->rowCount()){ 

    require ("gerarserial.php");
    require ("classes/conexao.class.php");

// Aqui vamos configurar o cabe�alho (header) do e-mail, formatos, remetentes, destinat�rios de c�pias
$headers = "MIME-Version: 1.0\n";  
// Abaixo estabelecemos o Remetente do E-mail com o From:
$headers.= "From: CaffeineDev <contato@caffeinedev.com.br>\r\n";
// Caso se queira especificar o e-mail de Resposta, utilizamos o Reply-To:, caso voc� n�o queira, basta excluir a linha abaixo
//$headers.= "Reply-To: roberto.carlos@gmail.com\r\n";
// Se desejar enviar c�pia para outro e-mail utiliza-se o Bcc:, especificando o e-mail de destino, se n�o quiser mandar essa c�pia, basta remover a linha abaixo
//$headers.= "Bcc: roberto_carlos@hotmail.com\r\n";
// Nesta linha abaixo, configuramos o "limite" ou boundary em ingl�s que � necess�rio para o arquivo em anexo.
$boundary = "XYZ-" . date("dmYis") . "-ZYX";
// Especificamos o tipo de conte�do do e-mail
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
    
// Aqui abaixo, vamos colocar o corpo da mensagem, como vamos utilizar padr�o HTML, teremos de utilizar tags HTML abaixo
    
$conteudo = "<p style='font-size:22px;'> <br/><br/>Senhor(a) ".$nome." viemos por meio deste email informar o serial para libera��o da licen�a comprada para nosso sistema. Confira os dados "
        . "presentes nesse email e coloque o serial informado quando solicitado pelo software. Lembramos que este serial refere-se � licen�a de "
        .$dias." dias comprada, e que � atrelado ao seu usu�rio de sistema e n�o pode ser transferido nem vendido e s� poder� ser usado uma �nica vez."
        ."O serial e o arquivo hash anexado � esse email tem o mesmo valor de licen�a, e o uso de um anula o uso do outro. Para inser��o da sua licen�a"
        ."aguarde a solicita��o do sistema, e quando solicitado baixe e utilize o arquivo hash no campo de selecionar arquivo, que o sistema gerar� autom�ticamente"
        . "a licen�a, ou utilize o serial � seguir, fazendo a inser��o manual para que seja gerada a licen�a no sistema."
        . "<br/><br/> Nome: ".$nome."<br/>Usu�rio: ".$user."<br/>Licen�a de: ".$dias." dias <br/>Licen�a Gerada em: ".$gerado."</p><br/><br/>"
        ."<center style='font-size:22px; font-weight:bold;'>Serial:</center><p style='text-align:center; font-size:26px; font-weight:bold;'>".$hash."</p><br/><br/>"
        ."<p style='font-size:22px;'>Copie e cole todo o c�digo serial em negrito para que funcione corretamente, incluindo caracteres especiais como '=', '@' ou '-' <br/><br/>"
        .".<br/><br/>A CaffeineDev agradece a aten��o e a prefer�ncia pelo nosso sistema e para qualquer d�vida responda esse email. </p>";

$corpo_mensagem = "<html>
<head>
   <title>Licen�a de Software</title>
</head>
<body'>
".$conteudo.
"</font>
</body>
</html>";

// Agora vem a parte pr�priamente dita do arquivo anexo. 
// Aqui verificamos se foi enviado pelo formul�rio o arquivo. Lembrando que o nome do campo no formul�rio ter� de ser "arquivo", caso voc� queira usar outro, ter� de mudar aqui abaixo.
// Caso n�o tenha sido enviado um arquivo, ele desconsidera e envia o e-mail normalmente, mas sem nada anexado.


//definir o arquivo � ser aberto

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
    // Nesta linha a seguir, vamos dividir a vari�vel do arquivo em pequenos peda�os para podermos enviar
	$anexo = chunk_split($anexo);
	// Nas linhas abaixo vamos passar os par�metros de formata��o e codifica��o, juntamente com a inclus�o do arquivo anexado no corpo da mensagem.
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


// Cconfiguramos o e-mail do destinat�rio
$destinatario = "$email";
// Definimos o assuntos do nosso e-mail
$assunto = "Licen�a de Software";

// Ap�s ter configurado tudo que � necess�rio, vamos fazer o envio propriamente dito
mail($destinatario, $assunto, $mensagem, $headers);  

//Header para redirecionamento para p�gina buscarhashs.php
header("Location: http://www.caffeinedev.com.br/Projetos/ControleSistemasOn/buscarhashs.php");

  }else{
      header("Location: http://www.caffeinedev.com.br/Projetos/ControleSistemasOn/login.php");
  }
?>