<?php
session_start();
	
$chave = $_POST["chave"];
	
//adiciona barras para evitar SQL injection
$chaveSegura = addslashes($chave);
	
//testa para saber se os campos estão vazios
if (empty($chave)):
    header("location: index");
    exit;    
endif;
	
//inclui a conexao	
include 'conexao.php';
	
//consulta ao banco de dados
$dados = mysqli_query($conectar, "SELECT * FROM clientes WHERE chave='$chaveSegura'") or die( mysqli_error($conectar));

//armazena na variável o número de linhas encontradas
$num = mysqli_num_rows($dados);
	
//se zero, é porque ele errou a senha ou o login
if ($num == 0):
	echo '<div class="danger2"><div class="alert alert-danger" style="padding:5px;overflow: visible;width: 400px;margin:auto;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-times"></i><strong>  Falha!</strong> Não foi possivel localizar sua chave!&nbsp;&nbsp;</div></div>';
	exit;
else :
    
    //armazena a função fetch_object onde é tratado como objeto
	$linha = mysqli_fetch_object($dados);

    //armazena na variável o número ID do usuário
	$id = $linha->id;
	$codigo = $linha->codigo;
    $nome = $linha->nome;
    $usuario = $linha->usuario;	
	$chave = $linha->chave;
		
    //armazena na sessão o nome do login.
	$_SESSION["id"] = $id;
    //armazena na sessão o nome do login.
    $_SESSION["codigo"] = $codigo;
	//armazena na sessão o nome do login.
	$_SESSION["nome"] = $nome;
	//armazena na sessão o nome do login.
	$_SESSION["usuario"] = $usuario;
	//armazena na sessão o nome do login.
	$_SESSION["chave"] = $chave;
		
	//manda o usuário para a páginas depois de logado	
	echo '
	<style>
.info, .success, .warning, .error, .danger, .validation {
  -webkit-animation: seconds 1.0s forwards;
  -webkit-animation-iteration-count: 1;
  -webkit-animation-delay: 7s;
  animation: seconds 1.0s forwards;
  animation-iteration-count: 1;
  animation-delay: 5s;
  position: relative;
    
}
@-webkit-keyframes seconds {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    left: -9999px; 
    position: absolute;   
  }
}
@keyframes seconds {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    left: -9999px;
    position: absolute;     
  }
}
</style>
<div class="success"><div class="alert alert-success chavea" style="padding:5px;overflow: visible;width: 400px;margin:auto;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check"></i><strong>  Sucesso!</strong> Entrando no painel! Aguarde...&nbsp;&nbsp;</div></div>
	';
	echo '<script>function redirect(){
				   $(".chavea").html("<i class=\"fa fa-circle-o-notch fa-spin fa-1x fa-fw\"></i><strong>  Sucesso!</strong> Entrando no painel! Aguarde...&nbsp;&nbsp;");
				   setTimeout(function(){ window.location="painel/inicio"}, 2000);
				
			} setTimeout(function(){ redirect() }, 3000);</script>';
	$_SESSION['pNotify'] = "
	<div class='info'><div class='alert alert-info' style='padding:5px;overflow: visible;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Olá!</strong> $nome, Bem Vindo! Esse é sua Area do Cliente, aqui você pode acessar seus produtos com mais facilidade!&nbsp;&nbsp;</div></div>
    ";
			
endif;
?>