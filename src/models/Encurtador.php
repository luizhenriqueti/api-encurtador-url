<?php

namespace encurtador\models;

class Encurtador {

    private string $table = "encurtador";
    public string $siteEncurtado;

    public function __construct(
        public string $siteOriginal,
        public int $acessos = 0
    )
    {}

    public function encurtarLink(){
        $site = "encurtador/";
        $codigo = $this->gerarCodigo();
        $this->siteEncurtado = $site . $codigo;
    }

    private function gerarCodigo($tamanhoCodigo = 6):string {
        $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codigo = "";

        for ($i=0; $i < $tamanhoCodigo; $i++) { 
            $codigo .= $caracteres[random_int(0, strlen($caracteres) - 1)];
        }

        return $codigo;
    }


}
?>