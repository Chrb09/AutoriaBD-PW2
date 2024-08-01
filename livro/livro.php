<?php

include_once '../conectar.php';

// parte 1 - atributos
class Livro
{
    private $Cid_livro;
    private $Titulo;
    private $Categoria;
    private $ISBN;
    private $Idioma;
    private $QtdePag;

    // parte 2 - os getters e setters
    public function getCid_livro()
    {
        return $this->Cid_livro;
    }

    public function setCid_livro($iCid_livro)
    {
        $this->Cid_livro = $iCid_livro;
    }

    public function getTitulo()
    {
        return $this->Titulo;
    }

    public function setTitulo($iTitulo)
    {
        $this->Titulo = $iTitulo;
    }

    public function getCategoria()
    {
        return $this->Categoria;
    }

    public function setCategoria($iCategoria)
    {
        $this->Categoria = $iCategoria;
    }

    public function getISBN()
    {
        return $this->ISBN;
    }

    public function setISBN($iISBN)
    {
        $this->ISBN = $iISBN;
    }

    public function getIdioma()
    {
        return $this->Idioma;
    }

    public function setIdioma($iIdioma)
    {
        $this->Idioma = $iIdioma;
    }

    public function getQtdePag()
    {
        return $this->QtdePag;
    }

    public function setQtdePag($iQtdePag)
    {
        $this->QtdePag = $iQtdePag;
    }

    // parte 3 - métodos
    function salvar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into livro values (null,?,?,?,?,?)");
            @$sql->bindParam(1, $this->getTitulo(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCategoria(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getISBN(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getIdioma(), PDO::PARAM_STR);
            @$sql->bindParam(5, $this->getQtdePag(), PDO::PARAM_STR);
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
            $sql = $this->conn->query("select * from livro order by Cid_livro");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }
} // encerramento de classe Produto

?>