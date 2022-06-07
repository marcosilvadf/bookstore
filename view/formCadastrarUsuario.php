<?php
session_start();
if(isset($_SESSION['perfil'])){
    unset($_SESSION['perfil']);
}

?>
    
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Cliente</title>
        <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/formulario.css">
        <link rel="shortcut icon" href="/image/iconeblack.png">
        <script src="../lib/fontawesome/js/all.min.js"></script>
        <script src="../js/input.js" defer></script>
        <script src="../js/changeForm.js" defer></script>
        <style>
            select{
                width: 100%;
                text-align: center;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body class="login">
        <div class="container">
            <div class="azulbg">
                <div class="box jCadastrado">
                    <h2>Já possui cadastro?</h2>
                    <button class="cCadastro" onclick="cadastro()">Entrar</button>
                </div>

                <div class="box cadastrar">
                    <h2>Não possui cadastro?</h2>
                    <button class="sCadastro" onclick="cadastrar()">Cadastrar</button>
                </div>
            </div>

            <div class="formBox">
                <div class="form cadastroForm">
                    <form action="../controller/listarUsuarioController.php" method="post">
                        <h3>Entrar</h3>
                        <input type="email" name="email" id="" placeholder="Usuário" required title="seu e-mail">
                        <div class="btnPass">
                            <input type="password" name="senha" class="sen equalPass" placeholder="Senha" maxlength="10" required title="sua senha">                    
                            <span onclick="pass($n = 0)" class="toggle_om">Mostrar senha</i></span>
                        </div>
                        <input type="submit" value="Entrar">
                        <a href="#" class="esqueceu"  onclick="clickEsqSenha()">Esqueceu a senha</a>
                    </form>
                    <?php
                        if(isset($_GET['msg'])){
                            echo $_GET['msg'];
                        }
                    ?>
                </div>

                <div class="form cadastrarForm">
                    <form action="../controller/cadastrarUsuarioController.php" method="post">
                        <h3>Cadastrar</h3>
                        <input type="text" name="nome" id="" placeholder="Nome" pattern="^[A-zÀ-ú-\.\s]{3,100}$" title="Só é permitido letras e espaços." required>
                        <input type="email" name="email" id="" placeholder="E-mail" required>  
                        <input type="date" name="dtnasc" id="" required>
                        <input type="tel" name="tel" id="tel" placeholder="Telefone" minlength="15" maxlength="15" pattern="\([0-9]{2}\)[\s][0-9]{5}-[0-9]{4}" title="Exemplo: (00) 00000-0000" required>                    
                        <select name="tipo" id="">
                            <option value="cliente" selected>Cliente</option>
                            <option value="autor">Autor</option>
                        </select>
                        <div class="btnPass">
                            <input type="password" name="senha" class="sen equalPass" placeholder="Senha" maxlength="10" required>                    
                            <span onclick="pass($n = 1)" class="toggle_om">Mostrar senha</i></span>
                        </div>                    
                        <div class="btnPass">
                            <input type="password" name="senha" class="sen equalPass" onchange="equalPass($y = 2)" placeholder="Confirmar senha" maxlength="10" required>                    
                            <span onclick="pass($n = 2)" class="toggle_om">Mostrar senha</i></span>
                        </div>  
                        <input type="submit" value="Cadastrar">
                    </form>                
                </div>

                <div class="form recuperarForm">
                    <form action="../controller/recuperarClienteController.php" method="post">
                        <h3>Recuperar senha</h3>
                        <input type="text" name="email" id="" placeholder="Usuário" required title="Seu e-mail">
                        <input type="date" name="dtnasc" id="" required>
                        <div class="btnPass">
                            <input type="password" name="senha" class="sen equalPass" placeholder="Nova senha" maxlength="10">                    
                            <span onclick="pass($n = 3)" class="toggle_om">Mostrar senha</i></span>
                        </div>
                        <div class="btnPass">
                            <input type="password" name="senha" class="sen equalPass" onchange="equalPass($y = 4)" placeholder="Confirmar nova senha" maxlength="10" required>                    
                            <span onclick="pass($n = 4)" class="toggle_om">Mostrar senha</i></span>
                        </div>
                        <input type="submit" value="salvar" onclick="return $naoClick[4]" required>
                        <a href="#" class="esqueceu" onclick="clickEsqSenhaOff()">Entrar</a>
                    </form>
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
    <!-- <script src="../js/formatarInput.js"></script> -->
    </body>
    </html>