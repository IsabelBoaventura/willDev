<?php 

//nome desta pagina
namespace App\WebService;

class ViaCEP{
    //metodo para consultar o cep

    /**
     * Método responsável por consultar  um CEP no ViaCep
     * @param string  $cep
     * @return array
     */
    public static function consultarCEP( $cep ){
        //endpoint
        $url = 'https://viacep.com.br/ws/'.$cep.'/json/';
        //print_r( $url  );

        //INICIA O CURL 
        $curl = curl_init();

        //ARRAY DE CONFIGURAÇÕES DO CURL 
        curl_setopt_array( $curl, [
            CURLOPT_URL => $url ,
            CURLOPT_RETURNTRANSFER => true,  //retornar o conteudo e nao imprimir na tela
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_SSL_VERIFYPEER => false
            //para nao verificar o certificado podendo usar ( http e https )
        ]);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        //RESPONSE 
        $response = curl_exec( $curl);

        $response = curl_exec($curl);
        if ($response === false) {
            echo 'Erro cURL: ' . curl_error($curl);
        }
       

        //fechar a conexao , apos executcao para nao manter os recursos abertos
        curl_close( $curl );
        
        //forcar o resultado em array
        $array = json_decode( $response, true );

        //retornar com validacao 
        return isset( $array['cep']) ? $array: null;


    }
}



?>