<?php

require_once 'conexao/Conexao.php';

class LivroDAO{
    private $pdo;

    public function __construct(){
        $this->pdo = Conexao::getInstance();
    }

    public function salvar(LivroDTO $livroDTO){
        try {
            $sql = "INSERT INTO livro(titulo, subtitulo, ano_publicacao, genero_id, capa, livropath, sinopse) VALUES(:titulo, :subtitulo, :ano_publicacao, :genero ,:capa, :livro, :sinopse)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":titulo", $livroDTO->getTitulo());
            $stmt->bindValue(":subtitulo", $livroDTO->getSubtitulo());
            $stmt->bindValue(":ano_publicacao", $livroDTO->getAnoPublicacao());
            $stmt->bindValue(":genero", $livroDTO->getGenero());
            $stmt->bindValue(":capa", $livroDTO->getCapa());
            $stmt->bindValue(":livro", $livroDTO->getLivro());
            $stmt->bindValue(":sinopse", $livroDTO->getSinopse());
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao cadastrar: ", $e->getMessage();
        }
    }

    public function findAll(){
        try {
            $sql = "SELECT * FROM livro";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $livros;
        } catch (PDOException $e) {
            echo "Erro ao listar os livros: ", $e->getMessage();
        }
    }

    public function findByGenero($generoIndice){
        try {
            $sql = "SELECT * FROM livro WHERE GENERO_id=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $generoIndice);
            $stmt->execute();
            $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);            
            return $livros;
        } catch (PDOException $e) {
            echo "Erro ao listar os livros: ", $e->getMessage();
        }
    }

    public function findById($id){
        try {
            $sql = "SELECT l.id, l.titulo, l.subtitulo, l.sinopse, l.ano_publicacao, l.capa, l.livropath, g.nome as genero FROM livro as l INNER JOIN genero as g ON l.GENERO_id = g.id WHERE l.id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $livros = $stmt->fetch(PDO::FETCH_ASSOC);
            return $livros;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}