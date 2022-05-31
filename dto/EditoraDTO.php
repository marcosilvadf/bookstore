<?php

class EditoraDTO{
    private $id;
    private $cnpj;
    private $nome;
    private $telefone;
    private $senha;


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;

    }

    public function getCnpj(){
        return $this->cnpj;
    }

    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;

    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;

    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;

    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = $senha;

    }
}