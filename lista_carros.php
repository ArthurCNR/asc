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
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <p>Bem vindo</p>
    <div class="menu">
    <a>Home</a>
    <a href="cadastrar_carro.php">Cadastrar Carro</a>
    </div>
    <br><br>
    <div class="listacarros">
        <table class="table">
        <caption>Lista de Carros</caption>
        <thead>
            <tr>
                <th>Carro</th>
                <th>Marca</th>
                <th>Versao</th>
                <th>Ano Fabricaçao</th>
                <th>Ano Exercicio</th>
                <th>Placa</th>
            </tr>
        </thead>
        <tbody>
            
            <?php

            //Receber o número da página
            $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

            //Setar a quantidade de itens por pagina
            $qnt_result_pg = 20;

            //calcular o inicio visualização
            include 'php/conexao.php';
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
            $select = "SELECT c.id, c.marca, c.modelo, c.versao, c.anofab, c.anomod, c.placa from carros c
            LIMIT $inicio, $qnt_result_pg";
            $result = mysqli_query($conectar, $select);
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>" . $row['marca'] . "</td>";
                echo "<td>" . $row['modelo'] . "</td>";
                echo "<td>" . $row['versao'] . "</td>";
                echo "<td>" . $row['anofab'] . "</td>";
                echo "<td>" . $row['anomod'] . "</td>";
                echo "<td>" . $row['placa'] . "</td>";
                echo "<td> <i class='fa-solid fa-check'></i> </td>";
                echo "<td> <i class='fa-solid fa-minus'></i> </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
     </div>
</form>
</div>
</body>
</html>