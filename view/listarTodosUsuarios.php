<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar clientes</title>
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
    <script src="../js/alerts.js" defer></script>
</head>
<body>
    <form action="../controller/PesquisarUsuarioController.php" method="post">
        <input type="text" name="valor" id="">
        <select name="campo" id="">
            <option value="nome">nome</option>
            <option value="email">e-mail</option>
        </select>
        <input type="submit" value="Pesquisar">
    </form>

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
        echo "<td><a href='../controller/excluirUsuarioController.php?id={$usuario['id']}' class='btnExcluir'><i class='fa-solid fa-trash'></i></a></td>";
        echo "<td><a href='../view/formAlterarUsuario.php?id={$usuario['id']}'><i class='fa-solid fa-pen-to-square'></i></a></td>";                
        echo "<td>$usuario[situacao] <form action='../controller/editarSituacaoUsuarioController.php' method='GET'> <input type='checkbox' name='sit' id='' $situacao > <input type='hidden' name='idUser' value='$usuario[id]'> <input type='submit' value='salvar'> </form></td></tr>";
    }
    ?>
    </th>
    </table>
</body>

<script>
    const check = document.querySelectorAll("input[type='checkbox']");
    for(i = 0; i < check.length; i++){
        check[i].addEventListener("click", function(){
            
        })
    }
</script>

</html>