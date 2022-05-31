<?php
require_once '../dto/UsuarioDTO.php';
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
}