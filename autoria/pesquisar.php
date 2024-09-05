<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/icon.png" />
    <link rel="stylesheet" href="../css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
    <style>
        td:nth-child(2),
        th:nth-child(2) {
            text-align: center;
        }
    </style>
</head>

<body>
    <main>
        <h1>BD_Autoria</h1>
        <h2>Pesquisar Autoria</h2>
        <form name="formProduto" method="POST" action="">
            <div class="linha">
                <p>Pesquisar na coluna:</p>
                <select name="escolha" id="escolha-bd">
                    <option value="CodAutor_CidLivro" selected>CodAutor e CidLivro</option>
                    <option value="Cod_autor">Cod_autor</option>
                    <option value="Cid_livro">Cid_livro</option>
                    <option value="Data_Lancamento">Data Lancamento</option>
                    <option value="Editora">Editora</option>
                </select>
            </div>
            <div class="linha" id="linha">
                <p id="p-cod">Código do Autor:</p>
                <input name="txtcod" id="txtpesquisa" type="number" maxlength="50" placeholder="Codigo do autor..."
                    required autocomplete="off">
                <p id="p-cid">Cid do Livro:</p>
                <input name="txtcid" id="txtpesquisa2" type="number" maxlength="50" placeholder="Cid do livro..."
                    required autocomplete="off">
            </div>
            <div class="linha linha-button"><button name="enviar" type="submit" class="button-outline"
                    id="botao-enviar">Consultar</button>
                <button name="limpar" id="limpar" type="button" class="button-outline">Limpar</button>
            </div>
        </form>
        <?php
        extract($_POST, EXTR_OVERWRITE);
        if (isset($enviar)) {
            include_once 'autoria.php';
            $autoria = new Autoria();
            switch ($escolha) {
                case 'CodAutor_CidLivro':
                    $autoria->setCod_autor($txtcod);
                    $autoria->setCid_livro($txtcid);
                    break;
                case 'Cod_autor':
                    $autoria->setCod_autor($txtpesquisar);
                    break;
                case 'Cid_livro':
                    $autoria->setCid_livro($txtpesquisar);
                    break;
                case 'Data_Lancamento':
                    $autoria->setDataLancamento($txtpesquisar);
                    break;
                case 'Editora':
                    $autoria->setEditora($txtpesquisar);
                    break;
            }
            $autoria_bd = $autoria->consultar($escolha);

            ?>
            <table>
                <tr>
                    <th>
                        Cod_autor
                    </th>
                    <th>
                        Cid_livro
                    </th>
                    <th>
                        DataLancamento
                    </th>
                    <th>
                        Editora
                    </th>
                </tr>
                <?php
                foreach ($autoria_bd as $autoria_mostrar) {
                    ?>
                    <tr>
                        <td>
                            <b>
                                <?php echo $autoria_mostrar[0]; ?>
                            </b>
                        </td>
                        <td>
                            <b>
                                <?php echo $autoria_mostrar[1]; ?>
                            </b>
                        </td>
                        <td>
                            <?php echo $autoria_mostrar[2]; ?>
                        </td>
                        <td>
                            <?php echo $autoria_mostrar[3]; ?>
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

        if (valor == "CodAutor_CidLivro") {
            $("#linha").replaceWith(
                '<div class="linha" id="linha">' +
                '<p id="p-cod">Código do Autor:</p>' +
                '<input name="txtcod" id="txtpesquisa" type="number" maxlength="50" placeholder="Codigo do autor..." required autocomplete="off">' +
                '<p id="p-cid">Cid do Livro:</p>' +
                '<input name="txtcid" id="txtpesquisa2" type="number" maxlength="50" placeholder="Cid do livro..." required autocomplete="off">' +
                '</div>'
            )
        } else if (valor == "Cod_autor" || valor == "Cid_livro") {
            $("#linha").replaceWith(
                '<div class="linha"  id="linha">' +
                '<p id="p-bd">' + valor + ':</p>' +
                '<input name = "txtpesquisar" id = "txtpesquisa" type = "number" maxlength = "50" placeholder = "' + valor + ' da autoria..." required autocomplete = "off" >' +
                '</div>'
            )
        }
        else if (valor == "Data_Lancamento") {
            $("#linha").replaceWith(
                '<div class="linha"  id="linha">' +
                '<p id="p-bd">' + valor + ':</p>' +
                '<input name = "txtpesquisar" id = "txtpesquisa" type = "date" maxlength = "50" placeholder = "' + valor + ' da autoria..." required autocomplete = "off" >' +
                '</div>'
            )
        }
        else {
            $("#linha").replaceWith(
                '<div class="linha"  id="linha">' +
                '<p id="p-bd">' + valor + ':</p>' +
                '<input name = "txtpesquisar" id = "txtpesquisa" type = "text" maxlength = "50" placeholder = "' + valor + ' da autoria..." required autocomplete = "off" >' +
                '</div>'
            )
        }
    }

    escolha.addEventListener("change", () => {
        mudar()
    });

    limpar.addEventListener("click", () => {
        escolha.value = "CodAutor_CidLivro";
        var selectedcategory = $(this).children("option:selected").val();
        sessionStorage.setItem("itemAutoria", selectedcategory);
        mudar()
    });


    $('#escolha-bd').change(function (event) {
        var selectedcategory = $(this).children("option:selected").val();
        sessionStorage.setItem("itemAutoria", selectedcategory);
    });

    $('select').find('option[value=' + sessionStorage.getItem('itemAutoria') + ']').attr('selected', 'selected');

    window.onload(mudar())

</script>

</html>