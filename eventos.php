<?php
header("Content-Type: text/html; charset=ISO-8859-1",true) ;
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$nome_evento = "";
$data_evento = "";
$pontos = "";
$participantes = array();
$ComandoSQL = "";

if($_POST['form_operacao'] == "inclusao_evento"){
	require_once 'conexao/conexao.php';
	
	try{
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		$nome_evento = $_POST['nome_evento'];
		$data_evento = $_POST['data_evento'];
		$pontos = $_POST['pontos'];
		$participantes = $_POST['participantes'];
		
		$stmt = $conn->prepare('INSERT INTO tb_eventos VALUES(:id_evento, :nome_evento, :data_evento, :pontos)');
		$stmt->bindValue(':id_evento', null);
		$stmt->bindValue(':nome_evento', $nome_evento);
		$stmt->bindValue(':data_evento', $data_evento);
		$stmt->bindValue(':pontos', $pontos);
		$stmt->execute();
	
	}catch(PDOException $e){
		print "ERRO!: ". $e->getMessage(). "</br>";
		die();
	}
	
	$ComandoSQL = "SELECT * FROM tb_eventos WHERE nome_evento='$nome_evento'";
	$result = $conn->query($ComandoSQL);
	$row = $result->fetch(PDO::FETCH_OBJ);
	foreach($participantes as $key){
		$stmt = $conn->prepare('INSERT INTO tb_usuarios_eventos VALUES(:login_usuario, :id_evento)');
		$stmt->bindValue(':login_usuario', $key);
		$stmt->bindValue('id_evento',$row->id_evento);
		$stmt->execute();
	}
	
	echo "<script>
			alert('Evento cadastrado com sucesso! :)');
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
		<h2>CADASTRO DE EVENTOS</h2>
		<form method="POST" action="eventos.php" name="form_inclusao">
			<p>Nome: <input type="varchar" id="nome_evento" name="nome_evento" size="80" required="required">*</p>
			<p>Data: <input type="date" id="data_evento" name="data_evento" required="required">*</p>
			<p>Pontos: <input type="number" name="pontos" id="pontos">*</p>
			<p>Funcionarios Participantes: </p> 
				<?php require_once 'listafuncionarios.php'; ?>	
			</br>
			<input type="hidden" name="form_operacao" value="inclusao_evento">
			<input type="submit" name="Button" value="Cadastrar Evento">
		</form>	
	</div>
</body>
</html>