<?php
require_once '../dto/PlaylistDTO.php';
require_once '../dao/PlaylistDAO.php';
require_once '../utils/erros.php';

$titulo = $_POST["titulo"];

$playlistDTO = new PlaylistDTO();
$playlistDTO->setTitulo($titulo);

$playlistDAO = new PlaylistDAO();
    if ($playlistDAO->salvar($playlistDTO)){
        header("Location: ../index.php");
    } else {
    //header( "Location: ../view/formCadastrarCliente.php?msg={$error[2]}" );
}

/* ; */