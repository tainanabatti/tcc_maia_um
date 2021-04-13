<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <title>Login Form</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        <link rel="stylesheet" href="../css/style.css">
<!--        <link rel="stylesheet" href="../css/bootstrap.css">-->

    </head>
    <body>
    <form action="filtro.php" method="post">
        <?php

        $conexao = pg_connect($_POST['conn']);


        $sql = "SELECT column_name, data_type FROM information_schema.columns WHERE (data_type = 'integer' or data_type = 'date') and  table_name = '".$_REQUEST['table']."'";




        $resultado = pg_query($conexao, $sql);

        $tabela = $_REQUEST['table'];
        $column =pg_fetch_all($resultado);

        echo '<table style="width:100%">';
        echo '<tr>';
        echo '<th>Atributo</th>';
        echo '<th>Tipo</th>';
        echo '</tr>';

        foreach ($column as $key){

                $i = 0;
                echo '<tr>';
                echo '<th><button  name="column" value="'.$key['column_name'].'" class="" >'.$key['column_name'].'</button></th>';
                echo '<th>'.$key['data_type'].'</th>';
                echo '</tr>';
                $i++;

        }


        echo '<input type="checkbox" hidden name="conn"  value="'.$_POST['conn'].'" checked></link><br>' ;
        echo '<input type="checkbox" hidden name="table"  value="'.$_REQUEST['table'].'" checked></link><br>' ;
       ?>
    </form>
        </table>
    </body>

</html>


