<?php

require_once '../dao/UsuarioDAO.php';
require_once '../dto/UsuarioDTO.php';

$id = $_POST["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$datanascimento = $_POST["dtnasc"];
$telefone = $_POST["tel"];
$tipo = $_POST['tipo'];

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setId($id);
$usuarioDTO->setNome($nome);
$usuarioDTO->setEmail($email);
$usuarioDTO->setDatanascimento($datanascimento);
$usuarioDTO->setTelefone($telefone);
$usuarioDTO->setTipo($tipo);

$usuarioDAO = new UsuarioDAO();
if ( $usuarioDAO->update($usuarioDTO)){
    header("Location: ../view/listarTodosUsuarios.php");
}