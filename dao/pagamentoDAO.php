<?php
require_once '../dto/Livro_AutorDTO.php';
require_once 'conexao/Conexao.php';

class PagamentoDAO{
    private $pdo;

    public function __construct(){
        $this->pdo = Conexao::getInstance();
    }

    public function findAll(){
        try {
            $sql = "SELECT * FROM pagamento";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $pagamento = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $pagamento;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function save(PagamentoDTO $pagamentoDTO){
        try {
            $sql = "INSERT INTO pagamento VALUES(?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $pagamentoDTO->getLivroId());
            $stmt->bindValue(2, $pagamentoDTO->getAutorId());
            $stmt->bindValue(3, $pagamentoDTO->getValor());
            $stmt->bindValue(4, $pagamentoDTO->getTipoPagamento());
            return $stmt->execute();
        } catch (PDOException $e) {
                return $e->getMessage();
            }
    }

    public function findById($autorId){
        try {
            $sql = "SELECT a.id FROM autor AS a INNER JOIN usuario AS u ON a.usuario_id = u.id WHERE u.id = ?;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $autorId);
            $stmt->execute();
            $autor = $stmt->fetch(PDO::FETCH_ASSOC);
            return $autor;
        } catch (PDOException $e) {
            
        }
    }
}