<?php
require_once '../dto/autorDTO.php';
require_once '../dao/AutorDAO.php';

$logra = $_POST['logra'];
$complemento = $_POST['complemento'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade']; 
$cpf = $_POST['cpf'];
$uf = $_POST['uf'];
$cep = $_POST['cep'];
$idUser = $_POST['id'];

$autorDTO = new AutorDTO();
$autorDTO->setLogradouro($logra);
$autorDTO->setComplemento($complemento);
$autorDTO->setNumero($numero);
$autorDTO->setBairro($bairro);
$autorDTO->setCidade($cidade);
$autorDTO->setCpf($cpf);
$autorDTO->setUf($uf);
$autorDTO->setCep($cep);
$autorDTO->setIdUser($idUser);

$autorDAO = new AutorDAO();
    if($autorDAO->save($autorDTO)){
        echo 'cadastro bem sucedido';
    }