<?
	
	class userClassLumine extends Lumine_Base
	{
		private $name;
		private $age;
		private $gender;
		private $login;
		private $pass;

		public function __construct()
    {
     
        
    }


	

    function getName(){
    	return $this->name;
    }

    function setName($name){
    	$this->name = $name;
    }

    function getAge(){
    	return $this->age;
    }

    function setAge($age){
    	$this->age = $age;
    }

    function getGender(){
    	return $this->gender;
    }

    function setGender($gender){
    	$this->gender = $gender;
    }

    function getLogin(){
    	return $this->login;
    }

    function setLogin($login){
    	$this->login = $login;
    }

    function getPass(){
    	return $this->pass;
    }

    function setPass($pass){
    	$this->pass = $pass;
    }
		
	}
?>