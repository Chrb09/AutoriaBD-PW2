<?php

include_once '../conectar.php';

// parte 1 - atributos
class Autoria
{
    private $Cod_autor;
    private $Cid_livro;
    private $DataLancamento;
    private $Editora;


    // parte 2 - os getters e setters
    public function getCod_autor()
    {
        return $this->Cod_autor;
    }

    public function setCod_autor($iCod_autor)
    {
        $this->Cod_autor = $iCod_autor;
    }

    public function getCid_livro()
    {
        return $this->Cid_livro;
    }

    public function setCid_livro($iCid_livro)
    {
        $this->Cid_livro = $iCid_livro;
    }

    public function getDataLancamento()
    {
        return $this->DataLancamento;
    }

    public function setDataLancamento($iDataLancamento)
    {
        $this->DataLancamento = $iDataLancamento;
    }

    public function getEditora()
    {
        return $this->Editora;
    }

    public function setEditora($iEditora)
    {
        $this->Editora = $iEditora;
    }

    // parte 3 - métodos
    function salvar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("insert into autoria values (?,?,?,?)");
            @$sql->bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getCid_livro(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getDataLancamento(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getEditora(), PDO::PARAM_STR);
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
            $sql = $this->conn->query("select * from autoria order by DataLancamento");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }
} // encerramento de classe Produto

?>