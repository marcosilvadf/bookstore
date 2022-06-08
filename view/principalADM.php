<?php
session_start();
    if(!$_SESSION['perfil']== "administrador"){
    header("Location: ../index.php");
    }  

    if(!empty($_SESSION['perfil'])){
        $nome = strtok($_SESSION['perfil']['nome'], " ");
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../image/iconeblack.png">
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/tabela.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
    <script src="../js/teste.js" defer></script>
    <link rel="stylesheet" href="../css/menu.css">
    <style>
        main{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .gri{
            margin-top: 50px;
            width: 50%;
            display: grid;
            grid-template-columns: 33% 34% 33%;
        }



        .foto{
            width: 80%;
            height: 300px;
            display: flex;
            flex-direction: column;
        }

        .foto span{
            margin-top: auto;
        }

        .foto svg{
            margin-top: 30px;
            font-size: 100px;
        }

    </style>
    <title>Tela de administração</title>
</head>
<body>
    <header>
        <div>
        <ul class="menu">
                <div onclick="showMenu()"  id="btnMenu"></div>
                <li class="shMenu"><a href="../index.php"><span></span>Início</a></li>
            </ul>
        </div>
        <form action="/view/listarLivros.php" method="post" id="sch">
            <input type="text" name="livro" id="" placeholder="Pesquisar">
            <button id="btnSch"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <span id="btnSigin" onclick="showMenuProf()"><i class="fa-solid fa-user"></i><span><?= !empty($_SESSION['perfil'])? $nome : "Entrar" ?></span></span>
    </header>

    <div id="optmenu">
            <ul>
                    <?php
                    if(!empty($_SESSION['perfil'])){
                        echo "<li class='hPerfil'><a href='/view/Perfil.php'><span></span><i class='fa-solid fa-user'></i> perfil</a></li>";
                        if($_SESSION['perfil']['tipo'] == "autor"){
                            echo "<li class='hPerfil'><a href='./view/painelAutor.php'><span></span><i class='fa-solid fa-book'></i> Painel</a></li>";
                        }
                    }else{
                        echo "<li class='hPerfil'><a href='/view/formCadastrarUsuario.php'><span></span><i class='fa-solid fa-user'></i> Entrar</a></li>";
                    }      
                    
                    if($_SESSION['perfil']['tipo'] == "administrador"){
                        echo "<li class='hPerfil'><a href='../view/principalADM.php'><span></span><i class='fa-solid fa-book'></i> Painel ADM</a></li>";
                    }

                    ?>
                <?php
                if(!empty($_SESSION['perfil'])){
                    echo "<li class='hPerfil'><a href='/controller/sairUsuarioController.php'><span></span><i class='fa-solid fa-arrow-right-from-bracket'></i> sair</a></li>";
                }
                ?>
            </ul>
        </div>        
    <main>
        <div class="gri">
            <!-- listar usuarios -->
            <div>
                <span class='btn foto'><i class="fa-solid fa-users"></i> <span>Gerenciar usuários</span></span>
            </div>

            <?php
            if(!empty($_SESSION['show'])){
                $show = 'show';
            }else{
                $show = '';
            }
            echo     "<div class='modal $show'>";
            echo     "       <div>";
            ?>
            <form action="../controller/PesquisarUsuarioController.php" method="post">
        <input type="text" name="valor" id="">
        <select name="campo" id="">
            <option value="nome">nome</option>
            <option value="email">e-mail</option>
        </select>
        <input type="submit" value="Pesquisar">
    </form>

                    <?php
                    unset($_SESSION['show']);
                            if(!empty($_SESSION['listaADM'])){
                                ?>
                        <table>
                        <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Data de cadastro</th>
                        <th>Data de Nascimento</th>
                        <th>celular</th>
                        <th>Tipo</th>
                        <th>Excluir</th>
                        <th>Editar</th>
                        <th>situação</th>
                        </tr>

                        <?php
                        foreach ( $_SESSION['listaADM'] as $usuario ) {
                            $data = date('d/m/Y', strtotime($usuario["data_nascimento"]));
                            $dataCad = date('d/m/Y', strtotime($usuario["data_cadastro"]));
                            $usuario["situacao"] == 'ativado' ? $situacao = 'checked' : $situacao = '';
                    
                            echo "<td>$usuario[nome]</td>";
                            echo "<td>$usuario[email]</td>";
                            echo "<td>$dataCad</td>";
                            echo "<td>$data</td>";
                            echo "<td>$usuario[celular]</td>";
                            echo "<td>$usuario[tipo]</td>";
                            echo "<td><a href='../controller/excluirUsuarioController.php?id={$usuario['id']}' class='btnExcluir'><i class='fa-solid fa-trash'></i></a></td>";
                            echo "<td><a href='../view/formAlterarUsuario.php?id={$usuario['id']}'><i class='fa-solid fa-pen-to-square'></i></a></td>";                
                            echo "<td><div class='linha'>$usuario[situacao] <form action='../controller/editarSituacaoUsuarioController.php' method='GET'> <input type='checkbox' name='sit' id='' $situacao > <input type='hidden' name='idUser' value='$usuario[id]'> <input type='submit' value='salvar'> </form></div></td></tr>";
                        } 
                        ?>

                        <?php
                        unset($_SESSION['listaADM']);
                            }else{
                                if(isset($_SESSION['listaADM'])){
                                echo "nenhum registro";
                                unset($_SESSION['listaADM']);
                                }
                            }
                        ?>

                    <table>
                        <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Data de cadastro</th>
                        <th>Data de Nascimento</th>
                        <th>celular</th>
                        <th>Tipo</th>                
                        <th>situação</th>
                        <th>Editar</th>
                        </tr>
                    <?php
                    require_once '../dao/UsuarioDAO.php';
                    require_once '../dao/AutorDAO.php';

                    $usuarioDAO = new UsuarioDAO();
                    $usuarios = $usuarioDAO->findAll();

                    foreach ( $usuarios as $usuario ) {
                        $data = date('d/m/Y', strtotime($usuario["data_nascimento"]));
                        $dataCad = date('d/m/Y', strtotime($usuario["data_cadastro"]));
                        $usuario["situacao"] == 'ativado' ? $situacao = 'checked' : $situacao = '';

                        echo "<td>$usuario[nome]</td>";
                        echo "<td>$usuario[email]</td>";
                        echo "<td>$dataCad</td>";
                        echo "<td>$data</td>";
                        echo "<td>$usuario[celular]</td>";
                        echo "<td>$usuario[tipo]</td>";
                        $usuario['situacao'] == 'ativado' ? $situau = "<i class='fa-solid fa-check'></i>" :$situau = "<i class='fa-solid fa-x'></i>";
                        echo "<td> <a href='../controller/editarSituacaoUsuarioController.php?idUser=$usuario[id]&sit=$usuario[situacao]'>$situau</a></td>";
                        echo "<td><a href='../view/formAlterarUsuario.php?id={$usuario['id']}'><i class='fa-solid fa-pen-to-square'></i></a></td></tr>";                                                  
                    }
                    ?>
                    </th>
                    </table> 
                <script>
                    const check = document.querySelectorAll("input[type='checkbox']");
                    for(i = 0; i < check.length; i++){
                        check[i].addEventListener("click", function(){
                            
                        })
                    }
                </script>
            <?php
            echo     "          <span class='btnModal btn'>sair</span>";
            echo     "       </div>";
            echo     "</div>";
            ?> <!-- fim listar usuario -->


                    <!-- listar livros -->
            <div>
                <span class='btn foto'><i class="fa-solid fa-book" style="font-size: 130px;"></i><span>Gerenciar <br> Livros</span> </span>                
            </div>

            <?php
            if(!empty($_SESSION['show1'])){
                $show1 = 'show';
            }else{
                $show1 = '';
            }

            echo     "<div class='modal $show1'>";
            echo     "       <div>";
            unset($_SESSION['show1']);
            ?>
            <table>
                <tr>
                    <th>Titulo</th>
                    <th>Subtitulo</th>
                    <th>Data de publicação</th>
                    <th>Capa</th>
                    <th>Livro</th>
                    <th>Data de cadastro</th>            
                    <th>Gênero</th>
                    <th>Situação</th>
                    <th>Editar</th>
                </tr>
            <?php
            require_once '../dao/LivroDAO.php';
            require_once '../dao/GeneroDAO.php';
            $generoDAO = new GeneroDAO();
            $livroDAO = new LivroDAO();

            $livros = $livroDAO->findAll();
            foreach ($livros as $livro){
                $genero = $generoDAO->findById($livro['genero_id']);
                $livro['situacao'] == 'ativado' ? $situa = "<i class='fa-solid fa-check'></i>" :$situa = "<i class='fa-solid fa-x'></i>";
                $dataFMT = date("d/m/Y H:m", strtotime($livro['data_cadastro']));
                echo "<tr><td>$livro[titulo]</td>";
                echo "<td>$livro[subtitulo]</td>";
                echo "<td>$livro[ano_publicacao]</td>";
                echo "<td><img src='$livro[capa]' style='width: 50px;'></td>";
                echo "<td><a href='$livro[livropath]'>Ver Livro</a></td>";
                echo "<td>$dataFMT</td>";
                echo "<td>$genero[nome]</td>";
                echo "<td><a href='../controller/situacaoLivroController.php?id={$livro['id']}'>$situa</a></td>";
                echo "<td><a href='../view/formAlterarCadastrarLivro.php?id={$livro['id']}'><i class='fa-solid fa-pen-to-square'></i></a></td></tr>";
            }
            ?>
            </table>
    <?php
            echo     "          <span class='btnModal btn'>sair</span>";
            echo     "       </div>";
            echo     "</div>";
            ?>
            
            <!-- fim listar livros -->


            <!-- listar pagamento -->
            <div>
                <span class='btn foto'><i class="fa-solid fa-money-bill-1-wave"></i> <span>Gerenciar Pagamentos</span></span>        
            </div>
            <?php
            if(!empty($_SESSION['show2'])){
                $show2 = 'show';
            }else{
                $show2 = '';
            }

            echo     "<div class='modal $show2'>";
            echo     "       <div>";
            unset($_SESSION['show2']);
            ?>
            <table>
                <tr>
                <th>Nome do autor</th>
                <th>Nome do livro</th>
                <th>comprovante</th>
                <th>Ativar livro</th>
                </tr>
            <?php
            require_once '../dao/pagamentoDAO.php';

            $pagamentoDAO = new PagamentoDAO();
            $pagamentos = $pagamentoDAO->listaDePagamento();

            foreach ( $pagamentos as $pagamento ){
                $pagamento['comprovante'] == "sem" ? $pago = 'sem pagamento' : $pago = "Pagou";
                echo "<tr><td>$pagamento[nome]</td>";
                echo "<td>$pagamento[titulo]</td>";
                echo "<td>$pago</td>";
                $pagamento['situacao'] == 'ativado' ? $situa = "<i class='fa-solid fa-check'></i>" :$situa = "<i class='fa-solid fa-x'></i>";
                echo "<td><a href='../controller/situacaoPagamento.php?id=$pagamento[id]'>$situa</a></td></tr>";
            }
            ?>
            </th>
        </table>
            <?php
            echo     "          <span class='btnModal btn'>sair</span>";
            echo     "       </div>";
            echo     "</div>";
            ?>
            <!-- fim listar pagamento -->
        </div>
</body>
</html>