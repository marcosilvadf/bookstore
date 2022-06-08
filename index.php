<?php
session_start();
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
    <title>Página Principal</title>
    <link rel="shortcut icon" href="/image/iconeblack.png">
    <link rel="stylesheet" href="lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/css/menu.css">
    <script src="lib/fontawesome/js/all.min.js"></script>
    <script src="./js/carrossel.js" defer></script>
    <script src="/js/teste.js" defer></script>
    <style>
        
    </style>
    <!-- <link rel="stylesheet" href="css/main.css"> -->
</head>
<body>
    <header>
        <div>
            <ul class="menu">
                <div onclick="showMenu()"  id="btnMenu"></div>
                <li class="shMenu"><a href="../index.php"><span></span>Início</a></li>
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
                            echo "<li class='hPerfil'><a href='./view/formCadastrarLivro.php'><span></span><i class='fa-solid fa-book'></i> Livro</a></li>";
                        }else{
                            if($_SESSION['perfil']['tipo'] == "administrador"){
                                echo "<li class='hPerfil'><a href='./view/principalADM.php'><span></span><i class='fa-solid fa-book'></i> Painel ADM</a></li>";
                            }
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

        <div id="carrossel">

                <?php
                    require_once './dao/LivroDAO.php';
                    $livroDAO = new LivroDAO();
                    $livro = $livroDAO->findFive();
                    $index = 2;
                    foreach ($livro as $livros) {
                            if($index == 0){
                                $index = 3;
                            }
                        echo "<div class='carItem $index foto'><img src='$livros[capa]' alt=''></div>";
                        $index--;
                        echo     "<div class='modal'>";
                        echo     "       <div>";
                        echo     "            <h1>$livros[titulo]</h1>";
                        echo     "            <span class='linha'>Ano: $livros[ano_publicacao] subtítulo: $livros[subtitulo]</span>";
                        echo     "            <p>$livros[sinopse]</p>";
                        echo     "           <a href='./view/livro.php?idLivro=$livros[id]' target='_blank'><span class='btn'>Ler livro</span></a>";
                        echo     "            <span class='comentario'>Comentários";
                                        require_once './dao/comentarioDAO.php';
                                        $comentarioDAO = new ComentarioDAO();
                                        $comentarios = $comentarioDAO->findById($livros['id']);
                                            foreach ($comentarios as $comentario){
                                                echo "<p> <i class='fa-solid fa-user'></i> $comentario[nome] - $comentario[comentario]</p>";
                                            }
                                            echo     "</span>";
                                            echo     "<span class='btnModal btn'>sair</span>";
                                            echo     "</div>";
                                            echo     "</div>";
                    }
                ?>    
        </div>

        <div class="destaque">
            <?php
                $destaque = $livroDAO->findDestaque();
            ?>
            <div class="livroDestaque">
                <img src="<?=$destaque['capa']?>" alt="" class="foto">
                <?php
                echo     "<div class='modal'>";
                        echo     "       <div>";
                        echo     "            <h1>$destaque[titulo]</h1>";
                        echo     "            <span class='linha'>Ano: $destaque[ano_publicacao] subtítulo: $destaque[subtitulo]</span>";
                        echo     "            <p>$destaque[sinopse]</p>";
                        echo     "           <a href='./view/livro.php?idLivro=$destaque[id]' target='_blank'><span class='btn'>Ler livro</span></a>";
                        echo     "            <span class='comentario'>Comentários";
                                        require_once './dao/comentarioDAO.php';
                                        $comentarioDAO = new ComentarioDAO();
                                        $comentarios = $comentarioDAO->findById($destaque['id']);
                                            foreach ($comentarios as $comentario){
                                                echo "<p><i class='fa-solid fa-user'></i> $comentario[comentario] - $comentario[nome]</p>";
                                            }
                                            echo     "</span>";
                                            echo     "<span class='btnModal btn'>sair</span>";
                                            echo     "</div>";
                                            echo     "</div>";
                                            ?>
            </div>
            <h3>livro em destaque</h3>
        </div>

        <?php
            require_once './dao/LivroDAO.php';
            require_once './dao/GeneroDAO.php';
            $livroDAO = new LivroDAO();
            $generoDAO = new GeneroDAO();            
            $generos = $generoDAO->findAll();
            
            foreach ($generos as $genero){
                echo "<h1 class='genero'>$genero[nome]</h1>";
                echo "<div class='estante'>";
                $generoIndice = $genero["id"];
                $livros = $livroDAO->findByGenero($generoIndice);
                    foreach ($livros as $livro){
                        echo "<div class='mLivro foto'>";
                        echo "<img src='$livro[capa]' alt='' class='capa'>";        
                        echo "<span class='linha'></span>";
                        echo "<h4 class='tLivro'>$livro[titulo]</h4>";
                        echo "</div>";
                        echo     "<div class='modal'>";
                        echo     "       <div>";
                        echo     "            <h1>$livro[titulo]</h1>";
                        echo     "            <span class='linha'>Ano: $livro[ano_publicacao] subtítulo: $livro[subtitulo]</span>";
                        echo     "            <p>$livro[sinopse]</p>";
                        echo     "           <a href='./view/livro.php?idLivro=$livro[id]' target='_blank'><span class='btn'>Ler livro</span></a>";
                        echo     "            <span class='comentario'>Comentários";
                                        require_once './dao/comentarioDAO.php';
                                        $comentarioDAO = new ComentarioDAO();
                                        $comentarios = $comentarioDAO->findById($livro['id']);
                                            foreach ($comentarios as $comentario){
                                                echo "<p><i class='fa-solid fa-user'></i> $comentario[comentario] - $comentario[nome]</p>";
                                            }
                                            echo     "</span>";
                                            echo     "<span class='btnModal btn'>sair</span>";
                                            echo     "</div>";
                                            echo     "</div>";
                            }   
                        echo "</div>";
            }            
        ?>
    </main>

    <footer>
        <small>&copy; Copyright <?= date('Y'); ?>, BookStore</small>
    </footer>
</body>
</html>