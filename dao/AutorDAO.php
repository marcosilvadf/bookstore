<?php
require_once 'conexao/Conexao.php';

class AutorDAO{
    private $pdo;

    public function __construct(){
        $this->pdo = Conexao::getInstance();
    }

    public function deleteByID($idUsuario){
        try {
            $sql = 'DELETE FROM autor WHERE usuario_id = ?';
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue( 1, $idUsuario );
            return $stmt->execute();
        } catch (PDOException $e) {
            echo 'Erro ao excluir o Usuario ', $e->getMessage();            
        }        
    }

    public function findById($userID){
        try {
            $sql = "SELECT * FROM autor WHERE usuario_id = $userID AND (cpf is not null)";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute();
            $autor = $stmt->fetch(PDO::FETCH_ASSOC);            
            return $autor;
        } catch (PDOException $e) {
            echo $e->getMessage();           
        }
    }

    public function save(AutorDTO $autorDTO){
        try {
            $sql = "UPDATE autor SET logradouro = ?, complemento = ?, numero = ?, bairro = ?, cidade = ?, cpf = ?, uf = ?, cep = ? WHERE usuario_id = ?";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->bindValue(1, $autorDTO->getLogradouro());
            $stmt->bindValue(2, $autorDTO->getComplemento());
            $stmt->bindValue(3, $autorDTO->getNumero());
            $stmt->bindValue(4, $autorDTO->getBairro());
            $stmt->bindValue(5, $autorDTO->getCidade());
            $stmt->bindValue(6, $autorDTO->getCpf());
            $stmt->bindValue(7, $autorDTO->getUf());
            $stmt->bindValue(8, $autorDTO->getCep());
            $stmt->bindValue(9, $autorDTO->getIdUser());
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();           
        }
    }

    public function findByIdCad($userID){
        try {
            $sql = "SELECT * FROM autor WHERE usuario_id = $userID";
            $stmt = $this->pdo->prepare( $sql );
            $stmt->execute();
            $autor = $stmt->fetch(PDO::FETCH_ASSOC);            
            return $autor;
        } catch (PDOException $e) {
            echo $e->getMessage();           
        }
    }
}