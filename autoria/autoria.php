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
    function consultar($iescolha)
    {
        try {
            $this->conn = new Conectar();
            switch ($iescolha) {
                case 'CodAutor_CidLivro':
                    $sql = $this->conn->prepare("select * from autoria where Cod_autor like ? AND Cod_livro like ?");
                    @$sql->bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);
                    @$sql->bindParam(2, $this->getCid_livro(), PDO::PARAM_STR);
                    break;
                case 'Cod_autor':
                    $sql = $this->conn->prepare("select * from autoria where Cod_autor like ?");
                    @$sql->bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);
                    break;
                case 'Cid_livro':
                    $sql = $this->conn->prepare("select * from autoria where Cod_livro like ?");
                    @$sql->bindParam(1, $this->getCid_livro(), PDO::PARAM_STR);
                    break;
                case 'Data_Lancamento':
                    $sql = $this->conn->prepare("select * from autoria where DataLancamento like ?");
                    @$sql->bindParam(1, $this->getDataLancamento(), PDO::PARAM_STR);
                    break;
                case 'Editora':
                    $Editora = $this->getEditora();
                    $Editora = '%' . $Editora . '%';
                    $sql = $this->conn->prepare("select * from autoria where Editora like ?");
                    @$sql->bindParam(1, $Editora, PDO::PARAM_STR);
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
        $sql = $this->conn->prepare("delete from autoria where Cod_autor = ? AND Cod_livro = ?");
        @$sql->bindParam(1, $this->getCod_autor(), PDO::PARAM_STR);
        @$sql->bindParam(2, $this->getCid_livro(), PDO::PARAM_STR);
        if ($sql->execute() == 1) {
            return "Excluido com sucesso!";
        } else {
            return "Erro na exclusão!";
        }
    }
    function alterar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->prepare("update Autoria set DataLancamento = ?, Editora = ? where Cod_autor = ? and Cod_livro = ?");
            @$sql->bindParam(1, $this->getDataLancamento(), PDO::PARAM_STR);
            @$sql->bindParam(2, $this->getEditora(), PDO::PARAM_STR);
            @$sql->bindParam(3, $this->getCod_autor(), PDO::PARAM_STR);
            @$sql->bindParam(4, $this->getCid_livro(), PDO::PARAM_STR);
            if ($sql->execute() == 1) {
                return 1;
            }
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao alterar. " . $exc->getMessage();
        }
    }
} // encerramento de classe Produto

?>