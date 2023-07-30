<?php

//echo ' hello, word ';

require __DIR__.'/vendor/autoload.php';

//incluindo a DEPENDECIA
use \App\WebService\ViaCEP;

//Para conferir se o CEP poi passado para a funcao 


//Exemplo que consta no via cep
$cep_exemplo = "01001000";


$dadosCEP = ViaCEP::consultarCEP( $cep_exemplo);

print_r( $dadosCEP  );



?>