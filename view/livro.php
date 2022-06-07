<?php
require_once '../dao/LivroDAO.php';
$livroDAO = new LivroDAO();
session_start();
    if(empty($_GET['idLivro'])){
        header("Location: ../index.php");
    }else{
        $idLivro = $_GET['idLivro'];
        $livro = $livroDAO->findById($idLivro);       
    }

    if(!empty($_SESSION['perfil'])){
        $nome = strtok($_SESSION['perfil']['nome'], " ");
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livro</title>
    <link rel="shortcut icon" href="../image/iconeblack.png">
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/menu.css">
    <script src="..lib/fontawesome/js/all.min.js"></script>
    <script src="../js/teste.js" defer></script>
    <style>
        body{
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main{
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .gridl{
            display: grid;
            grid-template-columns: 33% 34% 33%;
            flex-direction: row;
            width: 100%;
        }

        .gridl > div{
            margin-top: 100px;
        }
        .mostrar{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 200px;
            height: 340px;
            border: 1px solid black;
            border-radius: 5px;
        }
        img{
            width: 100%;
            height: 282px;
        }

        .mostrar a{
            margin-top: 10px;
            text-decoration: none;
            color: black;
            text-transform: uppercase;
            background-color: #dbdbdb;
            text-align: center;
            border: 1px solid black;
            transition: 0.1s;
            padding: 5px;
            letter-spacing: 1px;
            width: 100px;
        }

        .mostrar a:hover{
            background-color: #c0c0c0;
            text-align: center;
            border: 1px solid black;
            box-shadow: 1px 1px 3px black;
            transition: 0.1s;
        }

        .livro{
            justify-self: center;
        }

        .playl{
            justify-self: flex-end;
        }

        .comentario ul li{
            list-style: none;
        }
    </style>
</head>
<body>
<header>
        <div>
            <ul class="menu">
                <div onclick="showMenu()"  id="btnMenu"></div>
                <li class="shMenu"><a href=""><span></span>Menu</a></li>
                <li class="shMenu"><a href=""><span></span>Menu</a></li>
                <li class="shMenu"><a href=""><span></span>Menu</a></li>
                <li class="shMenu"><a href=""><span></span>Quem somos</a></li>
            </ul>
        </div>
        <form action="/view/listarLivros.php" method="post" id="sch">
            <input type="text" name="livro" id="" placeholder="Pesquisar">
            <button id="btnSch"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <span id="btnSigin" onclick="showMenuProf()"><i class="fa-solid fa-user"></i><span><?= !empty($_SESSION['perfil'])? $nome : "Entrar" ?></span></span>
    </header>

    <div id="optmenu">
            <ul>
                    <?php
                    if(!empty($_SESSION['perfil'])){
                        echo "<li class='hPerfil'><a href='/view/Perfil.php'><span></span><i class='fa-solid fa-user'></i> perfil</a></li>";
                        if($_SESSION['perfil']['tipo'] == "autor"){
                            echo "<li class='hPerfil'><a href='./view/painelAutor.php'><span></span><i class='fa-solid fa-book'></i> Painel</a></li>";
                        }
                    }else{
                        echo "<li class='hPerfil'><a href='/view/formCadastrarUsuario.php'><span></span><i class='fa-solid fa-user'></i> Entrar</a></li>";
                    }                 
                    ?>
                <?php
                if(!empty($_SESSION['perfil'])){
                    echo "<li class='hPerfil'><a href='/controller/sairUsuarioController.php'><span></span><i class='fa-solid fa-arrow-right-from-bracket'></i> sair</a></li>";
                }
                ?>
            </ul>
        </div>

        <main>
            <div class="gridl">
                <div class="comentario">
                    <form action='../controller/adicionarComentarioController.php' method='post'>

                        <?php
                        $idLivro = $_GET['idLivro'];
                        echo "<input type='hidden' name='idLivro' value='$idLivro'>";
                            if(!empty($_SESSION['perfil'])){
                                echo "<input type='text' name='coment' id='' placeholder='Digite seu comentário'>";
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
                                echo "<li><p><i class='fa-solid fa-user'></i> $comentario[comentario] - $comentario[nome]";
                                if(!empty($_SESSION['perfil'])){
                                    if($_SESSION['perfil']['id'] == $comentario['idUser']){
                                        echo " - <a href='../controller/excluirComentarioController.php?id={$comentario['id']}'>deletar</a></li>";
                                    }
                                }
                            }
                        echo "</ul>";
                    ?>
                    
                </div>

                <div class="livro">
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
                    echo "<div class='mostrar'>";
                    echo "<img src='$livro[capa]'/>";
                    echo "<a href='$livro[livropath]'>Ler livro</a>";
                    echo "</div>";
                    ?>
                </div>

                <div class="playl">                    
    </div>
    </main>

    <footer>
        <small>&copy; Copyright <?= date('Y'); ?>, BookStore</small>
    </footer>

</body>
</html>