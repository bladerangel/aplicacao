<html>
<head>
	<title>Formulario</title>
</head>
<body>
<form action="formulario.php" method="POST">
Nome:<br><input type="text" name="nome" <? if(isset($_POST["nome"])) echo "value='" .$_POST["nome"]."'"?>>
<br>
Idade:<br><input type="text" name="idade">
<br>
Sexo:<br>
<input type="radio" name="sexo" value="masculino">Masculino
<br>
<input type="radio" name="sexo" value="feminino">Feminino
<br><br>
<input type="submit" value="Submit">
</form>
</body>
</html>
