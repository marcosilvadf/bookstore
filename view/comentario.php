<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comentário</title>
</head>
<body>
    <form action='../controller/adicionarComentarioController.php' method='post'>

    <?php
    session_start();
    $idLivro = $_GET['idLivro'];
    echo "<input type='hidden' name='idLivro' value='$idLivro'>";
        if(!empty($_SESSION['perfil'])){
            echo "<textarea name='coment' id='' cols='30' rows='10'></textarea>";
            echo "<input type='submit' value='comentar'>";
            echo "</form>";
        }
    ?>

    <?php
        require_once '../dao/comentarioDAO.php';
        $comentarioDAO = new ComentarioDAO();
        $comentarios = $comentarioDAO->findById($idLivro);
        echo "<ul>";
            foreach ($comentarios as $comentario) {
                echo "<li>$comentario[nome] - $comentario[comentario]";
                if(!empty($_SESSION['perfil'])){
                    if($_SESSION['perfil']['id'] == $comentario['idUser']){
                        echo " - <a href='../controller/excluirComentarioController.php?id={$comentario['id']}'>deletar</a></li>";
                    }
                }
            }
        echo "</ul>";
    ?>
</body>
</html>