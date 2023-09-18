<?php

session_start();
$sqluser = "asc";
$sqlpassword = "123mudar";
$sqldatabase = "asc";

$post = $_SERVER['REQUEST_METHOD']=='POST';

if ($post) {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=".$sqldatabase,$sqluser,$sqlpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        exit($e->getMessage());
    }
    $stmt = 'INSERT INTO carros(marca,modelo,versao,anofab,anomod,placa) VALUES (?,?,?,?,?,?)';
    $pdo->prepare($stmt)->execute(array(
        $_POST['marca'],
        $_POST['modelo'],
        $_POST['versao'],
        $_POST['anofab'],
        $_POST['anomod'],
        $_POST['placa']
        ));
    header("Location:lista_carros.php");
    exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista de Veiculos</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="css/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="css/fontawesome/css/brands.css" rel="stylesheet">
    <link href="css/fontawesome/css/solid.css" rel="stylesheet">
</head> 
<body>
<div class="background">
    <p>Bem vindo</p>
    <div class="menu">
    <a>Home</a>
    <a href="lista_carros.php">Listar Carror</a>
    </div>
    <br><br>
    <div class="listacarros">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" id="marca" name="marca" placeholder="Marca"><br>
        <input type="text" id="modelo" name="modelo" placeholder="Modelo"><br>
        <input type="text" id="versao" name="versao" placeholder="Versão"><br>
        <input type="text" id="anofab" name="anofab" placeholder="Ano Fabricação"><br>
        <input type="text" id="anomod" name="anomod" placeholder="Ano Exercicio"><br>
        <input type="text" id="placa" name="placa" placeholder="Placa"><br><br>
        <input type="submit" id="submit" value="Registrar">
    </form>
     </div>
</div>
</body>
</html>