<?php

require_once "conexao/Conexao.php";

class EditoraDAO{
    private $pdo;

    public function __construct(){
        $this->pdo = Conexao::getInstance();
    }

    public function salvar(EditoraDTO $editoraDTO){
        try {
            $sql = "INSERT INTO editora(cnpj, nome, telefone) VALUES(:cnpj, :nome, :telefone)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":cnpj", $editoraDTO->getCnpj());
            $stmt->bindValue(":nome", $editoraDTO->getNome());
            $stmt->bindValue(":telefone", $editoraDTO->getTelefone());
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: ", $e->getMessage();
        }
    }

    public function findAll(){
        try {
            $sql = "SELECT * FROM editora";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao listar editora: ", $e->getMessage();
        }
    }
}