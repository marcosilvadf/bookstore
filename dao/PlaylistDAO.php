<?php
require_once 'conexao/Conexao.php';
require_once '../dto/PlaylistDTO.php';
require_once '../dao/acessoDAO.php';
session_start();

class PlaylistDAO{
    private $pdo;
    private $acessoDAO;

    public function __construct(){
        $this->pdo = Conexao::getInstance();
        $this->acessoDAO = new AcessoDAO();
    }

    public function salvar(PlaylistDTO $playlistDTO){
        try {
            $this->pdo->beginTransaction();
            $sql = "INSERT INTO playlist(titulo) VALUES(?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $playlistDTO->getTitulo());
            $stmt->execute();

            $lastId = $this->pdo->lastInsertId();
            $sql = "INSERT INTO acesso(playlist_id, usuario_id) VALUES (?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $lastId);
            $stmt->bindValue(2, $_SESSION['perfil']['id']);
            $stmt->execute();
            return $this->pdo->commit();
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            echo "erro ao criar playlist: ", $e->getMessage();
        }
    }

    public function findByIdUser($idUser){
        try {
            $sql = "SELECT p.titulo, u.nome, p.situacao, p.id FROM acesso AS a INNER JOIN playlist AS p ON a.playlist_id = p.id INNER JOIN usuario AS u ON a.USUARIO_id = u.id WHERE u.id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idUser);
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function changeName(PlaylistDTO $playlistDTO){
        try {
            $sql = "UPDATE playlist SET nome = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $playlistDTO->getTitulo());
            $stmt->bindValue(2, $playlistDTO->getId());
            return $stmt->execute();            
        } catch (PDOException $e) {
            echo "Erro ao editar o nome", $e->getMessage();
        }
    }

    public function findPlaylistId($idPlayl){
        try {
            $sql = "SELECT * FROM playlist WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idPlayl);
            $stmt->execute();
            $playlist = $stmt->fetch(PDO::FETCH_ASSOC);
            return $playlist;
        } catch (PDOException $e) {
            echo "Erro ao encontrar playlist: ", $e->getMessage();
        }        
    }

    public function deleteById($idPlayl){
        try {
            $this->pdo->beginTransaction();        
            $this->acessoDAO->deleteById($idPlayl);

            $sql = 'DELETE FROM playlist WHERE id = ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idPlayl);
            $stmt->execute();            
            return $this->pdo->commit();
        } catch (PDOException $e) {
            echo "Erro ao excluir playlist: ", $e->getMessage();
        }
    }
}