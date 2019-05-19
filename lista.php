<?php
header("Content-Type: text/html; charset=ISO-8859-1",true) ;
error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Raking - No Bugs</title>
 </head>
<body>
	<div id="menu">
		<a href="eventos.php">Cadastrar evento</a>
		<a href="insere_funcionarios.php">Cadastrar funcionário</a>
		<a href="ranking_adm.php">Ranking</a>
		<!--<a href="funcionarios.php">Funcionários</a>-->
		<a>Não sei</a>
	</div>
	<div id="lista">
<?php
try{
	require_once 'conexao/conexao.php';
	
	$result = $conn->query("SELECT * FROM tb_usuarios");
	if($result){
		echo "<table border>";
		echo "<tr>\n";
		echo "<td>\n";
		echo "<b>Nome</b>\n";
		echo "</td>\n";
		echo "<td>\n";
		echo "<b>Cargo</b>\n";
		echo "</td>\n";
		echo "<td>\n";
		echo "<b>Perfil</b>\n";
		echo "</td>\n";
		echo "<td>\n";
		echo "<b>Alteração/Exclusão</b>\n";
		echo "</td>\n";
		echo "</tr>\n";
		
		while($row = $result->fetch(PDO::FETCH_OBJ)){
			echo "<tr>\n";
			echo "<td>\n";
			echo $row->nome_usuario . "&nbsp;\n";
			echo "</td>\n";
			echo "<td>\n";
			echo $row->cargo . "&nbsp;\n";
			echo "</td>\n";
			echo "<td>\n";
			echo "<a href='funcionarios.php?login=".$row->login."&classificacao=".$i."'>";
			echo "<img src='cracha.png' border='0'></a>&nbsp;\n";
			echo "</td>\n";
			echo "<td>\n";
			echo "<a href='funcionarios_adm.php?login=".$row->login."'>";
			echo "<img src='altera.png'><img src='exclui.png'></a>&nbsp;\n";
			echo "</td>\n";
			echo "</tr>\n";
		}
	}else{
		echo "<p>Algo de errado não está certo";
	}
	echo "</table>";
	$conn = null;
}catch(PDOException $e){
	print "ERRO!: ". $e->getMessage(). "<br>";
	die();
}
?>
	</div>
</body>
</html>