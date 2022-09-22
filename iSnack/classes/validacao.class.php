<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of validacao
 *
 * @author CaffeinePgr
 */
class Validacao {
    //put your code here
   public function validarCPF( $cpf ) { 

	$cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
	// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
	if ( strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
		return FALSE;
	} else { // Calcula os números para verificar se o CPF é verdadeiro
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf{$c} != $d) {
				return FALSE;
			}
		}
		return TRUE;
	}
      }
      
      
      function validarCNPJ($cnpj){
            $cnpj = str_pad(str_replace(array('.','-','/'),'',$cnpj),14,'0',STR_PAD_LEFT);
            if (strlen($cnpj) != 14){
              return false;
            }else{
              for($t = 12; $t < 14; $t++){
                for($d = 0, $p = $t - 7, $c = 0; $c < $t; $c++){
                  $d += $cnpj{$c} * $p;
                  $p  = ($p < 3) ? 9 : --$p;
                }
                $d = ((10 * $d) % 11) % 10;
                if($cnpj{$c} != $d){
                  return false;
                }
              }
              return true;
            }
          }
    
    
}

?>
