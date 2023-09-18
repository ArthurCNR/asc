<?php
session_start();
	
$chave = $_POST["chave"];
	
//adiciona barras para evitar SQL injection
$chaveSegura = addslashes($chave);
	
//testa para saber se os campos estão vazios
if (empty($chave)):
    header("location: ../index");
    exit;    
endif;
	
//inclui a conexao	
include 'conexao.php';
		 
//iniciando a conexão com o banco de dados
$sql = mysqli_query($conectar, "SELECT * FROM clientes WHERE chave='$chaveSegura'") or die( mysqli_error($conectar));
if ($aux = mysqli_fetch_assoc($sql)){//verifica se tem algo no banco de dados
//pecorrendo os registros da consulta.
			echo '<center><button type="button" class="btn btn-success chavea" style="margin-top: 30px;margin-left: 70px;"><i class="fas fa-check"></i>&nbsp;&nbsp;Usuário logado com sucesso!... </button> </center>';
            echo ' <script>function redirect(){
				   $(".chavea").html("<i class=\"fa fa-circle-o-notch fa-spin fa-1x fa-fw\"></i> Usuário logado com sucesso!... ");
				   setTimeout(function(){ window.location="/logon.php?chave='.$aux["chave"].'"}, 2000);
				
			} setTimeout(function(){ redirect() }, 3000);</script>'; 
			echo '<div class="sa-icon sa-success animate" style="margin-left:350px;margin-top: -65px;">
    <span class="sa-line sa-tip animateSuccessTip"></span>
    <span class="sa-line sa-long animateSuccessLong"></span>
    <div class="sa-placeholder"></div>
    <div class="sa-fix"></div>
  </div>';
}else{// se não existir nada no banco ele mostra essa mensagem

	echo '<center><button type="button" class="btn btn-danger chavea" style="margin-top: 30px;margin-left: 70px;">Falha! não foi possivel localizar sua chave ou ela está pendente</button> </center>';
	echo '<div class="sa-icon sa-failed animate" style="margin-left:250px;margin-top: -65px;">
    <span class="sa-line sa-tip animateFailedTip"></span>
    <span class="sa-line sa-long animateFailedLong"></span>
    <div class="sa-placeholder"></div>
    <div class="sa-fix"></div>
  </div>';

}
?>