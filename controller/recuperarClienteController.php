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

print_r($usuario);
exit;
    if($usuario->rowCount() == 1){
        $usuarioDTO->setEmail($email);
        $usuarioDTO->setSenha($senha);
        if($usuarioDAO->alterarSenha($usuarioDTO)){
            $msg = true;
            header("Location: ../view/formCadastrarCliente.php?msg={$erros[1]}");
        }
    }else{
        $msg = true;
        header("Location: ../view/formCadastrarCliente.php?msg={$erros[2]}");
    }
?>