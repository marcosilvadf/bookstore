<?php

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
        if($_SESSION['perfil']['tipo'] == "administrador"){
            header("Location: ../view/gerenciarLivrosADM.php");
        }else{
            header("Location: ../view/painelAutor.php");
        }
    }
