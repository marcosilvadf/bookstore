<?php

require_once '../dao/comentarioDAO.php';
require_once '../dto/comentarioDTO.php';

$id = $_GET['id'];

$comentarioDAO = new ComentarioDAO();
    if($comentarioDAO->deleteById($id)){
        echo '<script>history.go(-1)</script>';
    }