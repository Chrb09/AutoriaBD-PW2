<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/icon.png" />
    <link rel="stylesheet" href="../css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
</head>

<body>
    <main>
        <h1>BD_Autoria</h1>
        <h2>Pesquisar Livro</h2>
        <form name="formProduto" method="POST" action="">
            <div class="linha">
                <p>Pesquisar na coluna:</p>
                <select name="escolha" id="escolha-bd">
                    <option value="Cid_livro ">Cid_livro</option>
                    <option value="Titulo" selected>Titulo</option>
                    <option value="Categoria">Categoria</option>
                    <option value="ISBN">ISBN</option>
                    <option value="Idioma">Idioma</option>
                    <option value="Quantidade_Páginas">Quantidade de Páginas</option>
                </select>
            </div>
            <div class="linha">
                <p id="p-bd">Titulo:</p>
                <input name="txtpesquisar" id="txtpesquisa" type="text" maxlength="50" placeholder="Titulo do livro..."
                    required autocomplete="off">
            </div>
            <div class="linha linha-button">
                <button name="enviar" type="submit" class="button-outline" id="botao-enviar">Consultar</button>
                <button name="limpar" id="limpar" type="button" class="button-outline">Limpar</button>
            </div>
        </form>
        <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($enviar)) {
            include_once 'livro.php';
            $livro = new Livro();
            switch ($escolha) {
                case 'Cid_livro':
                    $livro->setCid_Livro($txtpesquisar);
                    break;
                case 'Titulo':
                    $livro->setTitulo($txtpesquisar);
                    break;
                case 'Categoria':
                    $livro->setCategoria($txtpesquisar);
                    break;
                case 'ISBN':
                    $livro->setISBN($txtpesquisar);
                    break;
                case 'Idioma':
                    $livro->setIdioma($txtpesquisar);
                    break;
                case 'Quantidade_Páginas':
                    $livro->setQtdePag($txtpesquisar);
                    break;
            }
            $livro_bd = $livro->consultar($escolha);

            ?>
            <table>
                <tr>
                    <th>
                        Cid_livro
                    </th>
                    <th>
                        Titulo
                    </th>
                    <th>
                        Categoria
                    </th>
                    <th>
                        ISBN
                    </th>
                    <th>
                        Idioma
                    </th>
                    <th>
                        QtdePag
                    </th>

                </tr>
                <?php
                foreach ($livro_bd as $livro_mostrar) {
                    ?>
                    <tr>
                        <td>
                            <b>
                                <?php echo $livro_mostrar[0]; ?>
                            </b>
                        </td>
                        <td>
                            <?php echo $livro_mostrar[1]; ?>
                        </td>
                        <td>
                            <?php echo $livro_mostrar[2]; ?>
                        </td>
                        <td>
                            <?php echo $livro_mostrar[3]; ?>
                        </td>
                        <td>
                            <?php echo $livro_mostrar[4]; ?>
                        </td>
                        <td>
                            <?php echo $livro_mostrar[5]; ?>
                        </td>
                    </tr>
                    <?php

                }
        }

        ?>
        </table>
        <br> <button onclick="location.href='../menu.html'">Voltar</button>
        <br>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    const escolha = document.getElementById("escolha-bd");
    const p = document.getElementById("p-bd")
    const pesquisa = document.getElementById("txtpesquisa")
    const limpar = document.getElementById("limpar")
    const enviar = document.getElementById("botao-enviar")


    function mudar() {
        let valor = escolha.value;

        if (valor == "Cid_livro" || valor == "Quantidade_Páginas") {
            $("#txtselect").replaceWith(
                ' <input name="txtpesquisar" id="txtpesquisa" type="text" maxlength="50" placeholder="' + valor + ' do livro..."required autocomplete="off">'
            )
            pesquisa.type = 'number'
        } else if (valor == "Categoria") {
            $("#txtselect").replaceWith(
                ' <select name="txtpesquisar" id="txtselect" required autocomplete="off">' +
                '<option value="" disabled selected hidden>Escolha uma categoria...</option>' +
                '<option value="Aventura">Aventura</option>' +
                '<option value="Biografia">Biografia</option>' +
                '<option value="Ciência">Ciência</option>' +
                '<option value="Conto">Conto</option>' +
                '<option value="Distopia">Distopia</option>' +
                '<option value="Drama">Drama</option>' +
                '<option value="Fantasia">Fantasia</option>' +
                '<option value="Ficção">Ficção</option>' +
                '<option value="Infanto-Juvenil">Infanto-Juvenil</option>' +
                '<option value="Horror">Horror</option>' +
                '<option value="Humor">Humor</option>' +
                '<option value="Mistério">Mistério</option>' +
                '<option value="Literatura">Literatura</option>' +
                '<option value="Poesia">Poesia</option>' +
                '<option value="Romance">Romance</option>' +
                '<option value="Suspense">Suspense</option>' +
                '<option value="Terror">Terror</option>' +
                '<option value="Thriller">Thriller</option>' +
                '</select >'
            )
            $("#txtpesquisa").replaceWith(
                ' <select name="txtpesquisar" id="txtselect" required autocomplete="off">' +
                '<option value="" disabled selected hidden>Escolha uma categoria...</option>' +
                '<option value="Aventura">Aventura</option>' +
                '<option value="Biografia">Biografia</option>' +
                '<option value="Ciência">Ciência</option>' +
                '<option value="Conto">Conto</option>' +
                '<option value="Distopia">Distopia</option>' +
                '<option value="Drama">Drama</option>' +
                '<option value="Fantasia">Fantasia</option>' +
                '<option value="Ficção">Ficção</option>' +
                '<option value="Infanto-Juvenil">Infanto-Juvenil</option>' +
                '<option value="Horror">Horror</option>' +
                '<option value="Humor">Humor</option>' +
                '<option value="Mistério">Mistério</option>' +
                '<option value="Literatura">Literatura</option>' +
                '<option value="Poesia">Poesia</option>' +
                '<option value="Romance">Romance</option>' +
                '<option value="Suspense">Suspense</option>' +
                '<option value="Terror">Terror</option>' +
                '<option value="Thriller">Thriller</option>' +
                '</select >'
            )
        } else if (valor == "Idioma") {
            $("#txtselect").replaceWith(
                '<select name="txtpesquisar"  id="txtselect" required autocomplete="off">' +
                '<option value="" disabled selected hidden>Escolha um idioma...</option>' +
                '<option value="Africâner">Africâner</option>' +
                '<option value="Alemão">Alemão</option>' +
                '<option value="Árabe">Árabe</option>' +
                '<option value="Armênio">Armênio</option>' +
                '<option value="Bengali">Bengali</option>' +
                '<option value="Basco">Basco</option>' +
                '<option value="Búlgaro">Búlgaro</option>' +
                '<option value="Cambojano">Cambojano</option>' +
                '<option value="Checo">Checo</option>' +
                '<option value="Chinês (Mandarim)">Chinês (Mandarim)</option>' +
                '<option value="Coreano">Coreano</option>' +
                '<option value="Croata">Croata</option>' +
                '<option value="Dinamarquês">Dinamarquês</option>' +
                '<option value="Eslovaco">Eslovaco</option>' +
                '<option value="Esloveno">Esloveno</option>' +
                '<option value="Espanhol">Espanhol</option>' +
                '<option value="Estoniano">Estoniano</option>' +
                '<option value="Finlandês">Finlandês</option>' +
                '<option value="Francês">Francês</option>' +
                '<option value="Galês">Galês</option>' +
                '<option value="Georgiano">Georgiano</option>' +
                '<option value="Grego">Grego</option>' +
                '<option value="Guzerate">Guzerate</option>' +
                '<option value="Hebraico">Hebraico</option>' +
                '<option value="Hindi">Hindi</option>' +
                '<option value="Holandês">Holandês</option>' +
                '<option value="Húngaro">Húngaro</option>' +
                '<option value="Indonésio">Indonésio</option>' +
                '<option value="Inglês">Inglês</option>' +
                '<option value="Irlandês">Irlandês</option>' +
                '<option value="Islandês">Islandês</option>' +
                '<option value="Italiano">Italiano</option>' +
                '<option value="Japonês">Japonês</option>' +
                '<option value="Javanês">Javanês</option>' +
                '<option value="Latim">Latim</option>' +
                '<option value="Letão">Letão</option>' +
                '<option value="Lituano">Lituano</option>' +
                '<option value="Maltês">Maltês</option>' +
                '<option value="Mongol">Mongol</option>' +
                '<option value="Nepalês">Nepalês</option>' +
                '<option value="Norueguês">Norueguês</option>' +
                '<option value="Persa">Persa</option>' +
                '<option value="Polonês">Polonês</option>' +
                '<option value="Português Brasileiro">Português Brasileiro</option>' +
                '<option value="Português Portugal">Português Portugal</option>' +
                '<option value="Romeno">Romeno</option>' +
                '<option value="Russo">Russo</option>' +
                '<option value="Sérvio">Sérvio</option>' +
                '<option value="Sueco">Sueco</option>' +
                '<option value="Tailandês">Tailandês</option>' +
                '<option value="Turco">Turco</option>' +
                '<option value="Ucraniano">Ucraniano</option>' +
                '<option value="Usbeque">Usbeque</option>' +
                '<option value="Vietnamita">Vietnamita</option>' +
                '<option value="Xhosa">Xhosa</option>' +
                '</select>'
            )
            $("#txtpesquisa").replaceWith(
                '<select name="txtpesquisar"  id="txtselect" required autocomplete="off">' +
                '<option value="" disabled selected hidden>Escolha um idioma...</option>' +
                '<option value="Africâner">Africâner</option>' +
                '<option value="Alemão">Alemão</option>' +
                '<option value="Árabe">Árabe</option>' +
                '<option value="Armênio">Armênio</option>' +
                '<option value="Bengali">Bengali</option>' +
                '<option value="Basco">Basco</option>' +
                '<option value="Búlgaro">Búlgaro</option>' +
                '<option value="Cambojano">Cambojano</option>' +
                '<option value="Checo">Checo</option>' +
                '<option value="Chinês (Mandarim)">Chinês (Mandarim)</option>' +
                '<option value="Coreano">Coreano</option>' +
                '<option value="Croata">Croata</option>' +
                '<option value="Dinamarquês">Dinamarquês</option>' +
                '<option value="Eslovaco">Eslovaco</option>' +
                '<option value="Esloveno">Esloveno</option>' +
                '<option value="Espanhol">Espanhol</option>' +
                '<option value="Estoniano">Estoniano</option>' +
                '<option value="Finlandês">Finlandês</option>' +
                '<option value="Francês">Francês</option>' +
                '<option value="Galês">Galês</option>' +
                '<option value="Georgiano">Georgiano</option>' +
                '<option value="Grego">Grego</option>' +
                '<option value="Guzerate">Guzerate</option>' +
                '<option value="Hebraico">Hebraico</option>' +
                '<option value="Hindi">Hindi</option>' +
                '<option value="Holandês">Holandês</option>' +
                '<option value="Húngaro">Húngaro</option>' +
                '<option value="Indonésio">Indonésio</option>' +
                '<option value="Inglês">Inglês</option>' +
                '<option value="Irlandês">Irlandês</option>' +
                '<option value="Islandês">Islandês</option>' +
                '<option value="Italiano">Italiano</option>' +
                '<option value="Japonês">Japonês</option>' +
                '<option value="Javanês">Javanês</option>' +
                '<option value="Latim">Latim</option>' +
                '<option value="Letão">Letão</option>' +
                '<option value="Lituano">Lituano</option>' +
                '<option value="Maltês">Maltês</option>' +
                '<option value="Mongol">Mongol</option>' +
                '<option value="Nepalês">Nepalês</option>' +
                '<option value="Norueguês">Norueguês</option>' +
                '<option value="Persa">Persa</option>' +
                '<option value="Polonês">Polonês</option>' +
                '<option value="Português Brasileiro">Português Brasileiro</option>' +
                '<option value="Português Portugal">Português Portugal</option>' +
                '<option value="Romeno">Romeno</option>' +
                '<option value="Russo">Russo</option>' +
                '<option value="Sérvio">Sérvio</option>' +
                '<option value="Sueco">Sueco</option>' +
                '<option value="Tailandês">Tailandês</option>' +
                '<option value="Turco">Turco</option>' +
                '<option value="Ucraniano">Ucraniano</option>' +
                '<option value="Usbeque">Usbeque</option>' +
                '<option value="Vietnamita">Vietnamita</option>' +
                '<option value="Xhosa">Xhosa</option>' +
                '</select>'
            )
        }
        else {
            $("#txtselect").replaceWith(
                ' <input name="txtpesquisar" id="txtpesquisa" type="text" maxlength="50" placeholder="' + valor + ' do livro..."required autocomplete="off">'
            )
            pesquisa.type = 'text'
        }
        p.innerHTML = valor + ":";
        pesquisa.placeholder = valor + " do livro...";
    }

    escolha.addEventListener("change", () => {
        mudar()
    });

    limpar.addEventListener("click", () => {
        escolha.value = "Titulo";
        var selectedcategory = $(this).children("option:selected").val();
        sessionStorage.setItem("itemAutor", selectedcategory);
        mudar()
    });


    $('#escolha-bd').change(function (event) {
        var selectedcategory = $(this).children("option:selected").val();
        sessionStorage.setItem("itemAutor", selectedcategory);
    });

    $('select').find('option[value=' + sessionStorage.getItem('itemAutor') + ']').attr('selected', 'selected');

    window.onload(mudar())

</script>

</html>