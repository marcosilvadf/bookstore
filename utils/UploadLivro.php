<?php

class UploadLivro{
    private $nome;

    public function __construct($arquivo){
        $this->nome = uniqid() . '.' . $this->getExtensao($arquivo);
    }

    private function getExtensao($arquivo){
        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        return $extensao;
    }

    private function extPerm($extensao){
        if ($extensao == "pdf") {
            return true;
        }
    }

    public function salvar($arquivo, $pasta) {
        if (isset($arquivo) && $arquivo["error"] == 0 ) {
            $extensao = $this->getExtensao($arquivo);

            $destino = $pasta . $this->nome;

            if ( $arquivo['size'] > ( 40 * ( 1024 * 1024 ) ) ) {
                throw new RuntimeException( 'O tamanho do arquivo deve ser no máximo 40 MB.' );
            }

            if ( $this->extPerm( $extensao ) ) {
                if ( move_uploaded_file($arquivo['tmp_name'], $destino )){
                    return true;
                } else {
                    throw new RuntimeException( 'Falha ao mover o arquivo enviado. ' . $this->arquivo['error'] );
                }
            } else {
                throw new RuntimeException( 'Não é uma extensão permitida.' );
            }

        }

    }

    public function getNome(){
        return $this->nome;
    }
}