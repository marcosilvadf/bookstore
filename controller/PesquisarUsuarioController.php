<?php

require_once '../dao/UsuarioDAO.php';
require_once '../dto/UsuarioDTO.php';
require_once '../utils/erros.php';

$campo = $_POST['campo'];
$valor = $_POST['valor'];

$usuarioDTO = new UsuarioDTO();
$usuarioDTO->setCampoValor($valor);

$usuarioDAO = new UsuarioDAO();
$usuarios = $usuarioDAO->Pesquisarusuario($usuarioDTO, $campo);
print_r($usuarios);
exit;