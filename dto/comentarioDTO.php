<?php

class ComentarioDTO{
    private $livroId;
    private $comentario;
    private $avaliacao;
    private $usuarioId;

    

    public function getLivroId(){
        return $this->livroId;
    }

    public function setLivroId($livroId){
        $this->livroId = $livroId;

    }

    public function getComentario(){
        return $this->comentario;
    }

    public function setComentario($comentario){
        $this->comentario = $comentario;

    }

    public function getAvaliacao(){
        return $this->avaliacao;
    }

    public function setAvaliacao($avaliacao){
        $this->avaliacao = $avaliacao;

    }

    public function getUsuarioId(){
        return $this->usuarioId;
    }

    public function setUsuarioId($usuarioId){
        $this->usuarioId = $usuarioId;

    }
}