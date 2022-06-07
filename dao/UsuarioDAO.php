<?php

require_once 'conexao/Conexao.php';
require_once '../dto/UsuarioDTO.php';
require_once '../dao/AutorDAO.php';

class UsuarioDAO{
    private $pdo;
    private $autorDAO;

    public function __construct(){
        $this->pdo = Conexao::getInstance();
        $this->autorDAO = new AutorDAO();
    }

    public function salvar(UsuarioDTO $usuarioDTO){
        try {
            $this->pdo->beginTransaction();
            $sql = "INSERT INTO usuario(nome, email, data_nascimento, tipo, celular, senha) VALUES(:nome, :email, :dtnasc, :tipo, :tel, :senha)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":nome", $usuarioDTO->getNome());
            $stmt->bindValue(":email", $usuarioDTO->getEmail());
            $stmt->bindValue(":dtnasc", $usuarioDTO->getDatanascimento());
            $stmt->bindValue(":tipo", $usuarioDTO->getTipo());
            $stmt->bindValue(":tel", $usuarioDTO->getTelefone());
            $stmt->bindValue(":senha", md5($usuarioDTO->getSenha()));
            $stmt->execute();
                if($usuarioDTO->getTipo() == "autor"){
                    $lasId = $this->pdo->lastInsertId();

                    $sql = "INSERT INTO autor(usuario_id) VALUES(?)";
                    $stmt = $this->pdo->prepare($sql);
                    $stmt->bindValue(1, $lasId);
                    $stmt->execute();
                }
            return $this->pdo->commit();

        } catch (PDOException $e) {
            $this->pdo->rollBack();
            echo "Erro ao cadastrar: ", $e->getMessage();
        }
    }

    public function findAll() {
        try {
            $sql = "SELECT * FROM usuario";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $clientes;
        } catch ( PDOException $e ) {
            echo "Erro ao listar os clientes: ", $e->getMessage();
        }
    }

    public function logar(UsuarioDTO $usuarioDTO){
        try {
            $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":email", $usuarioDTO->getEmail());
            $stmt->bindValue(":senha", md5($usuarioDTO->getSenha()));
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $e){
            
        }
    }

    public function encontrarUsuario(UsuarioDTO $usuarioDTO){        
        try {
            $sql = "SELECT * FROM usuario WHERE email = :email AND data_nascimento = :nasc";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":email", $usuarioDTO->getEmail());
            $stmt->bindValue(":nasc", $usuarioDTO->getDatanascimento());            
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $e) {
            
        }
    }

    public function alterarSenha(UsuarioDTO $usuarioDTO){
        try {
            $sql = "UPDATE usuario SET senha = :senha WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":email", $usuarioDTO->getEmail());
            $stmt->bindValue(":senha", md5($usuarioDTO->getSenha()));
            return $stmt->execute();                        
        } catch (PDOException $e) {
            
        }
    }

    public function update(UsuarioDTO $usuarioDTO){
        try {
            $sql = "UPDATE usuario set nome=:nome, data_nascimento=:dtnasc, tipo=:tipo, celular=:tel where id=:id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":nome", $usuarioDTO->getNome());
            $stmt->bindValue(":dtnasc", $usuarioDTO->getDatanascimento());
            $stmt->bindValue(":tipo", $usuarioDTO->getTipo());
            $stmt->bindValue(":tel", $usuarioDTO->getTelefone());
            $stmt->bindValue(":id", $usuarioDTO->getId());
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            
    }

    public function deleteById($idUsuario){
        try {
            $this->pdo->beginTransaction();
            $usuario = $this->findByID($idUsuario);
            
            $usuario["tipo"] == "autor" ? $this->autorDAO->deleteByID($usuario["id"]) : "";

            $sql = 'DELETE FROM usuario WHERE id = ?';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idUsuario);
            $stmt->execute();            

            return $this->pdo->commit();
        } catch (PDOException $e){
            echo 'Erro ao excluir o Usuario ', $e->getMessage();
        }
    }

    public function findByID($idUsuario){
        try {
            $sql = "SELECT * FROM usuario WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(":id", $idUsuario);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $e){
            echo 'Erro ao encontrar o Usuario ', $e->getMessage();
        }
    }

    public function editarSituacao(UsuarioDTO $usuarioDTO){
        try {
            $sql = "UPDATE usuario SET situacao = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getSituacao());
            $stmt->bindValue(2, $usuarioDTO->getId());
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "erro: ", $e->getMessage();
        }
    }

    public function findByEmail(UsuarioDTO $usuarioDTO){
        try {
            $sql = "SELECT id FROM usuario WHERE email = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getEmail());
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $e) {
            
        }
    }

    public function Pesquisarusuario(UsuarioDTO $usuarioDTO, $campo){
        try {
            $sql = "SELECT * FROM usuario WHERE $campo like ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $usuarioDTO->getCampoValor());
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $usuarios;
        } catch (PDOException $e) {
            
        }
    }
}