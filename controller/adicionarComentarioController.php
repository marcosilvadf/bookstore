<?php
session_start();
require_once '../dto/comentarioDTO.php';
require_once '../dao/comentarioDAO.php';
require_once '../utils/erros.php';

$idUser = $_SESSION['perfil']['id'];
$idLivro = $_POST['idLivro'];
$coment = $_POST['coment'];

$comentarioDTO = new ComentarioDTO();
$comentarioDTO->setUsuarioId($idUser);
$comentarioDTO->setLivroId($idLivro);
$comentarioDTO->setComentario($coment);

$comentarioDAO = new ComentarioDAO();
    if($comentarioDAO->save($comentarioDTO)){
        header("Location: ../index.php");
    }