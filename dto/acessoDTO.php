<?php

class AcessoDTO {
    private $id;
    private $livro_id;
    private $cometario;
    private $avaliacao;
    private $playlistId;
    private $autor_id;
    private $usuarioId;
    
    public function getUsuarioId(){
        return $this->usuarioId;
    }

    public function setUsuarioId($usuarioId){
        $this->usuarioId = $usuarioId;

    }

    public function getlivro_Id() {
        return $this->livro_id;
    }
    public function setlivro_Id( $livro_id ) {
        $this->livro_id = $livro_id;
    }
    public function getComentario() {
        return $this->comentario;
    }
    public function setComentario( $comentario ) {
        $this->comentario = $comentario;
    }
    public function getAvaliacao() {
        return $this->avaliacao;
    }
    public function setAvaliacao( $avaliacao ) {
        $this->avaliacao = $avaliacao;
    }
    public function getAutor() {
        return $this->autor;
    }

    public function setAutor( $autor ) {
        $this->autor = $autor;
    }


    public function getCometario(){
        return $this->cometario;
    }

    public function setCometario($cometario){
        $this->cometario = $cometario;

    }

    public function getAutor_id(){
        return $this->autor_id;
    }

    public function setAutor_id($autor_id){
        $this->autor_id = $autor_id;

    }

    public function getPlaylistId(){
        return $this->playlistId;
    }

    public function setPlaylistId($playlistId){
        $this->playlistId = $playlistId;

    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;

    }
}