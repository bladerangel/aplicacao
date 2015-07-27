<?
	if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true)
		$pass = md5($_POST["pass"]);

	
?>