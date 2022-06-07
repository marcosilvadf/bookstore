<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/formulario.css">
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
                        <div class="linha">
                            <label for="capa" class="legend">Capa</label>
                            <input type="file" name="capa" id="capa" class="campoFile" accept=".jpg" style="width: 80%;" title="Foto da capa do livro: apenas no formato png e jpg">
                        </div>
                        <div class="linha">
                            <label for="pdf" class="legend">Livro</label>
                            <input type="file" name="livro" id="pdf" class="campoFile" accept=".pdf" title="Seu  livro: apenas no formato pdf">
                        </div>

                        <div class="lSelect" style="display: grid; flex-direction: row;grid-template-columns: 50% 50%; height: 40px ; margin: 5px 0px 10px 0px;">
                        <select name="genero" id="" style="width: 98%; height: 100%; border-radius: 5px;">
                        <option value="" disabled selected>Gênero</option>
                            <?php
                            require_once '../dao/GeneroDAO.php';

                            $generoDAO = new GeneroDAO();
                            $generos = $generoDAO->findList();

                            foreach ($generos as $genero){
                                echo "<option value='$genero[id]'>$genero[nome]</option>";
                            }
                            ?>                                                    
                        </select>

                        <select name="anoPublicacao" id="anoP" style="justify-self: flex-end;"> 
                                <option value="" selected disabled>ano de publicação</option>
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
                            </select>
                        </div>

                        <textarea name="sinopse" id="" cols="30" rows="4" placeholder="Sinopse" ></textarea>
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