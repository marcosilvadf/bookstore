<?php
require_once '../dto/PlaylistDTO.php';
require_once '../dao/PlaylistDAO.php';

$idPlayl = $_GET['id'];

$playlistDAO = new PlaylistDAO();
        if($playlistDAO->deleteById($idPlayl)){
            header("Location: ../index.php");
        }