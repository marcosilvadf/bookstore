<?php

require_once 'conexao/Conexao.php';

class GeneroDAO{
    private $pdo;

    public function __construct(){
        $this->pdo = Conexao::getInstance();
    }

    public function findAll(){
        try {
            $sql = "SELECT g.nome, g.id FROM genero as g INNER JOIN livro as l on l.genero_id = g.id WHERE l.situacao = 'ativado' GROUP BY g.id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $generos;
        } catch (PDOException $e) {
            echo "Erro ao listar generos", $e->getMessage();
        }
    }

    public function findList(){
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

    public function findById($id){
        try {
            $sql = "SELECT nome FROM genero WHERE id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $generos = $stmt->fetch(PDO::FETCH_ASSOC);
            return $generos;
        } catch (PDOException $e) {
            echo "Erro ao listar generos", $e->getMessage();
        }
    }
}