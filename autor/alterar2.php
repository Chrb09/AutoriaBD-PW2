<?php
$txtid = $_POST["txtid"];
include_once 'autor.php';
$aut = new Autor();
$aut->setCod_autor($txtid);
$aut_bd = $aut->consultar("Cod_autor");

extract($_POST, EXTR_OVERWRITE);
if (isset($enviar)) {
    $aut->setNomeAutor($txtautor);
    $aut->setSobrenome($txtsobrenome);
    $aut->setEmail($txtemail);
    $aut->setNasc($txtnasc);
    $aut->setCod_autor($txtid);
    $sucesso = $aut->alterar();
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
        <h2>Alterar Autor</h2>
        <form name="formProduto" id="formProduto" method="POST" action="">
            <?php
            if (count($aut_bd) === 0) {
                echo "<h2>Nenhum Registro com Cod $txtid </h2>";
            } else {
                foreach ($aut_bd as $aut_mostrar) {

                    ?>
                    <div class="linha">
                        <p>Cod_Autor:</p>
                        <input name="txtid" class="inputdisabled" type="text" value="<?php echo $aut_mostrar[0]; ?>"
                            maxlength="50" placeholder="Código do autor..." required autocomplete="off" tabindex="-1">
                    </div>
                    <div class="linha">
                        <p>Nome:</p>
                        <input name="txtautor" type="text" maxlength="20" value="<?php echo $aut_mostrar[1]; ?>"
                            placeholder="Nome do autor..." required autocomplete="off">
                    </div>
                    <div class="linha">
                        <p>Sobrenome:</p>
                        <input name="txtsobrenome" type="text" maxlength="20" value="<?php echo $aut_mostrar[2]; ?>"
                            placeholder="Sobrenome do autor..." required autocomplete="off">
                    </div>
                    <div class="linha">
                        <p>Email:</p>
                        <input name="txtemail" type="email" maxlength="35" value="<?php echo $aut_mostrar[3]; ?>"
                            placeholder="autor@email.com" required autocomplete="off">
                    </div>
                    <div class="linha">
                        <p>Data Nascimento:</p>
                        <input name="txtnasc" type="date" placeholder="" value="<?php echo $aut_mostrar[4]; ?>" required
                            autocomplete="off">
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