<?php
require_once 'conexao/Conexao.php';
require_once '../dto/comentarioDTO.php';

class ComentarioDAO{
    private $pdo;

    public function __construct(){
        $this->pdo = Conexao::getInstance();
    }

    public function save(ComentarioDTO $comentarioDTO){
        try {
            $sql = "INSERT INTO cliente_livro (livro_id, comentario, USUARIO_id ) VALUES(:li, :com, :ui)";
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
            $sql = "SELECT cl.id, cl.comentario, cl.USUARIO_id as idUser, u.nome FROM cliente_livro as cl INNER JOIN usuario as u ON cl.USUARIO_id = u.id WHERE (cl.livro_id = $idLivro AND cl.comentario IS NOT NULL)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $comentarios;
        } catch (PDOException $e){
            
        }
    }

    public function deleteById($idComentario){
        try {
            $sql = "DELETE FROM cliente_livro WHERE id = $idComentario";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "deu ruim ao apagar o comentario: ", $e->getMessage();
        }
    }
}