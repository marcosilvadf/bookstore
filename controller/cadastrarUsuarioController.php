<?php

require_once '../dto/UsuarioDTO.php';
require_once '../dao/UsuarioDAO.php';
require_once '../utils/erros.php';

$nome = $_POST["nome"];
$email = $_POST["email"];
$datanascimento = $_POST["dtnasc"];
$telefone = $_POST["tel"];
$tipo = $_POST['tipo'];
$senha = $_POST["senha"];

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setNome($nome);
$usuarioDTO->setEmail($email);
$usuarioDTO->setDatanascimento($datanascimento);
$usuarioDTO->setTelefone($telefone);
$usuarioDTO->setTipo($tipo);
$usuarioDTO->setSenha($senha);

$usuarioDAO = new UsuarioDAO();
    if ($usuarioDAO->salvar($usuarioDTO)){
        $msg = true;
        header("Location: ../view/formCadastrarUsuario.php?msg={$erros[3]}");
    }