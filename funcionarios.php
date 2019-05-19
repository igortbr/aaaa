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

//switch($_POST['form_operacao']){}

$ComandoSQL = "SELECT nome_usuario, SUM(pontos) as pontuacao, cargo, login, foto FROM `tb_usuarios_eventos`
							INNER JOIN tb_usuarios ON tb_usuarios.login=tb_usuarios_eventos.login_usuario
							INNER JOIN tb_eventos ON tb_eventos.id_evento=tb_usuarios_eventos.id_evento
							WHERE tb_usuarios.login='$login'
							GROUP BY login_usuario ORDER BY pontuacao DESC";
							
//$ComandoSQL = "SELECT * FROM tb_usuarios WHERE login = '".$login."'";
$result = $conn->query($ComandoSQL);

	/*SELECT * FROM `tb_usuarios_eventos` 
	INNER JOIN tb_usuarios ON tb_usuarios.login=tb_usuarios_eventos.login_usuario
	INNER JOIN tb_eventos ON tb_eventos.id_evento=tb_usuarios_eventos.id_evento*/
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
 </head>
 <body>
	<div id="menu">
		<a href="ranking.php">Raking</a>
		<a>Não sei</a>
	</div>
	<div id="perfil">
		<p id="nome">Nome: <?php echo $row->nome_usuario; ?></p>
		<img src="<?php echo $row->foto; ?>">
		<p id="pontuacao">Pontuação: <?php echo $row->pontuacao ?></p>
		<p id="cargo">Cargo: <?php echo $row->cargo; ?></p>		
		<p id="classificacao">Classificação: <?php echo $_GET['classificacao']; ?></p>	
		<p id="eventos">Eventos comparecidos:</p> 
		<ul>
			<?php 
				$ComandoSQL = "SELECT nome_evento, pontos  FROM `tb_eventos`  
							INNER JOIN tb_usuarios_eventos ON tb_eventos.id_evento=tb_usuarios_eventos.id_evento
							WHERE tb_usuarios_eventos.login_usuario='$login'";
				$result = $conn->query($ComandoSQL);
				while($row = $result->fetch(PDO::FETCH_OBJ)){
					echo "<li>";
					echo $row->nome_evento." ----- ".$row->pontos. " pontos";
					echo "</li>";
				}
			?>
		</ul>
		
	</div>
</body>
</html>