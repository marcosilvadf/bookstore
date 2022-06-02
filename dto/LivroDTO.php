<?php

class LivroDTO{
	private $id;
    private $titulo;
    private $subtitulo;
    private $anoPublicacao;
    private $capa;
	private $livro;
	private $data_cadastro;
    private $genero;
	private $situacao;
    private $sinopse;
	private $campoValor;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getTitulo(){

	return $this->titulo;

	}

	public function setTitulo($titulo){

	$this->titulo = $titulo;

	}


	public function getSubtitulo(){

	return $this->subtitulo;

	}

	public function setSubtitulo($subtitulo){

	$this->subtitulo = $subtitulo;

	}

    public function getAnoPublicacao(){

    return $this->anoPublicacao;
    
    }
    
    public function setAnoPublicacao($anoPublicacao){
    
    $this->anoPublicacao = $anoPublicacao;
    
    }


	public function getCapa(){

	return $this->capa;

	}

	public function setCapa($capa){

	$this->capa = $capa;

	}


	public function getGenero(){

	return $this->genero;

	}

	public function setGenero($genero){

	$this->genero = $genero;

	}


	public function getSinopse(){

	return $this->sinopse;

	}

	public function setSinopse($sinopse){

	$this->sinopse = $sinopse;

	}

	public function getData_cadastro(){
		return $this->data_cadastro;
	}

	public function setData_cadastro($data_cadastro){
		$this->data_cadastro = $data_cadastro;
	}
 
	public function getSituacao(){
		return $this->situacao;
	}

	public function setSituacao($situacao){
		$this->situacao = $situacao;
	}

    public function getLivro(){
        return $this->livro;
    }

    public function setLivro($livro){
        $this->livro = $livro;

    }

    public function getCampoValor(){
        return $this->campoValor;
    }

    public function setCampoValor($campoValor){
        $this->campoValor = $campoValor;

    }
}