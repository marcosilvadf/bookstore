<?php
require_once 'conexao/Conexao.php';

class PrecoDAO{
    private $pdo;

    public function __construct(){
        $this->pdo = Conexao::getInstance();
    }

    public function valor(){
        try {
            $sql = "SELECT max(id) as id, valor FROM preco";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $valor = $stmt->fetch(PDO::FETCH_ASSOC);
            $precoDAO = new PrecoDAO();
            $valorfinal = $precoDAO->findById($valor['id']);
            return $valorfinal;
        } catch (PDOException $e) {
            echo "Erro ao pegar ultimo valor", $e->getMessage();
        }
    }

    public function findById($valor){
        try {
            $sql = "SELECT id, valor FROM preco WHERE id = $valor";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $valorid = $stmt->fetch(PDO::FETCH_ASSOC);
            return $valorid;
        } catch (PDOException $e) {
            echo "Erro ao pegar ultimo valor", $e->getMessage();
        }
    }
}