<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="azulbg">
            <div class="box jCadastrado">
                    <h2>Cadastro de livro</h2>
            </div>

            <div class="box cadastrar">
            </div>
        </div>
        <div class="formBox active">
            <div class="form cadastrarForm">
                    <form action="../controller/cadastrarLivroController.php" method="post" enctype="multipart/form-data">
                        <h3>Cadastrar</h3>
                        <input type="text" name="titulo" id="" placeholder="Título" title="Digite aqui o título do seu livro" required>
                        <input type="text" name="subtitulo" id="" placeholder="Subtítulo" title="Digite aqui o subtítulo do seu livro" required>
                        <div style="display: flex; flex-direction: row;">
                            <label for="anoPublicacao">Ano de publicação</label>
                            <select name="anoPublicacao" id="anoP">                            
                            </select>
                        </div>

                        <script defer>
                            const anoP = document.querySelector("#anoP")                            
                            var dataAtual = new Date().getFullYear();                            
                                for(var i = dataAtual - 50; i <= dataAtual; dataAtual--){
                                    var option = document.createElement("option")
                                    option.setAttribute("value", dataAtual)
                                    option.textContent = dataAtual
                                    anoP.appendChild(option)
                                }                        
                        </script>

                        <input type="file" name="capa" id="" accept="image/*" title="Foto da capa do livro">
                        <input type="file" name="livro" id="" title="Seu  livro em pdf">
                        <select name="genero" id="">
                        <option value="" disabled selected>Selecione</option>
                            <?php
                            require_once '../dao/GeneroDAO.php';

                            $generoDAO = new GeneroDAO();
                            $generos = $generoDAO->findAll();

                            foreach ($generos as $genero){
                                echo "<option value='$genero[id]'>$genero[nome]</option>";
                            }
                            ?>                                                    
                        </select>
                        <textarea name="sinopse" id="" cols="30" rows="4" placeholder="Sinopse"></textarea>
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