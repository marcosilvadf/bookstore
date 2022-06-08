<?php
session_start();
require_once '../dao/LivroDAO.php';
require_once '../dto/LivroDTO.php';

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$genero = $_POST['genero'];
$anoP = $_POST['anoPublicacao'];
$sinopse = $_POST['sinopse'];

$livroDTO = new LivroDTO();
$livroDTO->setId($id);
$livroDTO->setTitulo($titulo);
$livroDTO->setSubtitulo($subtitulo);
$livroDTO->setGenero($genero);
$livroDTO->setAnoPublicacao($anoP);
$livroDTO->setSinopse($sinopse);

$livroDAO = new LivroDAO();

    if($livroDAO->update($livroDTO)){
        $_SESSION['show1'] = 'show';
        echo '<script>history.go(-2)</script>';
        }
