<?php


// funcao para adicionar dias uteis a uma data 
//Veridicando se é sábado ou domingo e se é feriado.

function adicionar_dias_uteis($data_origem,$n_dias){

	// $n_dias = quantidades de dias a serem adicinados na data
	// criada 14/09/2020
	 $feriados = array('01/01', '25/12','01/01');
 
	 $data_nova = new DateTime($data_origem);		 
	 $data_nova->modify($n_dias.' weekdays'); 

	
	// verificar se é feriado
	$verifica_data = $data_nova->format("d/m");
	if(array_search($verifica_data, $feriados)){		
		// é feriado
		$n_feriado = 1;
		$data_nova -> modify($n_feriado.' weekdays'); 
		$data = $data_nova->format("Y-m-d");
		
		// faz uma nova verificação 
		return adicionar_dias_uteis($data,0);

	}else{
		//não é feriado
		// pode mostar data
		return  $data_nova->format("Y-m-d");

	}

}





adicionar_dias_uteis('2020-09-14',3);


?>
