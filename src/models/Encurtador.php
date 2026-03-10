<?php

namespace encurtador\models;

use encurtador\config\Database;

class Encurtador {

    private string $table = "urls";

    public string $siteEncurtado;
    private $db;

    public string $siteOriginal;
    public int $acessos = 0;

    public function __construct(){
        $this->db = Database::getConnection();
    }

    public function encurtarLink($siteOriginal){
        $this->siteOriginal = $siteOriginal;

        $codigo = $this->gerarCodigo();
        return $siteEncurtado = "encurtador/" . $codigo;
    }

    private function gerarCodigo($tamanhoCodigo = 6):string {
        $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codigo = "";

        for ($i=0; $i < $tamanhoCodigo; $i++) { 
            $codigo .= $caracteres[random_int(0, strlen($caracteres) - 1)];
        }

        return $codigo;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM $this->table where ativo = 1");
        return $stmt->fetchAll();
    }

    public function salvar($site, $siteEncurtado){
        $stmt = $this->db->prepare("
            INSERT INTO urls (url_original, url_encurtada, total_acessos, ativo)
            VALUES (:site, :siteEncurtado, 0, 1)
        ");


        $resultado = $stmt->execute([
            'site'=>$site, 'siteEncurtado'=>$siteEncurtado
        ]);

        if ($resultado) {
            return "sucesso";
        }else{
            return "falha";
        }
    }




}
?>