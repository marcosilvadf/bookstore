<?php

require_once '../dao/UsuarioDAO.php';
require_once '../dto/UsuarioDTO.php';

$id = $_POST["id"];
$nome = $_POST["nome"];
$datanascimento = $_POST["dtnasc"];
$telefone = $_POST["tel"];
$tipo = $_POST['tipo'];

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setId($id);
$usuarioDTO->setNome($nome);
$usuarioDTO->setDatanascimento($datanascimento);
$usuarioDTO->setTelefone($telefone);
$usuarioDTO->setTipo($tipo);

$usuarioDAO = new UsuarioDAO();
if ( $usuarioDAO->update($usuarioDTO)){
    echo '<script>history.go(-2)</script>';
}