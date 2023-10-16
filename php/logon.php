<?php
session_start();
	
$username = $_POST["username"];
$password = $_POST["password"];
	
//testa para saber se os campos estão vazios
if (empty($password)):
    header("location: index");
    exit;    
endif;
	
//inclui a conexao	
include 'conexao.php';

if(empty($_POST["username"]) && empty($_POST["password"]))
{
    echo '<script>alert("Both Fields are required")</script>';
}
else
{
    $username = mysqli_real_escape_string($conectar, $_POST["username"]);
    $password = mysqli_real_escape_string($conectar, $_POST["password"]);
    $passwordMd5 = md5($password);
    $query = "SELECT * FROM adm_usuario WHERE username = '$username' AND password = '$passwordMd5'";
    $result = mysqli_query($conectar, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['username'] = $username;
        echo "<script>window.location = '../painel/inicio';</script>";
        // header("location:../painel/inicio.php");
        die();
    }
    else
    {
        echo '<p>Dados Invalidos</p>';
    }
}

?>