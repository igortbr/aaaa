<?php

$login = $_POST['login'];
$senha = $_POST['senha'];

if($login=='admin' && $senha=='admin'){
	header('Location: ../ranking_adm.php');
}else{
	require_once '../conexao/conexao.php';
	
	$ComandoSQL = "SELECT * FROM tb_usuarios where login='$login' AND senha='$senha'";
	$result = $conn->query($ComandoSQL);
	
	if($result->rowCount()>0){
		header("Location: ../ranking.php?login=$login");
	}else{
		echo "<script>
				alert('Usuário e/ou senha incorreta');
				window.location='../index.php';
			</script>";
	}
}

/*$login = $_POST['login'];
$senha = $_POST['senha'];

if($login=='admin' && senha=='0'){
	header('Location: ../ranking_adm.php');
}else{
	require_once '../conexao/conexao.php';
	
	$ComandoSQL = "SELECT * FROM tb_usuarios WHERE login='$login' AND senha='$senha'";
	$result = $conn->query($ComandoSQL);
	$row = $result->fetch(PDO::FETCH_OBJ);
	
	if($result->rowCount()==0){
		echo "<script>
				alert('Usuário e/ou senha incorreto! :)');
			</script>";
		header('Location: ../index.php');
	}else{
		header('Location: ../ranking.php');
	}
}*/


/*
$login = $_POST['login'];
$senha = $_POST['senha'];

if($login=='admin' && $senha=='0'){
	header('Location: ../ranking_adm.php');
}else{
	require_once '../conexao/conexao.php';

	$ComandoSQL = "SELECT * FROM tb_usuarios WHERE login='$login' AND senha='$senha'";
	$result = $conn->query($ComandoSQL);
	$row = $result->fetch(PDO::FETCH_OBJ);

	if ($result->rowCount()>0) {
		@session_start();
	

		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
		// $_SESSION['nome'] = $row->nome;
		header('Location: ../ranking.php'); 
	}else{
		// inicializa a sessão
		@session_start();
		// limpa a sessão
		$_SESSION = array(); // colocando a session com um array vazio faz com ela
						// fique vazia sem nenhuma variavel nela, liberando o espaço
					 
		// destroy a sessão
		session_destroy();

		// redireciona o link para a página de aviso de erro ao autenticar usuário
		header("Location: falha_login.php");
	}
}*/
?>