<?php
session_start();
include 'conexao.php';

$username = mysqli_real_escape_string($conectar, $_POST["username"]);
$password = mysqli_real_escape_string($conectar, $_POST["password"]);
$password = md5($password);
$query = "INSERT INTO adm_usuario (username, password) VALUES('$username', '$password')";
if(mysqli_query($conectar, $query))
{
echo '<script>alert("Registration Done")</script>';
}