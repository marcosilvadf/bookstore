<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlists do usuário</title>
</head>
<body>
    
    <?php
    require_once '../dao/PlaylistDAO.php';
    require_once '../dao/acessoDAO.php';
    $idUser = $_SESSION['perfil']['id'];

    $idLivro = $_GET['idLivro'];
    $playlistDAO = new PlaylistDAO();
    $playlists = $playlistDAO->findByIdUser($idUser);

        foreach ($playlists as $playlist) {
            echo "<div style='padding: 5px; border: 1px solid; display: flex; flex-direction: column; align-items: center; width: fit-content;'>";
            echo "    <h1>$playlist[titulo]</h1>";
            echo "    <h2>$playlist[situacao]</h2>";
            $acessoDAO = new AcessoDAO();
            $acesso = $acessoDAO->findAll($playlist['id'], $_SESSION['perfil']['id']);
            echo "<ul>";
                foreach ($acesso as $item) {                    
                    echo "    <li><a href='$item[livropath]'>$item[titulo] - </a> <a href='../controller/excluirItemPlaylist.php?id={$item['id']}'>remover</a></li>";                    
                }
            echo "</ul>";
            echo "    <form action='../controller/salvarNaPlaylistController.php' method='post'>";
            echo "        <input type='hidden' name='idLivro' value='$idLivro'>";
            echo "        <input type='hidden' name='idUser' value='$idUser'>";
            echo "        <input type='hidden' name='idPlayl' value='$playlist[id]'>";
            echo "        <input type='submit' name='' value='Salvar aqui'>";
            echo "    </form>";
            echo "    <a href='../controller/excluirPlaylistController.php?id={$playlist['id']}'>Deletar</a>";
            echo "</div>";
        }
    ?>

    <a href="../view//formCadastrarPlaylist.php">Criar playlist</a>
</body>

<div>

</div>

</html>