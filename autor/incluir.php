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
        <h2>Incluir Autor</h2>
        <form name="formProduto" method="POST" action="">
            <div class="linha">
                <p>Nome:</p>
                <input name="txtautor" type="text" maxlength="20" placeholder="" required>
            </div>
            <div class="linha">
                <p>Sobrenome:</p>
                <input name="txtsobrenome" type="text" maxlength="20" placeholder="" required>
            </div>
            <div class="linha">
                <p>Email:</p>
                <input name="txtemail" type="email" maxlength="35" placeholder="" required>
            </div>
            <div class="linha">
                <p>Data Nascimento:</p>
                <input name="txtnasc" type="date"placeholder="" required>
            </div>
            <div class="linha  linha-button"><button name="enviar" type="submit">Cadastrar</button>
                <button name="limpar" type="reset">Limpar</button>
            </div>
        </form>
        <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($enviar)) {
            include_once 'autor.php';
            $aut = new Autor();
            $aut->setNomeAutor($txtautor);
            $aut->setSobrenome($txtsobrenome);
            $aut->setEmail($txtemail);
            $aut->setNasc($txtnasc);
            echo "<h2>" . $aut->salvar() . "</h2>";
        }
        ?>
        <br> <button onclick="location.href='../menu.html'">Voltar</button>
        <br>
    </main>
</body>

</html>