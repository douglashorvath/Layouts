<?php
        include("classes/Template.class.php");
        
        $tpl = new Template("frontend/web/cadastro_loja.html");
        
        if(isset($_POST["enviar"]) ){
            if(isset($_POST["razao_social"])){
                $rsocial = $_POST["razao_social"];
                $nfantasia = $_POST["nome_fantasia"];
                $cnpj = $_POST["cnpj"];
                $email = $_POST["email"];

                if(isset($_POST["telefone"])){
                    $telefone = $_POST["telefone"];
                }else{
                    $telefone = 0;
                }
                if(isset($_POST["celular"])){
                    $celular = $_POST["celular"];
                }else{
                    $celular = 0;
                }
                $usuario = $_POST["usuario"];
                $senha = $_POST["senha"];
                $confirma = $_POST["confirma_senha"];
            
          }else{
              $tpl->MSG = "Preencha corretamente os campos.";
          }
        
        }
        
        
       $tpl->show(); 
?>
