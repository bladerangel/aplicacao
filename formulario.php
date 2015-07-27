<?

	function preencher($campo)
	{
		if(isset($_POST[$campo]))
			if($campo != "sexo")
				echo "value='" .$_POST[$campo]."'";
			else
				{
					if($_POST[$campo] != null)
						echo "checked";
					// else
					// 	echo "checked";
				}
	}
?>





<html>

	<head>

		<title>Formulario</title>

	</head>

	<body>

		<form action="formulario.php" method="POST">

			Nome:<br><input type="text" name="nome" <? preencher("nome"); ?>>
			<br>
			Idade:<br><input type="text" name="idade" <? preencher("idade"); ?>>
			<br>
			Sexo:<br>
			<input type="radio" name="sexo" value="masculino" <? preencher("sexo"); ?>>Masculino
			<br>
			<input type="radio" name="sexo" value="feminino" <? preencher("sexo"); ?>>Feminino
			<br><br>
			<input type="submit" value="Submit">

		</form>

	</body>

</html>
