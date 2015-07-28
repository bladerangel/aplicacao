<?

	function preencher($campo)
	{
		if(isset($_POST[$campo]))
			if($campo != "gender" && $campo != "pass")
				echo "value='" .$_POST[$campo]."'";
			else if($campo == "gender")
				{
					if($_POST[$campo] == "F")
					{
						echo "checked";
						$_POST[$campo] = null;
					}
					else
						echo "checked";
				}

	}

?>
<!DOCTYPE html>
<html lang="pt-br">

 
	<head>

		<title>Formulario</title>

	</head>

	<body>

		<form name="formulario" action="confirmacao.php?validar=true" method="POST">

			Nome:<br><input type="text" name="name" required="required" pattern="[a-z\s]+$"  minlength="30" maxlength="50"<? preencher("name"); ?>>
			<br>
			Idade:<br><input type="text" name="age"  required="required" pattern="[0-9]+$" minlength="2"<? preencher("age"); ?>>
			<br>
			Sexo:<br>
			<input type="radio" name="gender" value="F" required="required" <? preencher("gender"); ?>>Feminino
			
			<input type="radio" name="gender" value="M" <? preencher("gender"); ?>>Masculino
			<br>
			Login:<br><input type="text" name="login" required="required" minlength="10" maxlength="30"<? preencher("login"); ?>>
			<br>
			Password:<br><input type="password" name="pass" required="required" minlength="10">
			<br>
			<br>
			<input type="submit" value="Cadastrar">
			
		</form>

	</body>

</html>
