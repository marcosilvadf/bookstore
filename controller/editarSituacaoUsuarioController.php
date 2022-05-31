<?php
require_once '../dao/UsuarioDAO.php';
require_once '../dto/UsuarioDTO.php';

$idUser = $_GET['idUser'];
    if(empty($_GET['sit'])){
        $situacao = "desativado";
    }else{
        $situacao = "ativado";
    }

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setId($idUser);
$usuarioDTO->setSituacao($situacao);

$usuarioDAO = new UsuarioDAO();
    if($usuarioDAO->editarSituacao($usuarioDTO)){
        header("Location: ../view/listarTodosUsuarios.php");
    }