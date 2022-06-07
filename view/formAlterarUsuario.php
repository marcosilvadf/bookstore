    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar Usuário</title>
        <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/formulario.css">
        <script src="../lib/fontawesome/js/all.min.js"></script>
        <style>
            select{
                width: 100%;
                text-align: center;
                margin-bottom: 10px;
            }
        </style>
        <script src="../js/input.js" defer></script>
    </head>
    <body class="login">
        
    <?php
        require_once '../dao/UsuarioDAO.php';
        $idUsuario = $_GET['id'];
        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->findById($idUsuario);
    ?>

        <div class="container">
            <div class="azulbg">
                <div class="box jCadastrado">
                    <h2>Alterar cliente</h2>
                   
                </div>

                <div class="box cadastrar">
                    <h2>Não possui cadastro?</h2>
                    <button class="sCadastro" onclick="cadastrar()">Cadastrar</button>
                </div>
            </div>

            <div class="formBox active">

                <div class="form cadastrarForm">
                    <form action="../controller/editarUsuarioController.php" method="post">
                        <h3>Editar</h3>
                        <input type="hidden" name="id" id="" value="<?= $usuario['id'] ?>">
                        <input type="text" name="nome" id="" placeholder="Nome" pattern="^[A-zÀ-ú-\.\s]{3,100}$" title="Só é permitido letras e espaços." required value="<?php echo $usuario['nome'] ?>">
                        <input type="date" name="dtnasc" id="" required value="<?php echo $usuario['data_nascimento'] ?>">
                        <input type="tel" name="tel" id="tel" placeholder="Telefone" minlength="15" maxlength="15" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" title="Exemplo: (00) 00000-0000" required value="<?php echo $usuario['celular'] ?>">  
                        <div class="rad">              
                        <select name="tipo" id="">
                            <option value="cliente" <?= $usuario['tipo'] == "cliente" ? "selected": "" ?>>Cliente</option>
                            <option value="autor" <?= $usuario['tipo'] == "autor" ? "selected": "" ?>>Autor</option>
                        </select>
                        </div>                                                
                        <input type="submit" value="Cadastrar" >
                    </form>                
                </div>
                    <?php
                        if(isset($_GET["alterado"])){
                            echo "<span class='msg sucess'>Senha alterada com sucesso</span>";
                        }
                
                        if(isset($_GET["usernone"])){
                            echo "<span class='msg erro'>E-mail não cadastrado ou data de nascimento incorreta</span>";
                        }
                    ?>
                </div>
            </div>
        </div>     
            <?php
            

            

            ?>
<!--     <script src="../js/formatarInput.js"></script> -->
    </body>
    </html>