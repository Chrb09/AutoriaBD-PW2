<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/icon.png" />
    <link rel="stylesheet" href="../css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
    <style>
        td:nth-child(2),
        th:nth-child(2) {
            text-align: center;
        }

        #continuar {
            display: block;
        }

        #excluir {
            display: none;
        }

        .continuar #continuar {
            display: none;
        }

        .continuar #excluir {
            display: block;
        }
    </style>
</head>

<body>
    <main>
        <h1>BD_Autoria</h1>
        <h2>Excluir Autoria</h2>
        <form name="formProduto" id="formProduto" method="POST" action="">
            <div class="linha" id="linha">
                <p id="p-cod">Código do Autor:</p>
                <input name="txtcod" id="txtpesquisa" type="number" maxlength="50" placeholder="Codigo do autor..."
                    required autocomplete="off">
                <p id="p-cid">Cid do Livro:</p>
                <input name="txtcid" id="txtpesquisa2" type="number" maxlength="50" placeholder="Cid do livro..."
                    required autocomplete="off">
            </div>
            <div class="linha linha-button" id="linha-pesquisar">
                <button name="pesquisar" id="pesquisar" type="submit" class="button-outline">Pesquisar</button>
                <button name="continuar" id="continuar" type="button" class="button-outline">Excluir</button>
                <button name="excluir" type="submit" id="excluir" class="button-outline">Confirmar?</button>
            </div>
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($pesquisar)) {
                include_once 'autoria.php';
                $autoria = new Autoria();
                $autoria->setCod_autor($txtcod);
                $autoria->setCid_livro($txtcid);
                $autoria_bd = $autoria->consultar("CodAutor_CidLivro");

                if (count($autoria_bd) === 0) {
                    echo "<h2>Nenhum Registro com Cod $txtcod e Cid $txtcid </h2>";
                } else {
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
            }
            ?>
            </table>
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($excluir)) {
                include_once 'autoria.php';
                $autoria = new Autoria();
                $autoria->setCod_autor($txtcod);
                $autoria->setCid_livro($txtcid);
                echo '<h2>' . $autoria->exclusao() . '</h2>';
            }
            ?>
        </form>
        <br> <button onclick="location.href='../menu.html'">Voltar</button>
        <br>
    </main>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script>
    const txtpesquisa = document.getElementById("txtpesquisa")
    const txtpesquisa2 = document.getElementById("txtpesquisa2")
    const linhapesquisar = document.getElementById("linha-pesquisar")
    const continuar = document.getElementById("continuar")
    const excluir = document.getElementById("excluir")

    continuar.addEventListener("click", () => {
        linhapesquisar.classList.toggle('continuar');
    })
    excluir.addEventListener("click", () => {
        linhapesquisar.classList.toggle('continuar');
    })

    $(txtpesquisa).change(function (event) {
        var txtpesquisa = $(this).val();
        sessionStorage.setItem("txtpesquisa", txtpesquisa);
    });
    $(txtpesquisa2).change(function (event) {
        var txtpesquisa2 = $(this).val();
        sessionStorage.setItem("txtpesquisa2", txtpesquisa2);
    });

    $(txtpesquisa).attr('value', sessionStorage.getItem('txtpesquisa'));
    $(txtpesquisa2).attr('value', sessionStorage.getItem('txtpesquisa2'));
</script>

</html>