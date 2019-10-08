<?php

namespace AgenciaS3\Http\Controllers\Admin\Ajax;

use AgenciaS3\Http\Controllers\Controller;

class AddressController extends Controller
{

    public function getAddress($zip_code)
    {
        if (isset($zip_code) && !empty($zip_code)) {
            $reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $zip_code);

            $dados['sucesso'] = (string)$reg->resultado;
            $dados['address'] = (string)$reg->tipo_logradouro . ' ' . $reg->logradouro;
            $dados['district'] = (string)$reg->bairro;
            $dados['city'] = (string)$reg->cidade;
            $dados['state'] = (string)$reg->uf;
            $dados['city'] = (string)$reg->cidade;

            return json_encode($dados);
        }
    }

}
