<?php

require_once '../dao/UsuarioDAO.php';
require_once '../dao/AutorDAO.php';

$idUsuario = $_GET['id'];

$usuarioDAO = new UsuarioDAO ();
if ( $usuarioDAO->deleteById($idUsuario)){
    header("Location: ../view/listarTodosUsuarios.php");
}
