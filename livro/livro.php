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
    function consultar($iescolha)
    {
        try {
            $this->conn = new Conectar();
            switch ($iescolha) {
                case 'Cid_livro':
                    $sql = $this->conn->prepare("select * from livro where Cid_livro like ?");
                    @$sql->bindParam(1, $this->getCid_livro(), PDO::PARAM_STR);
                    break;
                case 'Titulo':
                    $titulo = $this->getTitulo();
                    $titulo = '%' . $titulo . '%';
                    $sql = $this->conn->prepare("select * from livro where NomeAutor like ?");
                    @$sql->bindParam(1, $titulo, PDO::PARAM_STR);
                    break;
                case 'Categoria':
                    $sql = $this->conn->prepare("select * from livro where Categoria like ?");
                    @$sql->bindParam(1, $this->getCategoria(), PDO::PARAM_STR);
                    break;
                case 'ISBN':
                    $ISBN = $this->getISBN();
                    $ISBN = '%' . $ISBN . '%';
                    $sql = $this->conn->prepare("select * from livro where ISBN like ?");
                    @$sql->bindParam(1, $ISBN, PDO::PARAM_STR);
                    break;
                case 'Idioma':
                    $sql = $this->conn->prepare("select * from livro where Idioma like ?");
                    @$sql->bindParam(1, $this->getIdioma(), PDO::PARAM_STR);
                    break;
                case 'Quantidade_Páginas':
                    $QtdePag = $this->getQtdePag();
                    $QtdePag = $QtdePag . '%';
                    $sql = $this->conn->prepare("select * from livro where QtdePag like ?");
                    @$sql->bindParam(1, $QtdePag, PDO::PARAM_STR);
                    break;
            }


            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }
    function exclusao()
    {
        $this->conn = new Conectar();
        $sql = $this->conn->prepare("delete from livro where Cid_livro = ?");
        @$sql->bindParam(1, $this->getCid_livro(), PDO::PARAM_STR);
        if ($sql->execute() == 1) {
            return "Excluido com sucesso!";
        } else {
            return "Erro na exclusão!";
        }
    }
} // encerramento de classe Produto

?>