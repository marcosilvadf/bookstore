<?php
require_once '../dao/UsuarioDAO.php';
require_once '../dto/UsuarioDTO.php';
session_start();
$idUser = $_GET['idUser'];
    if($_GET['sit'] == "ativado"){
        $situacao = "desativado";
    }else{
        $situacao = "ativado";
    }

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setId($idUser);
$usuarioDTO->setSituacao($situacao);

$usuarioDAO = new UsuarioDAO();
    if($usuarioDAO->editarSituacao($usuarioDTO)){
        $_SESSION['show'] = 'show';
        echo "<script>history.go(-1)</script>";
    }