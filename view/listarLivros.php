<?php
session_start();
if(!empty($_SESSION['perfil'])){
    $nome = strtok($_SESSION['perfil']['nome'], " ");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../image/iconeblack.png">
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/tabela.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
    <script src="../js/teste.js" defer></script>
    <title>Pesquisando</title>
    <style>

    </style>
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
                            echo "<li class='hPerfil'><a href='../view/formCadastrarLivro.php'><span></span><i class='fa-solid fa-book'></i> Livro</a></li>";
                        }else{
                            if($_SESSION['perfil']['tipo'] == "administrador"){
                                echo "<li class='hPerfil'><a href='../view/principalADM.php'><span></span><i class='fa-solid fa-book'></i> Painel ADM</a></li>";
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
        <table style="width: 97%;">
            <tr><th colspan="3">Resultados: </th></tr>
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
                    ?>
                        <tr>
                            <td><img src="<?= $livro['capa']?>" alt="" style="width: 40px;"></td>
                            <td><?= $livro['titulo']?></td>
                            <td><a href="<?= $livro['livropath']?>" target="_blank">Ver Livro</a></td>
                        </tr>
                                
                    <?php
                }
            ?>
        </table>
    </main>
</body>
</html>