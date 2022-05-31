<?php
require_once '../dao/UsuarioDAO.php';
require_once '../dto/UsuarioDTO.php';
require_once '../utils/erros.php';

$email = $_POST['email'];
$dtnasc = $_POST['dtnasc'];
$senha = $_POST['senha'];

$usuarioDTO = new UsuarioDTO;
$usuarioDTO->setEmail($email);
$usuarioDTO->setDatanascimento($dtnasc);

$usuarioDAO = new UsuarioDAO;
$usuario = $usuarioDAO->encontrarUsuario($usuarioDTO);

    if(!empty($usuario)){
        $usuarioDTO->setEmail($email);
        $usuarioDTO->setSenha($senha);
        if($usuarioDAO->alterarSenha($usuarioDTO)){
            $msg = true;
            header("Location: ../view/formCadastrarUsuario.php?msg={$erros[1]}");
        }
    }else{
        $msg = true;
        header("Location: ../view/formCadastrarUsuario.php?msg={$erros[2]}");
    }
?>