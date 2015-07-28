<?

	
	class databaseClass
	{

		private $connection;
		
		
		function __construct()
		{
			$this->connection = new PDO("mysql:host=localhost;dbname=cadastro","root","");
			
		}

		function insert($user){
 		
		$stmt = $this->connection->prepare("insert into sign_up (name, age, gender, login, pass) values(?,?,?,?,?)");
		$name = $user->getName();
		$age = $user->getAge();
		$gender = $user->getGender();
		$login = $user->getLogin();
		$pass = md5($user->getPass());

		$stmt->bindParam(1, $name);
		$stmt->bindParam(2,	$age);
		$stmt->bindParam(3, $gender);
		$stmt->bindParam(4, $login);
		$stmt->bindParam(5, $pass);

		$stmt->execute();
		
		}


	}

?>