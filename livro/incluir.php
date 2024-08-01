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
        <h2>Incluir Livro</h2>
        <form name="formProduto" method="POST" action="">
            <div class="linha">
                <p>Titulo:</p>
                <input name="txttitulo" type="text" maxlength="50" placeholder="" required>
            </div>
            <div class="linha">
                <p>Categoria:</p>
                <input name="txtcategoria" type="text" maxlength="20" placeholder="" required>
            </div>
            <div class="linha">
                <p>ISBN:</p>
                <input name="txtisbn" type="text" maxlength="17" placeholder="" required>
            </div>
            <div class="linha">
                <p>Idioma:</p>
                <input name="txtidioma" type="text" maxlength="20" placeholder="" required>
            </div>
            <div class="linha">
                <p>Quantidade de Páginas:</p>
                <input name="txtqtdepag" type="number" maxlength="11" placeholder="" required>
            </div>
            <div class="linha  linha-button"><button name="enviar" type="submit">Cadastrar</button>
                <button name="limpar" type="reset">Limpar</button>
            </div>
        </form>
        <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($enviar)) {
            include_once 'livro.php';
            $liv = new Livro();
            $liv->setTitulo($txttitulo);
            $liv->setCategoria($txtcategoria);
            $liv->setISBN($txtisbn);
            $liv->setIdioma($txtidioma);
            $liv->setQtdePag($txtqtdepag);
            echo "<h2>" . $liv->salvar() . "</h2>";
        }
        ?>
        <br> <button onclick="location.href='../menu.html'">Voltar</button>
        <br>
    </main>
</body>

</html>