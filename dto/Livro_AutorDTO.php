<?php

class PagamentoDTO {
    private $livroId;
    private $autorId;
    private $dataCadastro;
    private $valor;
    private $tipoPagamento;
    private $comprovante;
    private $precoId;

    public function getLivroId(){
        return $this->livroId;
    }

    public function setLivroId($livroId){
        $this->livroId = $livroId;
    }

    public function getAutorId(){
        return $this->autorId;
    }

    public function setAutorId($autorId){
        $this->autorId = $autorId;
    }

    public function getDataCadastro(){
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro){
        $this->dataCadastro = $dataCadastro;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getTipoPagamento(){
        return $this->tipoPagamento;
    }

    public function setTipoPagamento($tipoPagamento){
        $this->tipoPagamento = $tipoPagamento;
    }

    public function getComprovante(){
        return $this->comprovante;
    }

    public function setComprovante($comprovante){
        $this->comprovante = $comprovante;

    }

    public function getPrecoId(){
        return $this->precoId;
    }

    public function setPrecoId($precoId){
        $this->precoId = $precoId;

    }
}