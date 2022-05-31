<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar pagamento</title>
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
</head>
<body>
<div class="container">
        <div class="azulbg">
            <div class="box jCadastrado">
                    <h2>Cadastro de pagamento</h2>
            </div>

            <div class="box cadastrar">
            </div>
        </div>
        <div class="formBox active">
            <div class="form cadastrarForm">
                    <form action="" method="post">
                        <h3>Cadastrar</h3>
                        <input type="text" name="" id="" title="Digite aqui o título do seu livro" disabled value="Nome do autor">
                        <input type="text" name="" id="" value="R$100,00" readonly>
                        <select name="tipo_pagamento" id="">
                            <option value="" disabled selected>Selecione</option>
                            <option value="">PIX</option>
                            <option value="">Boleto</option>
                        </select>
                        <input type="submit" value="Cadastrar">
                    </form>                
            </div>  
            </div>
    </div>
    <script src="../js/formatarInput.js"></script>
</body>
</html>