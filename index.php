<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>    
    <link rel="stylesheet" href="lib/fontawesome/css/all.min.css">
    <script src="lib/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header>
        <a href="/view/formCadastrarUsuario.php"><i class="fa-solid fa-user" style="font-size: 40px;"></i></a>
    </header>

    <main>        
        <?php
            require_once './dao/LivroDAO.php';
            require_once './dao/GeneroDAO.php';
            $livroDAO = new LivroDAO();
            $generoDAO = new GeneroDAO();            
            $generos = $generoDAO->findAll();
            session_start();
            
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