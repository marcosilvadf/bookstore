<?php
require_once '../dto/PlaylistDTO.php';
require_once '../dao/PlaylistDAO.php';
require_once '../utils/erros.php';

session_start();
$titulo = $_POST["titulo"];

$playlistDTO = new PlaylistDTO();
$playlistDTO->setTitulo($titulo);

$playlistDAO = new PlaylistDAO();
    if ($playlistDAO->salvar($playlistDTO)){
        header("Location: ../index.php");
    } else {
    //header( "Location: ../view/formCadastrarCliente.php?msg={$error[2]}" );
}

/* select p.titulo, u.nome
from cliente_livro as a
inner join playlist as p
on a.playlist_id = p.id
inner join usuario as u
on a.USUARIO_id = u.id
where u.id = 12; */