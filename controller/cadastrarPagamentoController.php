<?php
session_start();
require_once '../dao/pagamentoDAO.php';
require_once '../dto/Livro_AutorDTO.php';

$autorId = $_SESSION['perfil']['id'];
$valor = $_POST["valor"];
$tipoPagamento = $_POST["tipoP"];

$pagamentoDAO = new PagamentoDAO();

$autor = $pagamentoDAO->findById($autorId);

$pagamentoDTO = new PagamentoDTO();
$pagamentoDTO->setAutorId($autor);
$pagamentoDTO->setValor($valor);
$pagamentoDTO->setTipoPagamento($tipoPagamento);

print_r($pagamentoDTO);
exit;
    if($pagamentoDAO->save($pagamentoDTO)){
        echo "cadastro bem sucessido!";
    }