<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar pagamento</title>
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
    <style>
        input{
            text-align: center;
        }

        #valor, #data, #comp{
            height: 40px;
            margin-top: 10px;
            margin-left: 11.5px;
        }

        #tp{
            height: 40px;
            border-radius: 5px;
            width: 100px;
            margin-left: 40px;
        }

        .lm{
            font-size: 14px;
        }
    </style>
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
                    
                    <?php
                    require_once '../dao/preco.php';
                    session_start();
                    $precoDAO = new PrecoDAO();
                    $valor = $precoDAO->valor();
                    $valorFMT = str_replace(".", ",", $valor['valor']);
                    $dataFMT = date("Y-m-d");
                ?>
                <form action="../controller/cadastrarPagamentoController.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="precoId" id="" value="<?=$valor['id']?>">
                    <input type="hidden" name="idLivro" id="" value="<?= $_SESSION['idlivroa']?>">
                    <div class="linha">
                            <label for="valor" class="legend">Valor</label>
                            <input type="text" name="valor" id="valor" value="R$ <?= $valorFMT?>" readonly style="width: 80%;">
                    </div>

                    <div class="linha">
                            <label for="data" class="legend">Data</label>
                            <input type="date" name="data" id="data" value="<?= $dataFMT?>" readonly>
                    </div>                

                    <div class="linha">
                            <label for="comp" class="legend">comprovante</label>
                            <input type="file" name="comp" id="comp" value="caminho" accept=".pdf, .jpg">
                    </div>


                    <div class="linha" style="margin-bottom: 20px;">
                            <label for="tp" class="legend lm">Forma de pagamento</label>
                            <select name="tipoP" id="tp">
                                <option value="Pix">Pix</option>
                            </select>  
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
</body>
</html>