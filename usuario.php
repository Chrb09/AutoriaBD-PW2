<?php

include_once 'conectar.php';

// parte 1 - atributos
class Usuario
{
    private $usuario;
    private $senha;
    private $conn;

    // parte 2 - os getters e setters

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario($iusuario)
    {
        $this->usuario = $iusuario;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($isenha)
    {
        $this->senha = $isenha;
    }
    // parte 3 - métodos
    function logar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("SELECT * FROM usuario WHERE login LIKE ? and senha = ?");
            @$sql->bindParam(1, $this->getUsuario(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSenha(), PDO::PARAM_STR);
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }
} // encerramento de classe Produto