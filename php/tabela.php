<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Tabelas</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<!--    <link rel="stylesheet" href="../css/style.css">-->

</head>
<body>
<form action="coluna.php" method="post">

<?php

$host =$_POST["host"];
$user = $_POST["user"];
$porta = $_POST["porta"];
$senha = $_POST["senha"];
$banco= $_POST["banco"];

$conn_string = "host=".$host." port=".$porta." dbname=".$banco." user=".$user." password=".$senha;

$CONEXAO = pg_connect($conn_string);


//var_dump($conn_string);
//exit();
if ($CONEXAO == false){
    var_dump($conn_string);
    echo "deu ruim";
}else{

    $sql = "SELECT tablename FROM PG_TABLES WHERE schemaname = 'acct'";

    $resultado = pg_query($CONEXAO, $sql);

    $table =pg_fetch_all($resultado);

    echo '<input type="checkbox" hidden name="conn"  value="'.$conn_string.'" checked></link><br>' ;

    foreach ($table as $key){
        foreach ($key as $k){

            echo '<button type="submit"  name="table" value="'.$k.'" class="btn btn-primary btn-block " >'.$k.'</button><br>';
        }
    }

}
?>

</form>
</body>

</html>
