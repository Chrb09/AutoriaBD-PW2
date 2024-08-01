<?php

include_once '../conectar.php';

// parte 1 - atributos
class Autor
{
    private $Cod_autor;
    private $NomeAutor;
    private $Sobrenome;
    private $Email;
    private $Nasc;

    // parte 2 - os getters e setters
    public function getCod_autor()
    {
        return $this->Cod_autor;
    }

    public function setCod_autor($iCod_autor)
    {
        $this->Cod_autor = $iCod_autor;
    }

    public function getNomeAutor()
    {
        return $this->NomeAutor;
    }

    public function setNomeAutor($iNomeAutor)
    {
        $this->NomeAutor = $iNomeAutor;
    }

    public function getSobrenome()
    {
        return $this->Sobrenome;
    }

    public function setSobrenome($iSobrenome)
    {
        $this->Sobrenome = $iSobrenome;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($iEmail)
    {
        $this->Email = $iEmail;
    }

    public function getNasc()
    {
        return $this->Nasc;
    }

    public function setNasc($iNasc)
    {
        $this->Nasc = $iNasc;
    }


    // parte 3 - métodos
    function salvar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into autor values (null,?,?,?,?)");
            @$sql->bindParam(1, $this->getNomeAutor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getSobrenome(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getEmail(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getNasc(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return "Registo salvo com sucesso!";
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            return "Erro ao salvar o registro. <h4>" . $exc->getMessage() . "</h4>";
        }
    }

    function listar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->query("select * from autor order by Cod_autor");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }
} // encerramento de classe Produto

?>