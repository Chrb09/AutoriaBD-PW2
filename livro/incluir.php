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
                <input name="txttitulo" type="text" maxlength="50" placeholder="Titulo do livro..." required
                    autocomplete="off">
            </div>
            <div class="linha">
                <p>Categoria:</p>
                <select name="txtcategoria" required autocomplete="off">
                    <option value="" disabled selected hidden>Escolha uma categoria...</option>
                    <option value="Aventura">Aventura</option>
                    <option value="Biografia">Biografia</option>
                    <option value="Ciência">Ciência</option>
                    <option value="Conto">Conto</option>
                    <option value="Distopia">Distopia</option>
                    <option value="Drama">Drama</option>
                    <option value="Fantasia">Fantasia</option>
                    <option value="Ficção">Ficção</option>
                    <option value="Infanto-Juvenil">Infanto-Juvenil</option>
                    <option value="Horror">Horror</option>
                    <option value="Humor">Humor</option>
                    <option value="Mistério">Mistério</option>
                    <option value="Literatura">Literatura</option>
                    <option value="Poesia">Poesia</option>
                    <option value="Romance">Romance</option>
                    <option value="Suspense">Suspense</option>
                    <option value="Terror">Terror</option>
                    <option value="Thriller">Thriller</option>
                </select>
            </div>
            <div class="linha">
                <p>ISBN:</p>
                <input name="txtisbn" type="text" id="isbn" maxlength="17" placeholder="000-00-000-0000-0" required
                    autocomplete="off">
            </div>
            <div class="linha">
                <p>Idioma:</p>
                <select name="txtidioma" required autocomplete="off">
                    <option value="Africâner">Africâner</option>
                    <option value="Alemão">Alemão</option>
                    <option value="Árabe">Árabe</option>
                    <option value="Armênio">Armênio</option>
                    <option value="Bengali">Bengali</option>
                    <option value="Basco">Basco</option>
                    <option value="Búlgaro">Búlgaro</option>
                    <option value="Cambojano">Cambojano</option>
                    <option value="Checo">Checo</option>
                    <option value="Chinês (Mandarim)">Chinês (Mandarim)</option>
                    <option value="Coreano">Coreano</option>
                    <option value="Croata">Croata</option>
                    <option value="Dinamarquês">Dinamarquês</option>
                    <option value="Eslovaco">Eslovaco</option>
                    <option value="Esloveno">Esloveno</option>
                    <option value="Espanhol">Espanhol</option>
                    <option value="Estoniano">Estoniano</option>
                    <option value="Finlandês">Finlandês</option>
                    <option value="Francês">Francês</option>
                    <option value="Galês">Galês</option>
                    <option value="Georgiano">Georgiano</option>
                    <option value="Grego">Grego</option>
                    <option value="Guzerate">Guzerate</option>
                    <option value="Hebraico">Hebraico</option>
                    <option value="Hindi">Hindi</option>
                    <option value="Holandês">Holandês</option>
                    <option value="Húngaro">Húngaro</option>
                    <option value="Indonésio">Indonésio</option>
                    <option value="Inglês">Inglês</option>
                    <option value="Irlandês">Irlandês</option>
                    <option value="Islandês">Islandês</option>
                    <option value="Italiano">Italiano</option>
                    <option value="Japonês">Japonês</option>
                    <option value="Javanês">Javanês</option>
                    <option value="Latim">Latim</option>
                    <option value="Letão">Letão</option>
                    <option value="Lituano">Lituano</option>
                    <option value="Maltês">Maltês</option>
                    <option value="Mongol">Mongol</option>
                    <option value="Nepalês">Nepalês</option>
                    <option value="Norueguês">Norueguês</option>
                    <option value="Persa">Persa</option>
                    <option value="Polonês">Polonês</option>
                    <option value="Português Brasileiro" selected>Português Brasileiro</option>
                    <option value="Português Portugal">Português Portugal</option>
                    <option value="Romeno">Romeno</option>
                    <option value="Russo">Russo</option>
                    <option value="Sérvio">Sérvio</option>
                    <option value="Sueco">Sueco</option>
                    <option value="Tailandês">Tailandês</option>
                    <option value="Turco">Turco</option>
                    <option value="Ucraniano">Ucraniano</option>
                    <option value="Usbeque">Usbeque</option>
                    <option value="Vietnamita">Vietnamita</option>
                    <option value="Xhosa">Xhosa</option>

                </select>
            </div>
            <div class="linha">
                <p>Quantidade de Páginas:</p>
                <input name="txtqtdepag" type="number" maxlength="11" placeholder="1" required autocomplete="off">
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script>
    $("#isbn").mask("000-00-000-0000-0");

</script>

</html>