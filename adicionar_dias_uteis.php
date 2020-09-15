<?php


// funcao para adicionar dias uteis a uma data 
//Veridicando se é sábado ou domingo e se é feriado.

function adicionar_dias_uteis($data_origem,$n_dias){

	// $n_dias = quantidades de dias a serem adicinados na data
	// criada 14/09/2020
	 $feriados = array('01/01', '25/12','01/01');

	 
	 
	 $data_nova = new DateTime($data_origem);		 
	 $data_nova -> add(new DateInterval('P'.$n_dias.'D'));


	// verifico final de semana
	// 6 = sabado
	// 0 = domingo
	$dia_semana = $data_nova->format("w");

	if($dia_semana==6){		
		$n_sabado = 2;
		$data_nova -> add(new DateInterval('P'.($n_sabado).'D'));
	}elseif($dia_semana==0){
		$n_domingo = 1;
		$data_nova -> add(new DateInterval('P'.$n_domingo.'D'));
	}

	
    // verificar se é feriado
    $verifica_data = $data_nova->format("d/m");
    if(array_search($verifica_data, $feriados)){

      // é feriado
      // adicionar mais 1 da a data e verifico
      $n_feriado = 1;
      $data_nova -> add(new DateInterval('P'.($n_feriado).'D'));
      $data = $data_nova->format("Y-m-d");

      // faz uma nova verificação 
      adicionar_dias_uteis($data,0);

    }else{
      //não é feriado
      // pode mostar data
      echo  $data_nova->format("Y-m-d");

    }

// fim 
}


adicionar_dias_uteis('2020-09-14',3);


?>
