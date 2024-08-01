<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/icon.png" />
    <link rel="stylesheet" href="../css/normalize.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir</title>
</head>

<body>
    <main>
        <h1>BD_Autoria</h1>
        <h2>Incluir Autoria</h2>
        <form name="formProduto" method="POST" action="">
            <div class="linha">
                <p>Titulo:</p>
                <input name="txttitulo" type="text" maxlength="50" placeholder="">
            </div>
            <div class="linha">
                <p>Categoria:</p>
                <input name="txtcategoria" type="text" maxlength="20" placeholder="">
            </div>
            <div class="linha">
                <p>ISBN:</p>
                <input name="txtisbn" type="text" maxlength="17" placeholder="">
            </div>
            <div class="linha">
                <p>Idioma:</p>
                <input name="txtidioma" type="text" maxlength="20" placeholder="">
            </div>
            <div class="linha">
                <p>Quantidade de Páginas:</p>
                <input name="txtqtdepag" type="number" maxlength="11" placeholder="">
            </div>
            <div class="linha"><button name="enviar" type="submit">Cadastrar</button>
                <button name="limpar" type="reset">Limpar</button>
            </div>
        </form>
        <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($enviar)) {
            include_once 'autoria.php';
            $auto = new Autoria();
            $auto->setCod_autor($txttitulo);
            $auto->setCid_livro($txtcategoria);
            $auto->set($txtisbn);
            $auto->setIdioma($txtidioma);
            $auto->setQtdePag($txtqtdepag);
            echo "<h2>" . $auto->salvar() . "</h2>";
        }
        ?>
        <br> <button onclick="location.href='../menu.html'">Voltar</button>
        <br>
    </main>
</body>

</html>