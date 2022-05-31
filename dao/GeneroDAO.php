<?php

require_once 'conexao/Conexao.php';

class GeneroDAO{
    private $pdo;

    public function __construct(){
        $this->pdo = Conexao::getInstance();
    }

    public function findAll(){
        try {
            $sql = "SELECT * FROM genero";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $generos;
        } catch (PDOException $e) {
            echo "Erro ao listar generos", $e->getMessage();
        }
    }
}