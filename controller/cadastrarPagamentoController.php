<?php
session_start();
require_once '../dao/pagamentoDAO.php';
require_once '../dto/Livro_AutorDTO.php';
require_once '../utils/uploadImage.php';
require_once '../dao/AutorDAO.php';

define('DIR_CAPA', $_SERVER['DOCUMENT_ROOT'] . "/image/comprovantes/");

$autorDAO = new AutorDAO();
$autorId = $autorDAO->findByIdCad($_SESSION['perfil']['id']);


$livroId = $_POST['idLivro'];
$data = $_POST['data'];
$valor = str_replace(",", ".", str_replace("R$ ", "", $_POST["valor"])) ;
$tipoPagamento = $_POST["tipoP"];
$comprovante = $_FILES['comp'];
$precoId = $_POST["precoId"];

$uploadImg = new UploadImage($comprovante);

$pagamentoDAO = new PagamentoDAO();
$pagamentoDTO = new PagamentoDTO();
$pagamentoDTO->setLivroId($livroId);
$pagamentoDTO->setAutorId($autorId['id']);
$pagamentoDTO->setDataCadastro($data);
$pagamentoDTO->setValor($valor);
$pagamentoDTO->setTipoPagamento($tipoPagamento);
chmod ("/image/comprovantes/", 0777);
$pagamentoDTO->setComprovante(isset($comprovante) && $comprovante['error'] == 0 ? "/image/comprovantes/".$uploadImg->getNome($comprovante) : "sem");
$pagamentoDTO->setPrecoId($precoId);

    if($pagamentoDAO->save($pagamentoDTO)){
        $uploadImg->salvar($comprovante, DIR_CAPA);
        header("Location: ../view/painelAutor.php");
    }