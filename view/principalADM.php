<?php
session_start();
    if(!$_SESSION['perfil']== "administrador"){
    echo "
    <script>
    window.location.assign('formCadastrarUsuario.php');
    </script>
    ";
    }  
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de administração</title>
</head>
<body>
    <header>
        <a href="../controller/sairUsuarioController.php" class="btnSair">Sair</a>
    </header>
    <main>
        <a href="listarTodosUsuarios.php">Gerenciar usuários</a>
        <a href="gerenciarLivrosADM.php">Gerenciar Livros</a>
        <a href="">Gerenciar Pagamentos</a>
        <a href="">Gerenciar Comentários</a>
    </main>
        <h1></h1>
    <footer>

    </footer>
</body>
</html>