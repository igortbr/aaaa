<?php
header("Content-Type: text/html; charset=ISO-8859-1",true) ;
error_reporting(E_ERROR | E_WARNING | E_PARSE);

$nome = "";
$login = "";
$id = "";
$cargo = "";
$pontuacao = "";
$ComandoSQL = "";

require_once 'conexao/conexao.php';
$login = $_GET['login'];

switch($_POST['form_operacao']){
	case "alteracao":
		try{
			$nome_usuario = $_POST['nome_usuario'];
			$login = $_POST['login'];
			$senha = $_POST['senha'];
			$cargo = $_POST['cargo'];
			
			$stmt = $conn->prepare('UPDATE tb_usuarios SET nome_usuario=:nome_usuario, login=:login, senha:=senha, cargo=:cargo WHERE login:=login');
			$stmt->bindValue(':nome_usuario',$nome_usuario);
			$stmt->bindValue(':login',$login);
			$stmt->bindValue(':senha',$senha);
			$stmt->bindValue(':cargo',$cargo);
			$stmt->execute();
		}catch(PDOException $e){
			print "ERRO!: ". $e->getMessage(). "<br>";
			die();
		}
		break;
	
	case "exclusao":
		try{
			$login = $_POST['login'];
			$stmt = $conn->prepare('DELETE FROM tb_usuarios WHERE login =:login');
			$stmt->bindValue(':login',$login);
			$stmt->execute();
		}catch(PDOException $e){
			print "ERRO!: ". $e->getMessage(). "<br>";
			die();
		}
		break;
}

$ComandoSQL = "SELECT * FROM tb_usuarios WHERE login = '".$login."'";
$result = $conn->query($ComandoSQL);
if(!$result){
	echo "<script>
			alert('Algo de errado não está certo!');
			window.location='raking.php';
		</script>";
	exit;
}
$row = $result->fetch(PDO::FETCH_OBJ);
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>No Bugs</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <script LANGUAGE="JavaScript">
  function define_operacao(operacao){
    if (operacao == "alt") {
       document.form_alteracao.form_operacao.value = "alteracao";
    }
    if (operacao == "exc") {
       document.form_alteracao.form_operacao.value = "exclusao";
    }
    document.form_alteracao.submit();
  }
  </script>
 </head>
 <body>
	<div id="menu">
		<a href="ranking_adm.php">Raking</a>
		<a>Não sei</a>
	</div>
	<div id="perfil">
		<form method="POST" action="funcionarios_adm.php" name="form_alteracao">
			<p>Nome: <input type="text" name="nome_usuario" id="nome_usuario" value="<?php echo $row->nome_usuario; ?>" size="80" required="required">*</p>
			<p>Cargo: <input type="text" name="cargo" id="cargo" value="<?php echo $row->cargo ?>" required="required">*</p>
			<p>Login: <input type="text" name="login" value="<?php echo $row->login ?>" id="login">*</p>
			<p>Senha: <input type="text" name="senha" value="<?php echo $row->senha ?>" id="senha">*</p>
			<p>Pontuação: 
			<?php $data = date('Y');
			$result = $conn->query("SELECT SUM(pontos) as pontuacao FROM tb_usuarios_eventos INNER JOIN tb_usuarios ON tb_usuarios.login='$login' INNER JOIN tb_eventos ON tb_eventos.id_evento=tb_usuarios_eventos.id_evento WHERE YEAR(data_evento)=$data");
			$row = $result->fetch(PDO::FETCH_OBJ);
			echo $row->pontuacao;?> pontos</p>
			<input type="hidden" name="form_operacao" value="consulta">
			<input type="submit" name="Button" value="Alterar" onClick="define_operacao('alt')">
			<input type="submit" name="Button" value="Excluir" onClick="define_operacao('exc')">
		</form>
	</div>
</body>
</html>