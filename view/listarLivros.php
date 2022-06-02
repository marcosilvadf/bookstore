<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(empty($_POST['livro'])){
        header("Location: ../index.php");
    }
    
    require_once '../dao/LivroDAO.php';
    require_once '../dto/LivroDTO.php';

    $livro = "%" . $_POST['livro'] . "%";

    $livroDTO = new LivroDTO();
    $livroDTO->setCampoValor($livro);
    $livroDAO = new LivroDAO();
    $livros = $livroDAO->Pesquisarlivro($livroDTO);
        foreach ($livros as $livro){
            echo $livro['titulo'] . "<br>";
        }
    ?>
</body>
</html>