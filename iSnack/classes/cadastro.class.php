<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cadastro
 *
 * @author CaffeinePgr
 */
class Cadastro {
    private $nome, $cpf, $estabelecimento, $rua, $bairro, $cidade, $estado, $numero, $cep, $status, $vencimento, $usuario, $senha,
            $razaosocial, $cnpj, $email;
   
    public function __construct(){
        $this->setId(0);
        $this->setNome("");
        $this->setCpf("");
        $this->setEstabelecimento("");
        $this->setRua("");
        $this->setBairro("");
        $this->setCidade("");
        $this->setEstado("");
        $this->setNumero(0);
        $this->setCep(0);
        $this->setStatus(0);
        $this->setVencimento(0);
        $this->setUsuario("");
        $this->setSenha("");
        $this->setRazaosocial("");
        $this->setCnpj(0);
        $this->setEmail("");
        
            
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
    
    
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    public function getCpf(){
        return $this->cpf;
    }

    

    public function setEstabelecimento($estabelecimento){
        $this->estabelecimento = $estabelecimento;
    }
    public function getEstabelecimento(){
        return $this->estabelecimento;
    }
    
    
    public function setRua($rua){
        $this->rua= $rua;
    }
    public function getRua(){
       return $this->rua;
    }
    
    
    public function setBairro($bairro){
        $this->bairro = $bairro;
    }
    public function getBairro(){
        return $this->bairro;
    }
    
    
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
    public function getCidade(){
        return $this->cidade;
    }
    
    
    public function setEstado($estado){
        $this->estado = $estado;
    }
    public function getEstado(){
        return $this->estado;
    }
    
    public function setNumero($numero){
        $this->numero = $numero;
    }
    public function getNumero(){
        return $this->numero;
    }
    
    public function setCep($cep){
        $this->cep = $cep;
    }
    public function getCep(){
        return $this->cep;
    }
    
    public function setStatus($status){
        $this->status = $status;
    }
    public function getStatus(){
        return $this->status;
    }
    
    public function setVencimento($vencimento){
        $this->vencimento = $vencimento;
    }
    public function getVencimento(){
        return $this->vencimento;
    }
    
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    
    public function setSenha($senha){
        $this->senha = md5($senha);
    }
    public function getSenha(){
        return $this->senha;
    }
    
    public function setRazaosocial($razaosocial){
        $this->razaosocial = $razaosocial;
    }
    public function getRazaosocial(){
        return $this->razaosocial;
    }
    
    
    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }
    
    
    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }
    public function getCnpj(){
        return $this->cnpj;
    }

    
    public function gravar(){
        try{
            require("classes/conexao.class.php");
            
            $parametros = array(":cli_nome" => $this->nome, ":cli_cpf" => $this->cpf,":cli_estabelecimento" => $this->estabelecimento, ":cli_rua" => $this->rua, ":cli_bairro" =>  $this->bairro,
                    ":cli_cidade" => $this->cidade, ":cli_estado" =>  $this->estado, ":cli_numero" =>  $this->numero, ":cli_cep" => $this->cep, ":cli_status" => $this->status,
                    ":cli_vencimento" =>  $this->vencimento, ":cli_user" =>  $this->usuario, ":cli_senha" => $this->senha, ":cli_razaosocial" => $this->razaosocial, ":cli_email" => $this->email, ":cli_cnpj" =>  $this->cnpj);
            if($this->id > 0){
            
                $ex = $pdo->prepare("UPDATE clientes SET cli_nome = :cli_nome,cli_cpf = :cli_cpf,  cli_estabelecimento = :cli_estabelecimento, cli_rua = :cli_rua, 
                    cli_bairro = :cli_bairro, cli_cidade = :cli_cidade, cli_estado = :cli_estado, cli_numero = :cli_numero, cli_cep = :cli_cep, 
                    cli_status = :cli_status, cli_vencimento = :cli_vencimento, cli_user = :cli_user, cli_senha = :cli_senha, cli_razaosocial = :cli_razaosocial, cli_email = :cli_email, cli_cnpj = :cli_cnpj WHERE id = :cli_id");
                
                $parametros[":cli_id"] = $this->id;
                
            }else{
                $ex = $pdo->prepare("INSERT INTO clientes (cli_nome, cli_cpf, cli_estabelecimento, cli_rua, cli_bairro, cli_cidade, cli_estado, cli_numero, cli_cep, cli_status, cli_vencimento,
                cli_user, cli_senha, cli_razaosocial, cli_cnpj, cli_email) VALUES (:cli_nome, :cli_cpf, :cli_estabelecimento, :cli_rua, :cli_bairro, :cli_cidade, :cli_estado, :cli_numero, :cli_cep, :cli_status, :cli_vencimento,
                :cli_user, :cli_senha, :cli_razaosocial, :cli_cnpj, :cli_email)");
            }
            
            $ex->execute($parametros);
            
            $pdo = null;
            
            return true;
            
        }catch(PDOexception $e){
		$this->msg = $e->getMessage();
		return false;
	}
    }
    
    public function buscar(){
        try{
            
            require("classes/conexao.class.php");
            
            $ex = $pdo->prepare("SELECT * FROM clientes");
            
            $ex->execute();
            $pos = 0;
            
            while($rs = $ex->fetch(PDO::FETCH_ASSOC)){
                $resultado[$pos]["cli_nome"] = $rs["cli_nome"];
                $resultado[$pos]["cli_cpf"] = $rs["cli_cpf"];
                $resultado[$pos]["cli_estabelecimento"] = $rs["cli_estabelecimento"];
                $resultado[$pos]["cli_rua"] = $rs["cli_rua"];
                $resultado[$pos]["cli_bairro"] = $rs["cli_bairro"];
                $resultado[$pos]["cli_cidade"] = $rs["cli_bairro"];
                $resultado[$pos]["cli_estado"] = $rs["cli_estado"];
                $resultado[$pos]["cli_numero"] = $rs["cli_numero"];
                $resultado[$pos]["cli_cep"] = $rs["cli_cep"];
                $resultado[$pos]["cli_status"] = $rs["cli_status"];
                $resultado[$pos]["cli_vencimento"] = $rs["cli_vencimento"];
                $resultado[$pos]["cli_user"] = $rs["cli_user"];
                $resultado[$pos]["cli_senha"] = $rs["cli_senha"];
                
                $pos++;
                       
            }
            $pdo = null;
            
        }catch(PDOException $e)
        {
            echo $e->getMessage();
	}
        
        return $resultado;
    }
}

?>
