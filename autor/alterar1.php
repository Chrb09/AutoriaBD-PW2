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
        <h2>Alterar Autor</h2>
        <form name="formProduto" id="formProduto" method="POST" action="alterar2.php">
            <div class="linha">
                <p>Cod_autor:</p>
                <input name="txtid" onchange="" type="number" maxlength="50" placeholder="Código do autor..." required
                    autocomplete="off">
            </div>
            <div class="linha linha-button">
                <button name="pesquisar" type="submit" class="button-outline">Pesquisar</button>
                <button name="limpar" type="reset" class="button-outline">Limpar</button>
            </div>
        </form>
        <br> <button onclick="location.href='../menu.html'">Voltar</button>
        <br>
    </main>
</body>

</html>