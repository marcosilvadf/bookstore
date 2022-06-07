<?php

require_once 'conexao/Conexao.php';

class LivroDAO{
    private $pdo;

    public function __construct(){
        $this->pdo = Conexao::getInstance();
    }

    public function salvar(LivroDTO $livroDTO){
        try {
            session_start();
            $this->pdo->beginTransaction();
            $sql = "INSERT INTO livro(titulo, subtitulo, ano_publicacao, genero_id, capa, livropath, sinopse) VALUES(:titulo, :subtitulo, :ano_publicacao, :genero ,:capa, :livro, :sinopse)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":titulo", $livroDTO->getTitulo());
            $stmt->bindValue(":subtitulo", $livroDTO->getSubtitulo());
            $stmt->bindValue(":ano_publicacao", $livroDTO->getAnoPublicacao());
            $stmt->bindValue(":genero", $livroDTO->getGenero());
            $stmt->bindValue(":capa", $livroDTO->getCapa());
            $stmt->bindValue(":livro", $livroDTO->getLivro());
            $stmt->bindValue(":sinopse", $livroDTO->getSinopse());
            $stmt->execute();
            $lasId = $this->pdo->lastInsertId();
            $_SESSION['idlivroa'] = $lasId;
            return $this->pdo->commit();
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
            $sql = "SELECT * FROM livro WHERE GENERO_id=? ";
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
            $sql = "SELECT l.id, l.titulo, l.subtitulo, l.sinopse, l.ano_publicacao, l.capa, l.livropath, l.situacao, g.nome as genero FROM livro as l INNER JOIN genero as g ON l.GENERO_id = g.id WHERE l.id = $id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $livros = $stmt->fetch(PDO::FETCH_ASSOC);
            return $livros;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function Pesquisarlivro(LivroDTO $livroDTO){
        try {
            $sql = "SELECT * FROM livro WHERE titulo like :valor OR subtitulo like :valor OR sinopse like :valor";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':valor', $livroDTO->getCampoValor());
            $stmt->execute();
            $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $livros;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function findFive(){
        try {
            $sql = "SELECT l.id, l.titulo, l.subtitulo, l.sinopse, l.ano_publicacao, l.capa, l.livropath, l.data_cadastro, l.situacao, l.GENERO_id FROM livro as l LIMIT 5";
            $stmt =  $this->pdo->prepare($sql);
            $stmt->execute();
            $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $livros;
        } catch (PDOException $e) {
         echo $e->getMessage();   
        }
    }

    public function findDestaque(){
        try {
            $sql = "SELECT l.titulo, l.capa, l.sinopse, MAX(a.livro_id) AS id, l.livropath, l.ano_publicacao, l.subtitulo FROM livro as l INNER JOIN acesso AS a ON a.livro_id = l.id;";
            $stmt =  $this->pdo->prepare($sql);
            $stmt->execute();
            $livros = $stmt->fetch(PDO::FETCH_ASSOC);
            return $livros;
        } catch (PDOException $e) {
            echo $e->getMessage();   
        }
    }

    public function chSituacao($situ, $id){
        try {
            $sql = "UPDATE livro SET situacao = '$situ' WHERE id = $id";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute();    
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function update(LivroDTO $livroDTO){
        try {
            $sql = "UPDATE livro SET titulo = ?, subtitulo = ?, sinopse = ?, ano_publicacao = ?, genero_id = ? WHERE id =?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $livroDTO->getTitulo());
            $stmt->bindValue(2, $livroDTO->getSubtitulo());
            $stmt->bindValue(3, $livroDTO->getSinopse());
            $stmt->bindValue(4, $livroDTO->getAnoPublicacao());
            $stmt->bindValue(5, $livroDTO->getGenero());
            $stmt->bindValue(6, $livroDTO->getId());
            return $stmt->execute();    
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteById($idComentario){
        try {
            $sql = "DELETE FROM livro WHERE id = $idComentario";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro: ", $e->getMessage();
        }
    }
}