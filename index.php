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
                            echo "<li class='hPerfil'><a href=''><span></span><i class='fa-solid fa-book'></i> Painel</a></li>";
                        }
                    }else{
                        echo "<li class='hPerfil'><a href='/view/formCadastrarUsuario.php'><span></span><i class='fa-solid fa-user'></i> Entrar</a></li>";
                    }                 
                    ?>
                <li class='hPerfil'><a href=""  id="escuro"><span></span>escuro</a></li>
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
                    require_once '../bookstore/dao/LivroDAO.php';
                    $livroDAO = new LivroDAO();
                    $livro = $livroDAO->findFive();
                    $index = 2;
                    foreach ($livro as $livros) {
                            if($index == 0){
                                $index = 3;
                            }
                        echo "<div class='carItem $index foto'><img src='$livros[capa]' alt=''></div>";
                        $index--;
                        ?>
                            <div class="modal">
                                <div>
                                    <h1><?= $livros['titulo']?></h1>
                                    <p><?=$livros['sinopse']?></p>
                                    <a href="<?=$livros['livropath']?>" target="_blank">Ler livro</a>
                                    <button class="btnModal">sair</button>
                                </div>
                            </div>
                        <?php
                    }
                ?>

            <!-- <div class="carItem ar2 foto">
                <img src="/image/livrosCapas/6288eb20c2c95.jpg" alt="">
            </div>
            <div class="carItem ar1 foto">
                <img src="/image/livrosCapas/6288eb20c2c95.jpg" alt="">
            </div>
            <div class="carItem ar0 foto">
                <img src="/image/livrosCapas/6288eb20c2c95.jpg" alt="">
            </div>
            <div class="carItem ar4 foto">
                <img src="/image/livrosCapas/6288eb20c2c95.jpg" alt="">                        
            </div>
            <div class="carItem ar3 foto">
                <img src="/image/livrosCapas/6288eb20c2c95.jpg" alt="">                        
            </div>         -->        
        </div>

        <div class="destaque">
            <?php
                $destaque = $livroDAO->findDestaque();
            ?>
            <div class="livroDestaque">
                <img src="<?=$destaque['capa']?>" alt="" class="foto">
                <div class="modal">
                                <div>
                                    <h1><?= $destaque['titulo']?></h1>
                                    <p><?=$destaque['sinopse']?></p>
                                    <a href="<?=$destaque['livropath']?>" target="_blank">Ler livro</a>
                                    <button class="btnModal">sair</button>
                                </div>
                            </div>
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
                echo "<h1>$genero[nome]</h1>";
                echo "<div class='estante'>";
                $generoIndice = $genero["id"];
                $livros = $livroDAO->findByGenero($generoIndice);
                    foreach ($livros as $livro){
                        echo "<div class='mLivro foto'>";
                        echo "<img src='$livro[capa]' alt='' class='capa'>";        
                        echo "<span class='linha'></span>";
                        echo "<h4 class='tLivro'>$livro[titulo]</h4>";
                        /* echo "<p style='margin-right: 10px;'><a href='/view/livro.php?idLivro=$livro[id]'>Livro</a></p>";
                            if(!empty($_SESSION['perfil'])){
                            echo "<p><a href='/view/listarPlaylists.php?idLivro={$livro['id']}' target='_blank'>Adicionar a playlist</a></p>";                                                       
                            }                        
                        echo "<a href='/view/comentario.php?idLivro={$livro['id']}' style='margin-left: 10px;'>Comentarios</a>";*/
                        echo "</div>";
                        ?>
                        <div class="modal">
                            <div>
                                <h1><?= $livro['titulo']?></h1>
                                <p><?=$livro['sinopse']?></p>
                                <a href="<?=$livro['livropath']?>" target="_blank">Ler livro</a>
                                <button class="btnModal">sair</button>
                            </div>
                        </div>

                        <?php
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