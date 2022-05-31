<?php
require_once '../dto/acessoDTO.php';
require_once '../dao/acessoDAO.php';
require_once '../utils/erros.php';

$idLivro = $_POST['idLivro'];
$idUser = $_POST['idUser'];
$idPlayl = $_POST['idPlayl'];

$acessoDTO = new AcessoDTO();
$acessoDTO->setlivro_Id($idLivro);
$acessoDTO->setUsuarioId($idUser);
$acessoDTO->setPlaylistId($idPlayl);

$acessoDAO = new AcessoDAO();
    if($acessoDAO->savePlayl($acessoDTO)){
        header("Location: ../index.php");
    }else{
        echo "Erro ao cadastrar: ", $e->getMessage();
    }