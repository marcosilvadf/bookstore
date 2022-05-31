<?php
require_once '../dto/cliente_LivroDTO.php';
require_once '../dao/cliente_LivroDAO.php';
include '../js/funcao.php';



$cliente_id = $_POST["cliente_id"];
$livro_id = $_POST["livro_id"];
$comentario = $_POST["comentario"];
$avaliacao = $_POST["avaliacao"];
$playlist_id = $_POST["playlist_id"];
$autor_id = $_POST["autor_id"];

$cliente_LivroDTO = new cliente_LivroDTO();
$cliente_LivroDTO->setcliente_Id( $cliente_id );
$cliente_LivroDTO->setlivro_Id( $livro_id );
$cliente_LivroDTO->setComentario( $comentario );
$cliente_LivroDTO->setAvaliacao( $avaliacao );
$cliente_LivroDTO->setPlaylist_Id( $playlist );
$cliente_LivroDTO->setAutor( $autor );

$cliente_LivroDAO = new cliente_LivroDAO();
$cliente = $cliente_LivroDAO->findById( $cliente_id );

//$error[1] = "<div class='alert alert-success mt-3' role='alert'>Cadastrado com suceso!</div>";
//$error[2] = "<div class='alert alert-warning mt-3' role='alert'>Já existe um cliente cadastro com o cpf " . formatarCpfCnpj( $cpf ) . "</div>";

if ( empty( $cliente_id ) ) {
    if ( $cliente_livroDAO->salvar( $cliente_LivroDTO ) ) {
        
        //header( "Location: ../view/formCadastrarCliente.php?msg={$error[1]}" );
    }
} else {
    //header( "Location: ../view/formCadastrarCliente.php?msg={$error[2]}" );
}