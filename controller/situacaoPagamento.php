<?php
require_once '../dao/LivroDAO.php';

$livroDAO = new LivroDAO();
$idLivro = $_GET['id'];

$situ = $livroDAO->findById($idLivro);
$valor = "ativado";
    if($livroDAO->chSituacao($valor, $situ['id'])){
        echo "<script>history.go(-1)</script>";
    }
