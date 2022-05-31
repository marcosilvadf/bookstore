<?php
session_start();
    if(!isset($_SESSION['perfil'])){
    echo "
    <script>
    window.location.assign('formCadastrarCliente.php');
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
    <title>Perfil BookStore</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="principal">
        <div class="informacao">
        <h2>Perfil</h2>
            <?php 
            $userName = $_SESSION['perfil']['nome'];
            $userMail = $_SESSION['perfil']['email'];
            $userNasc = date('d/m/Y', strtotime($_SESSION['perfil']['nascimento']));
            $userTel = $_SESSION['perfil']['telefone'];
            $userPass = $_SESSION['perfil']['senha'];
            $userCad = $_SESSION['perfil']['datacadastro'];
            $dataFormatada = date('d/m/Y H:i:s', strtotime($userCad));
            echo "<p>$userName</p>";
            echo "<p>$userMail</p>";
            echo "<p>$userNasc</p>";
            echo "<p>$userTel</p>";
            echo "<p>$userPass</p>";
            echo "<p>$dataFormatada</p>";
            ?>        
            <a href="../controller/sairClienteController.php" onclick="return sair(event)">Sair</a>    
        </div>
    </div>

    <script src="../js/formatarInput.js"></script>
</body>
</html>