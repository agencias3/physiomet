<?php

namespace AgenciaS3\Http\Controllers\Site\Ajax;

use AgenciaS3\Http\Controllers\Controller;

class AddressController extends Controller
{

    public function getAddress($zip_code)
    {
        if (isset($zip_code) && !empty($zip_code)) {
            $reg = simplexml_load_file("http://cep.republicavirtual.com.br/web_cep.php?formato=xml&cep=" . $zip_code);
            if ($reg) {
                $dados['sucesso'] = (string)$reg->resultado;
                $dados['address'] = (string)$reg->tipo_logradouro . ' ' . $reg->logradouro . ', ' . (string)$reg->bairro;
                if (isPost($reg->bairro)) {
                    $dados['address'] .= ', ' . (string)$reg->bairro;
                }
                $dados['city'] = (string)$reg->cidade;
                $dados['state'] = (string)$reg->uf;
                return json_encode($dados);
            }
        }
    }

}
