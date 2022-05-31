<?php

class PlaylistDTO {
    private $id;
    private $data_criacao;
    private $titulo;
    private $situacao;
    private $idUser;
   

    public function getId() {
        return $this->id;
    }
    public function setId( $id ) {
        $this->id = $id;
    }
    public function getdata_Criacao() {
        return $this->data_criacao;
    }
    public function setdata_Criacao( $data_criacao ) {
        $this->data_criacao = $data_criacao;
    }
    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo( $titulo ) {
        $this->titulo = $titulo;
    }
    public function getSituacao() {
        return $this->situacao;
    }
    public function setSituacao( $situacao ) {
        $this->situacao = $situacao;
    }

    public function getIdUser(){
        return $this->idUser;
    }

    public function setIdUser($idUser){
        $this->idUser = $idUser;

    }
}