<?php

require_once '../dao/acessoDAO.php';
require_once '../dto/acessoDTO.php';
require_once '../utils/erros.php';

$id = $_GET['id'];

$acessoDAO = new AcessoDAO();
    if($acessoDAO->deleteItem($id)){
        header('Location: ../index.php');
    }