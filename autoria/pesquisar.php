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
                    <option value="Cod_autor">Cod_autor</option>
                    <option value="Nome" selected>Nome</option>
                    <option value="Sobrenome">Sobrenome</option>
                    <option value="Email">Email</option>
                    <option value="Data_Nascimento">Data de Nascimento</option>
                </select>
            </div>
            <div class="linha">
                <p id="p-bd">Nome:</p>
                <input name="txtpesquisar" id="txtpesquisa" type="text" maxlength="50" placeholder="Nome do autor..."
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
            include_once 'autor.php';
            $livro = new Autor();
            switch ($escolha) {
                case 'Cod_autor':
                    $livro->setCod_autor($txtpesquisar);
                    break;
                case 'Nome':
                    $livro->setNomeAutor($txtpesquisar);
                    break;
                case 'Sobrenome':
                    $livro->setSobrenome($txtpesquisar);
                    break;
                case 'Email':
                    $livro->setEmail($txtpesquisar);
                    break;
                case 'Data_Nascimento':
                    $livro->setNasc($txtpesquisar);
                    break;
            }
            $produto_bd = $livro->consultar($escolha);

            ?>
            <table>
                <tr>
                    <th>
                        Cod_autor
                    </th>
                    <th>
                        NomeAutor
                    </th>
                    <th>
                        Sobrenome
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Nasc
                    </th>
                </tr>
                <?php
                foreach ($produto_bd as $prod_mostrar) {
                    ?>
                    <tr>
                        <td>
                            <b>
                                <?php echo $prod_mostrar[0]; ?>
                            </b>
                        </td>
                        <td>
                            <?php echo $prod_mostrar[1]; ?>
                        </td>
                        <td>
                            <?php echo $prod_mostrar[2]; ?>
                        </td>
                        <td>
                            <?php echo $prod_mostrar[3]; ?>
                        </td>
                        <td>
                            <?php echo $prod_mostrar[4]; ?>
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
        p.innerHTML = valor + ":";
        pesquisa.placeholder = valor + " do autor...";
        if (valor == "Cod_autor") {
            pesquisa.type = 'number'
        } else if (valor == "Data_Nascimento") {
            pesquisa.type = 'date'
        }
        else {
            pesquisa.type = 'text'
        }
    }

    escolha.addEventListener("change", () => {
        mudar()
    });

    limpar.addEventListener("click", () => {
        escolha.value = "Nome";
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