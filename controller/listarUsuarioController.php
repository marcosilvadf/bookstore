<?php

require_once '../dto/UsuarioDTO.php';
require_once '../dao/UsuarioDAO.php';
require_once '../utils/erros.php';

$email = $_POST["email"];
$senha = $_POST["senha"];

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setEmail($email);
$usuarioDTO->setSenha($senha);

$usuarioDAO = new UsuarioDAO();
$usuario = $usuarioDAO->logar($usuarioDTO);
    if(!empty($usuario)){   
        session_start();
            if(isset($_SESSION['perfil'])){
                unset($_SESSION['perfil']);
            }

        $_SESSION['perfil'] = $usuario;
            if($usuario['tipo'] == "administrador"){
                header('Location: ../view/principalADM.php');
            }else{
                header('Location: ../index.php');          
            }
    }else{
        $msg = true;
        header("Location: ../view/formCadastrarUsuario.php?msg={$erros[4]}");
    }
?>