<?php
session_start();
    if(!isset($_SESSION['perfil'])){
    echo "
    <script>
    history.go(-1)
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
    <style>
        div{
            display: flex;
            flex-direction: column;
            position: relative;
            width: 500px;
        }

        div a{
            justify-self: flex-end;
        }

        div span{
            align-self: center;
        }
    </style>
</head>
<body>
    <div class="principal">
        <div class="informacao">
        <h2>Perfil</h2>
        <div>
            <span><?=$_SESSION['perfil']['nome']?></span>
            <span><?=$_SESSION['perfil']['email']?></span>
            <span><?=date("d/m/Y", strtotime($_SESSION['perfil']['data_nascimento']))?></span>     
            <a href="../view/formAlterarUsuario.php?id=<?=$_SESSION['perfil']['id']?>">Editar perfil</a>
            <a href="../controller/sairClienteController.php" onclick="return sair(event)">Sair</a>
        </div>
    </div>

    <script src="../js/formatarInput.js"></script>
</body>
</html>