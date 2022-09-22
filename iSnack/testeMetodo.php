<?php
include ("classes/cadastro.class.php");
include ("classes/validacao.class.php");


$cadastro = new Cadastro();

$cadastro->setId(1);
$cadastro->setNome("Pedro Henrique Domingos dos Santos");
$cadastro->setEstabelecimento("Restaurante Chuva Marrom");
$cadastro->setUsuario("pedrohdsantos");
$cadastro->setSenha("12345678");
$cadastro->setRazaosocial("Pica Das Galaxias");
$cadastro->setEmail("pedrohdsantos@outlook.com");

$valida = new Validacao();

if($valida->validarCNPJ("111132545465")){
    echo "CNPJ válido."."    ";
}else{
    echo "CNPJ inválido."."     ";
    
}


if($valida->validarCPF("38593468810")){
    echo "Passou"."    ";
}else{
    echo "Cpf Cagado"."     ";
}



if($cadastro->gravar()){
    echo "Funcionou malandro.";
}else{
    echo "Cagou em algum lugar.";
}

      


?>
