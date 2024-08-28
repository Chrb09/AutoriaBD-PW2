<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../img/icon.png" />
    <link rel="stylesheet" href="../css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir</title>
    <style>
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
        <h2>Excluir Autor</h2>
        <form name="formProduto" id="formProduto" method="POST" action="">
            <div class="linha">
                <p>Cod_autor:</p>
                <input name="txtid" onchange="saveId()" id="bdid" type="number" maxlength="50"
                    placeholder="Código do autor..." required autocomplete="off">
            </div>
            <div class="linha linha-button" id="linha-pesquisar">
                <button name="pesquisar" id="pesquisar" type="submit" class="button-outline">Pesquisar</button>
                <button name="continuar" id="continuar" type="button" class="button-outline">Excluir</button>
                <button name="excluir" type="submit" id="excluir" class="button-outline">Confirmar?</button>
            </div>
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($pesquisar)) {
                include_once 'autor.php';
                $livro = new Autor();
                $livro->setCod_autor($txtid);
                $produto_bd = $livro->consultar("Cod_autor");
                ?>
                <table id="table">
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
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($excluir)) {
                include_once 'autor.php';
                $livro = new Autor();
                $livro->setCod_autor($txtid);
                echo '<h2>' . $livro->exclusao() . '</h2>';
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
    const idbd = document.getElementById("bdid")
    const linhapesquisar = document.getElementById("linha-pesquisar")
    const continuar = document.getElementById("continuar")
    const excluir = document.getElementById("excluir")

    continuar.addEventListener("click", () => {
        linhapesquisar.classList.toggle('continuar');
    })
    excluir.addEventListener("click", () => {
        linhapesquisar.classList.toggle('continuar');
    })

    $(idbd).change(function (event) {
        var Id = $(this).val();
        sessionStorage.setItem("idautor", Id);
    });

    $(idbd).attr('value', sessionStorage.getItem('idautor'));
</script>

</html>