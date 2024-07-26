<!DOCTYPE html>
<html lang="html">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/icon.png" />
    <link rel="stylesheet" href="css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
</head>

<body>
    <main>
        <h1>BD_Autoria</h1>
        <h2>Autoria</h2>

        <?php
        include_once 'autoria.php';
        $a = new Autoria();
        $aut_bd = $a->listar();
        ?>
        <table>

            <tr>
                <th>
                    Cod_autor
                </th>
                <th>
                    Cod_livro
                </th>
                <th>
                    DataLancamento
                </th>
                <th>
                    Editora
                </th>
            </tr>
            <?php
            foreach ($aut_bd as $aut_mostrar) {
                ?>
                <tr>
                    <td>
                        <?php echo $aut_mostrar[0]; ?>
                    </td>
                    <td>
                        <?php echo $aut_mostrar[1]; ?>
                    </td>
                    <td>
                        <?php echo $aut_mostrar[2]; ?>
                    </td>
                    <td>
                        <?php echo $aut_mostrar[3]; ?>
                    </td>
                </tr>
                <?php

            }
            ?>
        </table>
        <br> <button onclick="location.href='menu.html'">Voltar</button>
        <br>
    </main>
</body>

</html>