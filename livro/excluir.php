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
        <h2>Excluir Livro</h2>
        <form name="formProduto" id="formProduto" method="POST" action="">
            <div class="linha">
                <p>Cid_livro:</p>
                <input name="txtid" onchange="saveId()" id="bdid" type="number" maxlength="50"
                    placeholder="Cid do livro..." required autocomplete="off">
            </div>
            <div class="linha linha-button" id="linha-pesquisar">
                <button name="pesquisar" id="pesquisar" type="submit" class="button-outline">Pesquisar</button>
                <button name="continuar" id="continuar" type="button" class="button-outline">Excluir</button>
                <button name="excluir" type="submit" id="excluir" class="button-outline">Confirmar?</button>
            </div>
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($pesquisar)) {
                include_once 'livro.php';
                $livro = new Livro();
                $livro->setCid_Livro($txtid);
                $livro_bd = $livro->consultar("Cid_livro");
                ?>
                <table id="table">
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
            <?php
            extract($_POST, EXTR_OVERWRITE);
            if (isset($excluir)) {
                include_once 'livro.php';
                $livro = new Livro();
                $livro->setCid_livro($txtid);
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
        sessionStorage.setItem("idlivro", Id);
    });

    $(idbd).attr('value', sessionStorage.getItem('idlivro'));
</script>

</html>