<?php

include_once '../conectar.php';

// parte 1 - atributos
class Autoria
{
    private $Cod_autor;
    private $Cod_livro;
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

    public function getCod_livro()
    {
        return $this->Cod_livro;
    }

    public function setCod_livro($iCod_livro)
    {
        $this->Cod_livro = $iCod_livro;
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

    function listar()
    {
        try {
            $this->conn = new Conectar();
            $sql = $this->conn->query("select * from autoria order by Cod_autor");
            $sql->execute();
            return $sql->fetchAll();
            $this->conn = null;
        } catch (PDOException $exc) {
            echo "Erro ao executar consulta. " . $exc->getMessage();
        }
    }
} // encerramento de classe Produto

?>