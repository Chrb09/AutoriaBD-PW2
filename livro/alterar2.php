<?php
$txtid = $_POST["txtid"];
include_once 'livro.php';
$liv = new Livro();
$liv->setCid_livro($txtid);
$liv_bd = $liv->consultar("Cid_livro");

extract($_POST, EXTR_OVERWRITE);
if (isset($enviar)) {
    $liv->setTitulo($txttitulo);
    $liv->setCategoria($txtcategoria);
    $liv->setISBN($txtisbn);
    $liv->setIdioma($txtidioma);
    $liv->setQtdePag($txtqtdepag);
    $liv->setCid_livro($txtid);
    $sucesso = $liv->alterar();
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
        <h2>Alterar Livro</h2>
        <form name="formProduto" id="formProduto" method="POST" action="">
            <?php
            if (count($liv_bd) === 0) {
                echo "<h2>Nenhum Registro com CID $txtid </h2>";
            } else {
                foreach ($liv_bd as $liv_mostrar) {
                    ?>
                    <div class="linha">
                        <p>Cid_Livro:</p>
                        <input name="txtid" class="inputdisabled" type="text" value="<?php echo $liv_mostrar[0]; ?>"
                            maxlength="50" placeholder="Cid do livro..." required autocomplete="off" tabindex="-1">
                    </div>
                    <div class="linha">
                        <p>Titulo:</p>
                        <input name="txttitulo" type="text" value="<?php echo $liv_mostrar[1]; ?>" maxlength="50"
                            placeholder="Titulo do livro..." required autocomplete="off">
                    </div>
                    <div class="linha">
                        <p>Categoria:</p>
                        <select name="txtcategoria" required autocomplete="off">
                            <option value="" disabled hidden>Escolha uma categoria...</option>
                            <option value="Aventura" <?php if ($liv_mostrar[2] == "Aventura")
                                echo "selected"; ?>>Aventura
                            </option>
                            <option value="Biografia" <?php if ($liv_mostrar[2] == "Biografia")
                                echo "selected"; ?>>Biografia
                            </option>
                            <option value="Ciência" <?php if ($liv_mostrar[2] == "Ciência")
                                echo "selected"; ?>>Ciência
                            </option>
                            <option value="Conto" <?php if ($liv_mostrar[2] == "Conto")
                                echo "selected"; ?>>Conto</option>
                            <option value="Distopia" <?php if ($liv_mostrar[2] == "Distopia")
                                echo "selected"; ?>>Distopia
                            </option>
                            <option value="Drama" <?php if ($liv_mostrar[2] == "Drama")
                                echo "selected"; ?>>Drama</option>
                            <option value="Fantasia" <?php if ($liv_mostrar[2] == "Fantasia")
                                echo "selected"; ?>>Fantasia
                            </option>
                            <option value="Ficção" <?php if ($liv_mostrar[2] == "Ficção")
                                echo "selected"; ?>>Ficção</option>
                            <option value="Infanto-Juvenil" <?php if ($liv_mostrar[2] == "Infanto-Juvenil")
                                echo "selected"; ?>>Infanto-Juvenil</option>
                            <option value="Horror" <?php if ($liv_mostrar[2] == "Horror")
                                echo "selected"; ?>>Horror</option>
                            <option value="Humor" <?php if ($liv_mostrar[2] == "Humor")
                                echo "selected"; ?>>Humor</option>
                            <option value="Mistério" <?php if ($liv_mostrar[2] == "Mistério")
                                echo "selected"; ?>>Mistério
                            </option>
                            <option value="Literatura" <?php if ($liv_mostrar[2] == "Literatura")
                                echo "selected"; ?>>
                                Literatura</option>
                            <option value="Poesia" <?php if ($liv_mostrar[2] == "Poesia")
                                echo "selected"; ?>>Poesia</option>
                            <option value="Romance" <?php if ($liv_mostrar[2] == "Romance")
                                echo "selected"; ?>>Romance
                            </option>
                            <option value="Suspense" <?php if ($liv_mostrar[2] == "Suspense")
                                echo "selected"; ?>>Suspense
                            </option>
                            <option value="Terror" <?php if ($liv_mostrar[2] == "Terror")
                                echo "selected"; ?>>Terror</option>
                            <option value="Thriller" <?php if ($liv_mostrar[2] == "Thriller")
                                echo "selected"; ?>>Thriller
                            </option>
                        </select>
                    </div>
                    <div class="linha">
                        <p>ISBN:</p>
                        <input name="txtisbn" type="text" value="<?php echo $liv_mostrar[3]; ?>" id="isbn" maxlength="17"
                            placeholder="000-00-000-0000-0" required autocomplete="off">
                    </div>
                    <div class="linha">
                        <p>Idioma:</p>
                        <select name="txtidioma" required autocomplete="off">
                            <option value="Africâner" <?php if ($liv_mostrar[4] == "Africâner")
                                echo "selected"; ?>>Africâner
                            </option>
                            <option value="Alemão" <?php if ($liv_mostrar[4] == "Alemão")
                                echo "selected"; ?>>Alemão</option>
                            <option value="Árabe" <?php if ($liv_mostrar[4] == "Árabe")
                                echo "selected"; ?>>Árabe</option>
                            <option value="Armênio" <?php if ($liv_mostrar[4] == "Armênio")
                                echo "selected"; ?>>Armênio
                            </option>
                            <option value="Bengali" <?php if ($liv_mostrar[4] == "Bengali")
                                echo "selected"; ?>>Bengali
                            </option>
                            <option value="Basco" <?php if ($liv_mostrar[4] == "Basco")
                                echo "selected"; ?>>Basco</option>
                            <option value="Búlgaro" <?php if ($liv_mostrar[4] == "Búlgaro")
                                echo "selected"; ?>>Búlgaro
                            </option>
                            <option value="Cambojano" <?php if ($liv_mostrar[4] == "Cambojano")
                                echo "selected"; ?>>Cambojano
                            </option>
                            <option value="Checo" <?php if ($liv_mostrar[4] == "Checo")
                                echo "selected"; ?>>Checo</option>
                            <option value="Chinês" <?php if ($liv_mostrar[4] == "Chinês")
                                echo "selected"; ?>>Chinês</option>
                            <option value="Coreano" <?php if ($liv_mostrar[4] == "Coreano")
                                echo "selected"; ?>>Coreano
                            </option>
                            <option value="Croata" <?php if ($liv_mostrar[4] == "Croata")
                                echo "selected"; ?>>Croata</option>
                            <option value="Dinamarquês" <?php if ($liv_mostrar[4] == "Dinamarquês")
                                echo "selected"; ?>>
                                Dinamarquês</option>
                            <option value="Eslovaco" <?php if ($liv_mostrar[4] == "Eslovaco")
                                echo "selected"; ?>>Eslovaco
                            </option>
                            <option value="Esloveno" <?php if ($liv_mostrar[4] == "Esloveno")
                                echo "selected"; ?>>Esloveno
                            </option>
                            <option value="Espanhol" <?php if ($liv_mostrar[4] == "Espanhol")
                                echo "selected"; ?>>Espanhol
                            </option>
                            <option value="Estoniano" <?php if ($liv_mostrar[4] == "Estoniano")
                                echo "selected"; ?>>Estoniano
                            </option>
                            <option value="Finlandês" <?php if ($liv_mostrar[4] == "Finlandês")
                                echo "selected"; ?>>Finlandês
                            </option>
                            <option value="Francês" <?php if ($liv_mostrar[4] == "Francês")
                                echo "selected"; ?>>Francês
                            </option>
                            <option value="Galês" <?php if ($liv_mostrar[4] == "Galês")
                                echo "selected"; ?>>Galês</option>
                            <option value="Georgiano" <?php if ($liv_mostrar[4] == "Georgiano")
                                echo "selected"; ?>>Georgiano
                            </option>
                            <option value="Grego" <?php if ($liv_mostrar[4] == "Grego")
                                echo "selected"; ?>>Grego</option>
                            <option value="Guzerate" <?php if ($liv_mostrar[4] == "Guzerate")
                                echo "selected"; ?>>Guzerate
                            </option>
                            <option value="Hebraico" <?php if ($liv_mostrar[4] == "Hebraico")
                                echo "selected"; ?>>Hebraico
                            </option>
                            <option value="Hindi" <?php if ($liv_mostrar[4] == "Hindi")
                                echo "selected"; ?>>Hindi</option>
                            <option value="Holandês" <?php if ($liv_mostrar[4] == "Holandês")
                                echo "selected"; ?>>Holandês
                            </option>
                            <option value="Húngaro" <?php if ($liv_mostrar[4] == "Húngaro")
                                echo "selected"; ?>>Húngaro
                            </option>
                            <option value="Indonésio" <?php if ($liv_mostrar[4] == "Indonésio")
                                echo "selected"; ?>>Indonésio
                            </option>
                            <option value="Inglês" <?php if ($liv_mostrar[4] == "Inglês")
                                echo "selected"; ?>>Inglês</option>
                            <option value="Irlandês" <?php if ($liv_mostrar[4] == "Irlandês")
                                echo "selected"; ?>>Irlandês
                            </option>
                            <option value="Islandês" <?php if ($liv_mostrar[4] == "Islandês")
                                echo "selected"; ?>>Islandês
                            </option>
                            <option value="Italiano" <?php if ($liv_mostrar[4] == "Italiano")
                                echo "selected"; ?>>Italiano
                            </option>
                            <option value="Japonês" <?php if ($liv_mostrar[4] == "Japonês")
                                echo "selected"; ?>>Japonês
                            </option>
                            <option value="Javanês" <?php if ($liv_mostrar[4] == "Javanês")
                                echo "selected"; ?>>Javanês
                            </option>
                            <option value="Latim" <?php if ($liv_mostrar[4] == "Latim")
                                echo "selected"; ?>>Latim</option>
                            <option value="Letão" <?php if ($liv_mostrar[4] == "Letão")
                                echo "selected"; ?>>Letão</option>
                            <option value="Lituano" <?php if ($liv_mostrar[4] == "Lituano")
                                echo "selected"; ?>>Lituano
                            </option>
                            <option value="Maltês" <?php if ($liv_mostrar[4] == "Maltês")
                                echo "selected"; ?>>Maltês</option>
                            <option value="Mongol" <?php if ($liv_mostrar[4] == "Mongol")
                                echo "selected"; ?>>Mongol</option>
                            <option value="Nepalês" <?php if ($liv_mostrar[4] == "Nepalês")
                                echo "selected"; ?>>Nepalês
                            </option>
                            <option value="Norueguês" <?php if ($liv_mostrar[4] == "Norueguês")
                                echo "selected"; ?>>Norueguês
                            </option>
                            <option value="Persa" <?php if ($liv_mostrar[4] == "Persa")
                                echo "selected"; ?>>Persa</option>
                            <option value="Polonês" <?php if ($liv_mostrar[4] == "Polonês")
                                echo "selected"; ?>>Polonês
                            </option>
                            <option value="Português Brasileiro" <?php if ($liv_mostrar[4] == "Português Brasileiro")
                                echo "selected"; ?>>Português Brasileiro</option>
                            <option value="Português Portugal" <?php if ($liv_mostrar[4] == "Português Portugal")
                                echo "selected"; ?>>Português Portugal</option>
                            <option value="Romeno" <?php if ($liv_mostrar[4] == "Romeno")
                                echo "selected"; ?>>Romeno</option>
                            <option value="Russo" <?php if ($liv_mostrar[4] == "Russo")
                                echo "selected"; ?>>Russo</option>
                            <option value="Sérvio" <?php if ($liv_mostrar[4] == "Sérvio")
                                echo "selected"; ?>>Sérvio</option>
                            <option value="Sueco" <?php if ($liv_mostrar[4] == "Sueco")
                                echo "selected"; ?>>Sueco</option>
                            <option value="Tailandês" <?php if ($liv_mostrar[4] == "Tailandês")
                                echo "selected"; ?>>Tailandês
                            </option>
                            <option value="Turco" <?php if ($liv_mostrar[4] == "Turco")
                                echo "selected"; ?>>Turco</option>
                            <option value="Ucraniano" <?php if ($liv_mostrar[4] == "Ucraniano")
                                echo "selected"; ?>>Ucraniano
                            </option>
                            <option value="Usbeque" <?php if ($liv_mostrar[4] == "Usbeque")
                                echo "selected"; ?>>Usbeque
                            </option>
                            <option value="Vietnamita" <?php if ($liv_mostrar[4] == "Vietnamita")
                                echo "selected"; ?>>
                                Vietnamita</option>
                            <option value="Xhosa" <?php if ($liv_mostrar[4] == "Xhosa")
                                echo "selected"; ?>>Xhosa</option>
                        </select>
                    </div>
                    <div class="linha">
                        <p>Quantidade de Páginas:</p>
                        <input name="txtqtdepag" type="number" value="<?php echo $liv_mostrar[5]; ?>" maxlength="11"
                            placeholder="1" required autocomplete="off">
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script>
    $("#isbn").mask("000-00-000-0000-0");

</script>

</html>