<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>


    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">



</head>
    <body>
        <?php
        $CONEXAO = pg_connect($_POST['conn']);
        $coluna= $_REQUEST['column'];
        echo "<h1 style='color: #ffffff'>Particionamento da tabela ". ($_POST['table'])."</h1>";


        $sql = "SELECT data_type FROM information_schema.columns WHERE column_name = '$coluna'  and  table_name = '".$_REQUEST['table']."'";

        $resultado = pg_query($CONEXAO, $sql);

        $column =pg_fetch_all($resultado);

        foreach ($column as $key){

           $tipo =  $key['data_type'];

        }



        if($tipo == 'date'){


            ?>
            <form action="core.php" method="post" class="login2">
                <div class="form-row">
                    <div class="col">
                        <div class="form-control" >
                            <h3 " > Intervalo de particionamento </h3>
                            <input type="radio"  name="grao"  value="mensal" >
                            <label for="mensal">Mensal</label><br>
                            <input type="radio"  name="grao"  value="bime" >
                            <label for="bime">Bimestral</label><br>cy
                            <input type="radio"  name="grao"  value="seme" class="form-row">
                            <label for="seme">Semestral</label><br>
                            <input type="radio"  name="grao"  value="anual" checked="checked"  >
                            <label for="anual">Anual</label><br>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-control">
                            <label >As tabelas derivadas do particionamento ficaram com a seguinte  sintaxe</label><br>
                            <label > <?php echo $_POST['table'].'_teste' ?></label><br>
                        </div>
                    </div>
                    </br>
                    <button type="submit" class="btn btn-primary btn-block btn-large">Conectar</button>
                </div>

                <?php
                echo '<input type="checkbox" hidden name="conn"  value="'.$_POST['conn'].'" checked></link><br>' ;
                echo '<input type="checkbox" hidden name="table"  value="'.$_REQUEST['table'].'" checked></link><br>' ;
                echo '<input type="checkbox" hidden name="column"  value="'.$_REQUEST['column'].'" checked></link><br>' ;

                ?>
            </form>


            <?php
        }
        else{
            ?>
            <form action="core.php" method="post" class="login>
                <div class="form-row">
                    <div class="col">
                        <div class="form-control">
                            <h3> Intervalo de particionamento </h3>
                            <input type="radio"  name="grao"  value="meio" >
                            <label for="meio">500.000</label><br>
                            <input type="radio"  name="grao"  value="milhao" checked="checked"  >
                            <label for="milhao">1.000.000</label><br>

                        </div>
                    </div>
                    <div class="col">
                        <div class="form-control" >
                            <label >As tabelas derivadas do particionamento ficaram com a seguinte  sintaxe</label><br>
                            <label > <?php echo $_POST['table'].'_teste' ?></label><br>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-large">Conectar</button>
                </div>

        <?php
        echo '<input type="checkbox" hidden name="conn"  value="'.$_POST['conn'].'" checked></link><br>' ;
        echo '<input type="checkbox" hidden name="table"  value="'.$_REQUEST['table'].'" checked></link><br>' ;
        echo '<input type="checkbox" hidden name="column"  value="'.$_REQUEST['column'].'" checked></link><br>' ;

        ?>
            </form>

        <?php
        }

        ?>



    </body>

</html>


