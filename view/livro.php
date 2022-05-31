<?php
session_start();
    if((!isset($_SESSION['livro']) && (empty($_GET['idLivro'])))){
        header("Location: ../index.php");
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
    <style>

    </style>
</head>
<body>
    <div>
        <?php
        require_once '../dao/LivroDAO.php';        
        $idLivro = $_GET['idLivro'];
        $livroDAO = new LivroDAO();
        $livros = $livroDAO->findById($idLivro);
            if(!empty($_SESSION['livro'])){
                unset($_SESSION['livro']);
            }
        $_SESSION['livro'] = $livros;
        $livro = $_SESSION['livro'];
        echo "<img src='$livro[capa]' alt=''>";
        echo "<h1>Título: $livro[titulo]</h1>";
        echo "<h2>Subtítulo: $livro[subtitulo]</h2>";
        echo "<h3>Ano de publicação: $livro[ano_publicacao]</h3>";
        echo "<p>Sinopse: $livro[sinopse]</p>";
        echo "<h3>Gênero: $livro[genero]</h3>";
        echo "<a href='$livro[livropath]'>Ler livro</a>";
        ?>
    </div>
</body>
</html>