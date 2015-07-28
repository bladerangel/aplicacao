<?

	include 'userClass.php';
	include 'databaseClass.php';


	if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true)
	{
		$user = new userClass();
		$user->setName($_POST["name"]);
		$user->setAge($_POST["age"]);
		$user->setGender($_POST["gender"]);
		$user->setLogin($_POST["login"]);
		$user->setPass($_POST["pass"]);
		$database = new databaseClass();
		$database->insert($user);

	}

?>

<html>
 
	<head>

		<title></title>

	</head>

	<body>

		Seus dados foram salvos com sucesso!
			
		</form>

	</body>

</html>
