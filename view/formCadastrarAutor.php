<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Autor</title>
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../js/completarEndereco.js"></script>
    <script src="../lib/fontawesome/js/all.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="azulbg">
            <div class="box jCadastrado">
                    <h2>Complete seu cadastro</h2>
            </div>

            <div class="box cadastrar">
            </div>
        </div>
        <div class="formBox active">
            <div class="form cadastrarForm">
                    <form action="../controller/finalizarCadastroAutor.php" method="post" enctype="multipart/form-data">
                        <h3>Cadastrar</h3>
                        <input type="hidden" name="id" value="<?=$_SESSION['perfil']['id']?>">
                        <input type="text" name="cpf" id="" placeholder="CPF" required>

                        <div class="linha" style="display: flex; flex-direction: row;">
                            <input name="cep" type="text" id="cep" value="" size="40" maxlength="9" placeholder="CEP" class="pq" style="margin-right: 10px;" required/>
                            <input name="rua" type="text" id="rua" size="60" placeholder="Rua" style="width: 100px;"/>
                        </div>
                        
                        <input name="bairro" type="text" id="bairro" size="40" placeholder="Bairro"/>

                        <div class="linha" style="display: flex; flex-direction: row;">
                            <input name="cidade" type="text" id="cidade" size="40" placeholder="Cidade" style="margin-right: 10px;"/>
                            <input name="uf" type="text" id="uf" size="2" placeholder="UF" class="pq" style="width: 100px;"/>
                        </div>

                        <input type="text" name="complemento" placeholder="Comeplemento">

                        <div class="linha" style="display: flex; flex-direction: row;">
                            <input type="text" name="logra" placeholder="Logradouro" size="40" style="margin-right: 10px;">
                            <input type="text" name="numero" placeholder="Numero" class="pq" style="width: 100px;">
                        </div>

                        <input type="submit" value="Cadastrar">
                    </form>                
                    <?php
                        if(isset($_GET['msg'])){
                            echo $_GET['msg'];
                        }
                    ?>
            </div>  
            </div>
    </div>
    <script src="../js/formatarInput.js"></script>
    <script src="../js/inputFormater.js"></script>
    <script src="../js/passwordValidate.js"></script>
</body>
</html>