<?php
require_once 'conexao/Conexao.php';
require_once './dto/comentarioDTO.php';

class ComentarioDAO{
    private $pdo;

    public function __construct(){
        $this->pdo = Conexao::getInstance();
    }

    public function save(ComentarioDTO $comentarioDTO){
        try {
            $sql = "INSERT INTO acesso (livro_id, comentario, USUARIO_id ) VALUES(:li, :com, :ui)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":li", $comentarioDTO->getLivroId());
            $stmt->bindValue(":com", $comentarioDTO->getComentario());
            $stmt->bindValue(":ui", $comentarioDTO->getUsuarioId());
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "deu ruim", $e->getMessage();
        }        
    }

    public function findById($idLivro){
        try {
            $sql = "SELECT a.id, a.comentario, a.USUARIO_id as idUser, u.nome FROM acesso as a INNER JOIN usuario as u ON a.USUARIO_id = u.id WHERE (a.livro_id = $idLivro AND a.comentario IS NOT NULL)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $comentarios;
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public function deleteById($idComentario){
        try {
            $sql = "DELETE FROM acesso WHERE id = $idComentario";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "deu ruim ao apagar o comentario: ", $e->getMessage();
        }
    }
}