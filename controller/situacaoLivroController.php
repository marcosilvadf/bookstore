<?php
require_once '../dao/LivroDAO.php';

$livroDAO = new LivroDAO();
$idLivro = $_GET['id'];

$situ = $livroDAO->findById($idLivro);
if($situ['situacao'] == 'ativado'){
    $valor = "desativado";
    $livroDAO->chSituacao($valor, $situ['id']);
    header("Location: ../view/gerenciarLivrosADM.php");
}else{
    $valor = "ativado";
    $livroDAO->chSituacao($valor, $situ['id']);
    header("Location: ../view/gerenciarLivrosADM.php");
}