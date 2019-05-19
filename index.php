<?php
/*if($_POST['form_acesso'] == "acesso"){
	require_once 'conexao/conexao.php';
	
	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
}*/
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>Raking - No Bugs</title>
 </head>
<body>
	<form name="form_acesso" method="POST" action="area_restrita/login.php">
	  <p align="center"><font face="Verdana, Arial, Helvetica, sans-serif">NO BUGS</font></p>
	  <p align="center"><font face="Verdana, Arial, Helvetica, sans-serif">Área Restrita</font></p>
	  <table width="350" border="1" align="center" cellpadding="2" cellspacing="1" bordercolor="#003300">
		<tr>
		  <td width="35%" align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Usuário </font>: 
			<input name="login" type="text" id="login" size="15" maxlength="15" required="required"></td>
		</tr>

		<tr>
		  <td align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Senha:</font><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
		  <input name="senha" type="password"  id="senha" size="15" maxlength="15" required="required">
		  </font><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp; </font><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp; </font></td>
		</tr>
	  </table>
	   <div align="center"><br>
		<input type="hidden" name="form_acesso" value="acesso">
		<input type="submit" name="Button" value="Entrar">
		</div>
	</form>
</body>
</html>