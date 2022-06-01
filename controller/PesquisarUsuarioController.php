<?php

require_once '../dao/UsuarioDAO.php';
require_once '../dto/UsuarioDTO.php';
require_once '../utils/erros.php';

$campo = $_POST['campo'];
$valor = $_POST['valor'];

$usuarioDAO = new UsuarioDAO();
$usuarios = $usuarioDAO->Pesquisarusuario($campo, $valor);
print_r($usuarios);
exit;