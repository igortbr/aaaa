<?php
try{
	require_once 'conexao/conexao.php';
	
	$result = $conn->query("SELECT * FROM tb_usuarios");
	if($result){
		while($row = $result->fetch(PDO::FETCH_OBJ)){
			echo "<input type='checkbox' value='".$row->login."' name='participantes[]' id='participantes'>".$row->nome_usuario;
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