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

        <?php
        require_once '../dao/LivroDAO.php';
        $livroDAO = new LivroDAO();
        $id = $_GET['id'];
        $livro = $livroDAO->findById($id);
        ?>
        <div class="formBox active">
            <div class="form cadastrarForm">
                    <form action="../controller/editarLivroController.php" method="post" enctype="multipart/form-data">
                        <h3>Cadastrar</h3>
                        <input type="hidden" name="id" value="<?= $livro['id'] ?>">
                        <input type="text" name="titulo" id="" placeholder="Título" title="Digite aqui o título do seu livro" required value="<?= $livro['titulo']?>">
                        <input type="text" name="subtitulo" id="" placeholder="Subtítulo" title="Digite aqui o subtítulo do seu livro" required value="<?= $livro['subtitulo']?>">                        
                        <div class="lSelect" style="display: grid; flex-direction: row;grid-template-columns: 50% 50%; height: 40px ; margin: 5px 0px 10px 0px;">
                        <select name="genero" id="" style="width: 98%; height: 100%; border-radius: 5px;">
                            <?php
                            require_once '../dao/GeneroDAO.php';

                            $generoDAO = new GeneroDAO();
                            $generos = $generoDAO->findList();

                            foreach ($generos as $genero){
                                if($genero['id'] == $livro['genero_id']){
                                    $selected = "selected";
                                }else{
                                    $selected = "";
                                }

                                echo "<option value='$genero[id]' $selected >$genero[nome]</option>";
                            }
                            ?>                                                    
                        </select>

                        <select name="anoPublicacao" id="anoP" style="justify-self: flex-end;"> 
                                <option value="<?=$livro['ano_publicacao']?>" selected><?=$livro['ano_publicacao']?></option>
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

                        <textarea name="sinopse" id="" cols="30" rows="4" placeholder="Sinopse" ><?=$livro['sinopse']?></textarea>
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