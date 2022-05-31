<?php
require_once 'conexao/Conexao.php';
require_once '../dto/acessoDTO.php';
require_once '../dao/PlaylistDAO.php';

class AcessoDAO{
    private $pdo;

    public function __construct(){
        $this->pdo = Conexao::getInstance();
    }

    public function savePlayl(AcessoDTO $acessoDTO){
        try {
            $sql = "INSERT INTO acesso (livro_id, playlist_id, USUARIO_id) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $acessoDTO->getlivro_Id());
            $stmt->bindValue(2, $acessoDTO->getPlaylistId());
            $stmt->bindValue(3, $acessoDTO->getUsuarioId());
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: ", $e->getMessage();
        }
    }

    public function deleteByID($idPlayl){
        try {
            $sql = 'DELETE FROM acesso WHERE playlist_id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $idPlayl );
            return $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro ao excluir playlist ', $e->getMessage();            
        }        
    }

    public function deleteItem($item){
        $sql = "DELETE FROM acesso WHERE id = $item";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    public function findById($idPlayl, $idUser){
        try {
            $sql = "SELECT * FROM acesso WHERE id = ? AND idUser = $idUser";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idPlayl);
            $stmt->execute();
            $playlist = $stmt->fetch(PDO::FETCH_ASSOC);
            return $playlist;
        } catch (PDOException $e) {
            echo "Erro ao encontrar acesso: ", $e->getMessage();
        }        
    }

    public function findAll($itens){
        try {
            $sql = "SELECT l.titulo, l.livropath, acesso.id FROM acesso INNER JOIN livro as l on l.id = acesso.livro_id WHERE playlist_id = ?;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $itens);
            $stmt->execute();
            $itens = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $itens;
        } catch (PDOException $e) {
            echo "erro ao listar: ", $e->getMessage();
        }
    }
}