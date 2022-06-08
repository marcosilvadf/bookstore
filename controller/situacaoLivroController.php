<?php
require_once '../dao/LivroDAO.php';
session_start();
$livroDAO = new LivroDAO();
$idLivro = $_GET['id'];

$situ = $livroDAO->findById($idLivro);
if($situ['situacao'] == 'ativado'){
    $valor = "desativado";
    $livroDAO->chSituacao($valor, $situ['id']);
    $_SESSION['show1'] = 'show';
    echo '<script>history.go(-1)</script>';
}else{
    $valor = "ativado";
    $livroDAO->chSituacao($valor, $situ['id']);
    $_SESSION['show1'] = 'show';
    echo '<script>history.go(-1)</script>';
}