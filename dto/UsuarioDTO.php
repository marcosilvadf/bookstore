<?php

class UsuarioDTO{
    private $id;
    private $nome;
    private $email;
    private $datanascimento;
    private $telefone;
    private $tipo;
    private $senha;
    private $datacadastro;
    private $situacao;
    private $campoValor;

    
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;

    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;

    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;

    }
 
    public function getDatanascimento(){
        return $this->datanascimento;
    }

    public function setDatanascimento($datanascimento){
        $this->datanascimento = $datanascimento;

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

    public function getDatacadastro(){
        return $this->datacadastro;
    }

    public function setDatacadastro($datacadastro){
        $this->datacadastro = $datacadastro;

    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo = $tipo;

    }

    public function getSituacao(){
        return $this->situacao;
    }

    public function setSituacao($situacao){
        $this->situacao = $situacao;

    }

    public function getCampoValor(){
        return $this->campoValor;
    }

    public function setCampoValor($campoValor){
        $this->campoValor = $campoValor;

    }
}