<?php

require_once '../dto/LivroDTO.php';
require_once '../dao/LivroDAO.php';
require_once '../utils/uploadImage.php';
require_once '../utils/UploadLivro.php';
require_once '../utils/erros.php';

define('DIR_CAPA', $_SERVER['DOCUMENT_ROOT'] . "/image/livrosCapas/");
define('DIR_LIVRO', $_SERVER['DOCUMENT_ROOT'] . "/files/livros/");



$titulo = $_POST["titulo"];
$subtitulo = $_POST["subtitulo"];
$anoPublicacao = $_POST["anoPublicacao"];
$genero = $_POST["genero"];
$capa = $_FILES["capa"];
$livro = $_FILES["livro"];
$sinopse = $_POST["sinopse"];

$uploadImg = new UploadImage($capa);
$uploadLivro = new UploadLivro($livro);


$livroDTO = new LivroDTO();
$livroDTO->setTitulo($titulo);
$livroDTO->setSubtitulo($subtitulo);
$livroDTO->setAnoPublicacao($anoPublicacao);
$livroDTO->setCapa(isset($capa) && $capa['error'] == 0 ? "/image/livrosCapas/".$uploadImg->getNome($capa) : null);
$livroDTO->setLivro(isset($livro) && $livro['error'] == 0 ? "/files/livros/".$uploadLivro->getNome($livro) : null);
$livroDTO->setGenero($genero);
$livroDTO->setSinopse($sinopse);

$livroDAO = new LivroDAO();
    if ($livroDAO->salvar($livroDTO)){
        $uploadImg->salvar($capa, DIR_CAPA);
        $uploadLivro->salvar($livro, DIR_LIVRO);
        $msg = true;
        header("Location: ../view/pagamento.php");
    }