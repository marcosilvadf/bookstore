<?php

require_once '../dto/LivroDTO.php';
require_once '../dao/LivroDAO.php';

$id = $_GET['id'];

$livroDAO = new LivroDAO();
if ( $livroDAO->deleteById($id)){
    header("Location: ../view/gerenciarLivrosADM.php");
}