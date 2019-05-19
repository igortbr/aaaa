<?php
header("Content-Type: text/html; charset=ISO-8859-1",true) ;
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$nome_usuario = "";
$login = "";
$senha = "";
$cargo = "";
$pontuacao = "";
$foto = "";
$ComandoSQL = "";

if($_POST['form_operacao'] == "inclusao_funcionario"){
	require_once 'conexao/conexao.php';
	
	try{
		$nome_usuario = $_POST['nome_usuario'];
		$cargo = $_POST['cargo'];
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$pontuacao = $_POST['pontuacao'];
		$foto = $_POST['foto'];
		
		$stmt = $conn->prepare('INSERT INTO tb_usuarios VALUES(:nome_usuario, :login, :senha, :cargo, :foto)');
		$stmt->bindValue(':nome_usuario', $nome_usuario);
		$stmt->bindValue(':login', $login);
		$stmt->bindValue(':senha', $senha);
		$stmt->bindValue(':cargo', $cargo);
		$stmt->bindValue(':foto', $foto);
		$stmt->execute();
		
		$stmt = $conn->prepare('INSERT INTO tb_sessao VALUES(:login, :senha)');
		$stmt->bindValue(':login', $login);
		$stmt->bindValue(':senha', $senha);
	}catch(PDOException $e){
		print "ERRO!: ". $e->getMessage(). "</br>";
		die();
	}
	echo "<script>
			alert('Usuário cadastrado com sucesso! :)');
			window.location='ranking_adm.php';
		</script>";
}

?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Eventos</title>
</head>
<body>
	<div id="menu">
	</div>
	<div>
		<h2>CADASTRO DE FUNCIONÁRIOS</h2>
		<form method="POST" action="insere_funcionarios.php" enctype="" name="form_inclusao">
			<p>Nome: <input type="text" id="nome_usuario" name="nome_usuario" size="80" required="required">*</p>
			<p>Cargo: <input type="text" id="cargo" name="cargo" required="required">*</p>
			<p>Login: <input type="text" name="login" id="login">*</p>
			<p>Senha: <input type="password" name="senha" id="senha">*</p>
			<p>Foto: <input type="file" name="foto" id="foto">*</p>
			<p>Pontuação: <input type="number" name="pontuacao" id="pontuacao" value="0" readonly="readonly"></p>
			<input type="hidden" name="form_operacao" value="inclusao_funcionario">
			<input type="submit" name="Button" value="Cadastrar Funcionário">
		</form>	
	</div>
</body>
</html>