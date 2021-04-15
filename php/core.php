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




$grao = $_POST['grao'];
$tabela = $_REQUEST['table'];
$coluna = $_POST['column'];

$sql = "select extract(month from ".$coluna.") mes, extract(year from ".$coluna.") ano
from acct.".$tabela." group by extract(month from ".$coluna." ),extract(year from ".$coluna.");";


//echo $grao.''.$tabela.''.$coluna;
$resultado = pg_query($CONEXAO, $sql);


$row =pg_fetch_all($resultado);

//


if($grao == 'anual'){

    $anos = array();

    foreach ($row as $key){

        $mes =  $key['mes'];
        $ano =  $key['ano'];

        echo $ano.'<br>';


    }
}












    ?>
<!--    <form action="core.php" method="post">-->
<!--        <div class="form-row">-->
<!--            <div class="col">-->
<!--                <div class="form-control" >-->
<!--                    <h3> cu </h3>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <button type="submit" class="btn btn-primary btn-block btn-large">Conectar</button>-->
<!--        </div>-->
<!--    </form>-->
</body>

</html>


