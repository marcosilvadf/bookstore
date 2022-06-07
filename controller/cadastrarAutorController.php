<?php
require_once '../dao/AutorDAO.php';
session_start();

$userID = $_SESSION['perfil']['id'];
    if(empty($userID)){
        header("Location: ../index.php");
    }

$autorDAO = new AutorDAO();
$autor = $autorDAO->findById($userID);
    if(!empty($autor)){
        header("Location: ../view/formCadastrarLivro.php");
    }else{
        header("Location: ../view/formCadastrarAutor.php?id={$userID}");
    }