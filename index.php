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
    <script src="/js/teste.js" defer></script>
    <!-- <link rel="stylesheet" href="css/main.css"> -->
</head>
<body>
    <header>
        <div>
            <ul class="menu">
                <div onclick="showMenu()"  id="btnMenu"></div>
                <li class="shMenu"><a href=""><span></span>Menu</a></li>
                <li class="shMenu"><a href=""><span></span>Menu</a></li>
                <li class="shMenu"><a href=""><span></span>Menu</a></li>
                <li class="shMenu"><a href=""><span></span>Menu</a></li>
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
                        echo "<li class='hPerfil'><a href=''><span></span><i class='fa-solid fa-user'></i> perfil</a></li>";
                        if(!empty($_SESSION['perfil']['tipo'] == "autor"))
                            echo "<li class='hPerfil'><a href=''><span></span><i class='fa-solid fa-book'></i> Painel</a></li>";
                    }else{
                        echo "<li class='hPerfil'><a href='/view/formCadastrarUsuario.php'><span></span><i class='fa-solid fa-user'></i> Entrar</a></li>";
                    }                 
                    ?>
                <li class='hPerfil'><a href=""><span></span>perfil</a></li>
                <li class='hPerfil'><a href="/controller/sairUsuarioController.php"><span></span><i class="fa-solid fa-arrow-right-from-bracket"></i> sair</a></li>
            </ul>
        </div>

        <main>  

            <div id="carrossel">
                    <div class="carItem">
                        <img src="/image/livrosCapas/6288eb20c2c95.jpg" alt="" style="width: 100px;">
                        <h3>teste</h3>
                    </div>
                    <div class="carItem">
                        <img src="/image/livrosCapas/6288eb20c2c95.jpg" alt="" style="width: 100px;">
                        <h3>teste</h3>
                    </div>
                    <div class="carItem">
                        <img src="/image/livrosCapas/6288eb20c2c95.jpg" alt="" style="width: 100px;">
                        <h3>teste</h3>
                    </div>
            </div>

        <?php
            require_once './dao/LivroDAO.php';
            require_once './dao/GeneroDAO.php';
            $livroDAO = new LivroDAO();
            $generoDAO = new GeneroDAO();            
            $generos = $generoDAO->findAll();
            
            foreach ($generos as $genero){
                echo "<h1>$genero[nome]</h1>";
                echo "<div class='estante'>";
                $generoIndice = $genero["id"];
                $livros = $livroDAO->findByGenero($generoIndice);
                    foreach ($livros as $livro){
                        echo "<div class='mLivro'>";
                        echo "<img src='$livro[capa]' alt='' class='capa'>";        
                        echo "<span class='linha'></span>";
                        echo "<h4 class='tLivro'>$livro[titulo]</h4>";
                        echo "<h5 class='sLivro'>$livro[subtitulo]</h5></div>";
                        echo "<p style='margin-right: 10px;'><a href='/view/livro.php?idLivro=$livro[id]'>Livro</a></p>";
                            if(!empty($_SESSION['perfil'])){
                            echo "<p><a href='/view/listarPlaylists.php?idLivro={$livro['id']}' target='_blank'>Adicionar a playlist</a></p>";                                                       
                            }                        
                        echo "<a href='/view/comentario.php?idLivro={$livro['id']}' style='margin-left: 10px;'>Comentarios</a>";
                        echo "</div>";
                    }   
                echo "</div>";
            }            
        ?>
    </main>

    <footer>
        
    </footer>
</body>
</html>