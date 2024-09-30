<?php
$txtcod = $_POST["txtcod"];
$txtcid = $_POST["txtcid"];
include_once 'autoria.php';
$autoria = new Autoria();
$autoria->setCod_autor($txtcod);
$autoria->setCid_livro($txtcid);
$autoria_bd = $autoria->consultar("CodAutor_CidLivro");

extract($_POST, EXTR_OVERWRITE);
if (isset($enviar)) {
    $autoria->setDataLancamento($txtdatalanc);
    $autoria->setEditora($txteditora);
    $autoria->setCod_autor($txtcod);
    $autoria->setCid_livro($txtcid);
    $sucesso = $autoria->alterar();
    if ($sucesso == 1) {
        header("location:alterar1.php");
    } else {
        echo "<h2>" . $sucesso . "</h2>";
    }
}
?>
<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/icon.png" />
    <link rel="stylesheet" href="../css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
</head>

<body>
    <main>

        <h1>BD_Autoria</h1>
        <h2>Alterar Autoria</h2>
        <form name="formProduto" id="formProduto" method="POST" action="">
            <?php
            if (count($autoria_bd) === 0) {
                echo "<h2>Nenhum Registro com Cod $txtcod e Cid $txtcid </h2>";
            } else {
                foreach ($autoria_bd as $autoria_mostrar) {
                    ?>
                    <div class="linha">
                        <p>Cod_Autor:</p>
                        <input name="txtcod" class="inputdisabled" type="text" value="<?php echo $autoria_mostrar[0]; ?>"
                            maxlength="50" placeholder="Código do autor..." required autocomplete="off" tabindex="-1">
                    </div>
                    <div class="linha">
                        <p>Cid_Livro:</p>
                        <input name="txtcid" class="inputdisabled" type="text" value="<?php echo $autoria_mostrar[1]; ?>"
                            maxlength="50" placeholder="Cid do livro..." required autocomplete="off" tabindex="-1">
                    </div>
                    <div class="linha">
                        <p>Data de lançamento:</p>
                        <input name="txtdatalanc" type="date" value="<?php echo $autoria_mostrar[2]; ?>" required
                            autocomplete="off">
                    </div>
                    <div class="linha">
                        <p>Editora:</p>
                        <input name="txteditora" type="text" value="<?php echo $autoria_mostrar[3]; ?>" maxlength="25"
                            placeholder="Editora do livro..." required autocomplete="off">
                    </div>
                    <div class="linha"><button name="enviar" type="submit" class="button-outline">Alterar</button>
                    </div>
                    <?php
                }
            }

            ?>
        </form>
        <br> <button onclick="location.href='alterar1.php'">Voltar</button>
        <br>
    </main>
</body>

</html>