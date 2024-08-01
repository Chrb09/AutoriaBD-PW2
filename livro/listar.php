<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/icon.png" />
    <link rel="stylesheet" href="../css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>

<body>
    <main>
        <h1>BD_Autoria</h1>
        <h2>Listar Livro</h2>

        <?php
        include_once 'livro.php';
        $l = new Livro();
        $liv_bd = $l->listar();
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
            foreach ($liv_bd as $liv_mostrar) {
                ?>
                <tr>
                    <td>
                        <b>
                            <?php echo $liv_mostrar[0]; ?>
                        </b>
                    </td>
                    <td>
                        <?php echo $liv_mostrar[1]; ?>
                    </td>
                    <td>
                        <?php echo $liv_mostrar[2]; ?>
                    </td>
                    <td>
                        <?php echo $liv_mostrar[3]; ?>
                    </td>
                    <td>
                        <?php echo $liv_mostrar[4]; ?>
                    </td>
                    <td>
                        <?php echo $liv_mostrar[5]; ?>
                    </td>
                </tr>
                <?php

            }
            ?>
        </table>
        <br> <button onclick="location.href='../menu.html'">Voltar</button>
        <br>
    </main>
</body>

</html>