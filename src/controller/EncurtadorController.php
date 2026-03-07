<?php

namespace encurtador\controller;

use encurtador\models\Encurtador;

class EncurtadorController{

    public function __construct(
        public string $siteOriginal
    )
    {}

    public function encurtarLink(){        
        $ModelEncurtador = new Encurtador($this->siteOriginal);
        $ModelEncurtador->encurtarLink();

        return $ModelEncurtador->siteEncurtado;

    }


}
?>