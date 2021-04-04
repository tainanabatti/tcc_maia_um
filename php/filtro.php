<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">


</head>
    <body>
        <?php

        $tabela = $_GET['table'];

        $sql = "SELECT column_name FROM information_schema.columns WHERE table_name = '".$tabela."'";

        $resultado = pg_query($conexao, $sql);

        $column =pg_fetch_all($resultado);
        echo '<h1>'.$db.'</h1>';
        foreach ($column as $key){
            foreach ($key as $k){

                echo '<form action="./php/filtro.php" method="get">';
                echo '<a href="filtro.php?column='.$k.'"  name="'.$k.'"  value="'.$k.'">'.$k.'</link><br>' ;
                echo '</form>';
            }
        }
        ?>
    </body>

</html>


