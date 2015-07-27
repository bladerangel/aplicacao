<?

	include 'user.php';

	function preencher($campo)
	{
		if(isset($_POST[$campo]))
			if($campo != "sexo" && $campo != "pass")
				echo "value='" .$_POST[$campo]."'";
			else if($campo == "sexo")
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

	// function validar()
	// {

	// }

?>

<html>
 
	<head>

		<title>Formulario</title>

	</head>

	<body>

		<form action="?validar=true" method="POST">

			Nome:<br><input type="text" name="nome" <? preencher("nome"); ?>>
			<br>
			Idade:<br><input type="text" name="idade" <? preencher("idade"); ?>>
			<br>
			Sexo:<br>
			<input type="radio" name="sexo" value="F" <? preencher("sexo"); ?>>Feminino
			
			<input type="radio" name="sexo" value="M" <? preencher("sexo"); ?>>Masculino
			<br>
			Login:<br><input type="text" name="login" <? preencher("login"); ?>>
			<br>
			Password:<br><input type="password" name="pass" >
			<br>
			<br>
			<input type="submit" value="Cadastrar">
			
		</form>

	</body>

</html>
