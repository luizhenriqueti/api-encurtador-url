<?php

namespace encurtador\controller;

use encurtador\models\Encurtador;

class EncurtadorController{



    public function encurtarLink($siteOriginal){        
        $encurtador = new Encurtador();
        return $resultado = $encurtador->encurtarLink($siteOriginal);
    }

    public function getAll(){
        $encurtador = new Encurtador();
        return $resultado = $encurtador->getAll();
    }

    public function salvar($siteOriginal) {

        $encurtador = new Encurtador();

        $siteEncurtado = $encurtador->encurtarLink($siteOriginal);

        return $encurtador->salvar($siteOriginal, $siteEncurtado);
    }


}
?>