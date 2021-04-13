<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">



</head>
    <body>
        <?php
        $CONEXAO = pg_connect($_POST['conn']);
        $coluna= $_REQUEST['column'];
        echo "<h1>Particionamento da tabela ". ($_POST['table'])."</h1>";


        $sql = "SELECT data_type FROM information_schema.columns WHERE column_name = '$coluna'  and  table_name = '".$_REQUEST['table']."'";

        $resultado = pg_query($CONEXAO, $sql);

        $column =pg_fetch_all($resultado);

        foreach ($column as $key){

           $tipo =  $key['data_type'];

        }



        if($tipo == 'date'){


            ?>
            <form action="core.php" method="post">
                <div class="form-row">
                    <div class="col">
                        <div class="form-control" >
                            <h3> Intervalo de particionamento </h3>
                            <input type="radio"  name="ss"  value="mensal" >
                            <label for="mensal">Mensal</label><br>
                            <input type="radio"  name="ss"  value="bime" >
                            <label for="bime">Bimestral</label><br>
                            <input type="radio"  name="ss"  value="seme" >
                            <label for="seme">Semestral</label><br>
                            <input type="radio"  name="ss"  value="anual" checked="checked"  >
                            <label for="anual">Anual</label><br>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-control">
                            <label >As tabelas derivadas do particionamento ficaram com a seguinte  sintaxe</label><br>
                            <label > <?php echo $_POST['table'].'_teste' ?></label><br>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-large">Conectar</button>
                </div>
            </form>


            <?php
        }
        else{
            ?>
            <form action="core.php" method="post">
                <div class="form-row">
                    <div class="col">
                        <div class="form-control">
                            <h3> Intervalo de particionamento </h3>
                            <input type="radio"  name="ss"  value="meio" >
                            <label for="meio">500.000</label><br>
                            <input type="radio"  name="ss"  value="milhao" checked="checked"  >
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
            </form>

            <?php
        }


        ?>



    </body>

</html>


