<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Livros - Administrador</title>
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/tabela.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
</head>
<body>
    <table>
        <tr>
            <th>Titulo</th>
            <th>Subtitulo</th>
            <th>Data de publicação</th>
            <th>Capa</th>
            <th>Livro</th>
            <th>Data de cadastro</th>            
            <th>Gênero</th>
            <th>Situação</th>
            <th>Editar</th>
        </tr>
    <?php
    require_once '../dao/LivroDAO.php';
    require_once '../dao/GeneroDAO.php';
    $generoDAO = new GeneroDAO();
    $livroDAO = new LivroDAO();

    $livros = $livroDAO->findAll();
    foreach ($livros as $livro){
        $genero = $generoDAO->findById($livro['genero_id']);
        $livro['situacao'] == 'ativado' ? $situa = "<i class='fa-solid fa-check'></i>" :$situa = "<i class='fa-solid fa-x'></i>";
        $dataFMT = date("d/m/Y H:m", strtotime($livro['data_cadastro']));
        echo "<tr><td>$livro[titulo]</td>";
        echo "<td>$livro[subtitulo]</td>";
        echo "<td>$livro[ano_publicacao]</td>";
        echo "<td><img src='$livro[capa]' style='width: 50px;'></td>";
        echo "<td><a href='$livro[livropath]'>Ver Livro</a></td>";
        echo "<td>$dataFMT</td>";
        echo "<td>$genero[nome]</td>";
        echo "<td><a href='../controller/situacaoLivroController.php?id={$livro['id']}'>$situa</a></td>";
        echo "<td><a href='../view/formAlterarCadastrarLivro.php?id={$livro['id']}'><i class='fa-solid fa-pen-to-square'></i></a></td></tr>";
    }
    ?>
    </table>
</body>
</html>