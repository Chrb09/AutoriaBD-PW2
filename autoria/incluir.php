<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/icon.png" />
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir</title>
</head>
<?php
include_once '../autor/autor.php';
$at = new Autor();
$aut_bd = $at->listar();

include_once '../livro/livro.php';
$l = new Livro();
$liv_bd = $l->listar();

?>

<body>
    <main>
        <h1>BD_Autoria</h1>
        <h2>Incluir Autoria</h2>
        <form name="formProduto" method="POST" action="">
            <div class="linha">
                <p>Código Autor:</p>
                <select name="txtcodautor" required>
                    <?php
                    foreach ($aut_bd as $prod_mostrar) {
                        ?>
                        <option value=" <?php echo $prod_mostrar[0]; ?>">
                            <?php echo $prod_mostrar[0] . ' "' . $prod_mostrar[1] . '"'; ?>
                        </option>
                        <?php

                    }
                    ?>
                </select>
            </div>
            <div class="linha">
                <p>CID Livro:</p>
                <select name="txtcidlivro" required>
                    <?php
                    foreach ($liv_bd as $liv_mostrar) {
                        ?>
                        <option value="<?php echo $liv_mostrar[0]; ?>">
                            <?php echo $liv_mostrar[0] . ' "' . $liv_mostrar[1] . '"'; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="linha">
                <p>Data de lançamento:</p>
                <input name="txtdatalanc" type="date" required autocomplete="off">
            </div>
            <div class="linha">
                <p>Editora:</p>
                <input name="txteditora" type="text" maxlength="25" placeholder="Editora do livro..." required
                    autocomplete="off">
            </div>
            <div class="linha linha-button"><button name="enviar" type="submit">Cadastrar</button>
                <button name="limpar" type="reset">Limpar</button>
            </div>
        </form>
        <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($enviar)) {
            include_once 'autoria.php';
            $auto = new Autoria();
            $auto->setCod_autor($txtcodautor);
            $auto->setCid_livro($txtcidlivro);
            $auto->setDataLancamento($txtdatalanc);
            $auto->setEditora($txteditora);
            echo "<h2>" . $auto->salvar() . "</h2>";
        }
        ?>
        <br> <button onclick="location.href='../menu.html'">Voltar</button>
        <br>
    </main>
</body>

</html>