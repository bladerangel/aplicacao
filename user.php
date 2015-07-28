<?
	$erro = null;
	$valido = false;

	if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true)
	{
		$pass = md5($_POST["pass"]);

		try
		{
			$connection = new PDO("mysql:host=localhost;dbname=cadastro","root","");
		}
		catch(PDOExeption $erro){
			echo "Erro banco de dados!". $erro->getMessage();
			exit();
		}

		$stmt = $connection->prepare("insert into sign_up (name, age, gender, login, pass) values(?,?,?,?,?)");
		$stmt->bindParam(1, $_POST["name"]);
		$stmt->bindParam(2, $_POST["age"]);
		$stmt->bindParam(3, $_POST["gender"]);
		$stmt->bindParam(4, $_POST["login"]);
		$stmt->bindParam(5, $pass);

		$stmt->execute();
		if($stmt->errorCode() != "00000"){
			$valido = false;
			$erro = "Erro codigo : ". $stmt->errorCode() . " ";
			$erro .= implode(", ",$stmt->errorInfo());
		}
	}
?>