<?

$erro = null;
$valido = false;

if(isset($_REQUEST["validar"]) && $_REQUEST["validar"]==true){
	if(strlen($_POST["nome"])<5)
		$erro = "Preencha o nome corretamente!";
	else if(strlen($_POST["email"])<5)
		$erro = "Preencha o email corretamente!";
	else if(!is_numeric($_POST["idade"]))
		$erro = "Preencha o idade corretamente!";
	else if($_POST["estadoCivil"] == "Selecione")
		$erro = "Preencha o idade corretamente!";
	else if(strlen($_POST["senha"])<5)
		$erro = "Preencha a senha corretamente!";
	else{
		$valido = true;

		$checkHumanas = isset($_POST["humanas"]) ? 1 : 0;
		$checkExatas = isset($_POST["exatas"]) ? 1 : 0;

		$passwordHash = md5($_POST["senha"]);

		try{
		$connection = new PDO("mysql:host=localhost;dbname=test","root","");

		}catch(PDOExeption $erro){
			echo "Erro bando de dados!". $erro->getMessage();
			exit();
		}
		
		$stmt = $connection->prepare("insert into usuarios (nome,email,idade,sexo,estadoCivil,humanas,exatas,senha) values(?,?,?,?,?,?,?,?)");
		$stmt->bindParam(1, $_POST["nome"]);
		$stmt->bindParam(2, $_POST["email"]);
		$stmt->bindParam(3, $_POST["idade"]);
		$stmt->bindParam(4, $_POST["sexo"]);
		$stmt->bindParam(5, $_POST["estadoCivil"]);
		$stmt->bindParam(6, $checkHumanas);
		$stmt->bindParam(7, $checkExatas);
		$stmt->bindParam(8, $passwordHash);

		$stmt->execute();
		if($stmt->errorCode() != "00000"){
			$valido=false;
			$erro = "Erro codigo : ". $stmt->errorCode() . " ";
			$erro .= implode(", ",$stmt->errorInfo());
		}
	} 
}
?>
<HTML>
<HEAD>
<title>Cadastro de Dados</title>
</HEAD>
<BODY>

<?
if(!$valido){
	if(isset($erro))
		echo $erro . "<BR><BR>";
	
?>
	<script language="JavaScript">
	function validaForm(){
		if(document.forms["cadastro"].nome.value == ""){
			alert('Preencha o campo nome!');
			return;
		}
		else if(document.forms["cadastro"].email.value == ""){
				alert("Preencha o campo email!");
				return;
		}
		else if(document.forms["cadastro"].idade.value == ""){
				alert("Preencha o campo idade!");
				return;
		}
		else if(document.forms["cadastro"].estadoCivil.selectedIndex == 0){
				alert("Preencha o campo estado civil!");
				return;	
		}	
		else if(document.forms["cadastro"].senha.value == ""){
				alert("Preencha o campo senha!");
				return;	
	    }
		else
			document.forms["cadastro"].submit();				
	}
	</script>
	<FORM method=post name="cadastro" action="?validar=true" onsubmit="validaForm(); return false;">

		Nome: <input type=text name=nome 
		<? 
		if(isset($_POST["nome"]))
			echo "value='".$_POST["nome"]."'";
		?>
		><BR> <BR> 
		Email: <input type=text name=email
		<? 
		if(isset($_POST["email"]))
			echo "value='".$_POST["email"]."'";
		?>
		><BR> <BR> 
		Idade: <input type=text name=idade
		<? 
		if(isset($_POST["idade"]))
			echo "value='".$_POST["idade"]."'";
		?>
		><BR> <BR>
		Sexo: <input type=radio name=sexo value="M" 
		<? 
		if((isset($_POST["sexo"]) && $_POST["sexo"]=="M") || !isset($_POST["sexo"]))
			echo "checked";
		?>
		>Masculino
			  <input type=radio name=sexo value="F"
		<? 
		if(isset($_POST["sexo"]) && $_POST["sexo"]=="F")
			echo "checked";
		?>
		>Feminino<BR> <BR>
		Interesses: 
			<input type=checkbox name="humanas"
			<? 
			if(isset($_POST["humanas"]))
				echo "checked";
			?>
			> Ciências Humanas	
			<input type=checkbox name="exatas"
			<? 
			if(isset($_POST["exatas"]))
				echo "checked";
			?>
			> Ciências Exatas<BR> <BR>
		Estado Civil: 
		<select name=estadoCivil>
			<option>Selecione</option>
			<option 
			<? 
			if(isset($_POST["estadoCivil"])&& $_POST["estadoCivil"] == "Solteiro")
				echo "selected";
			?>
			>Solteiro</option>
			<option 
			<? 
			if(isset($_POST["estadoCivil"])&& $_POST["estadoCivil"] == "Casado")
				echo "selected";
			?>
			>Casado</option>
		</select><BR> <BR>	
		Senha: <input type=password name=senha><BR><BR> 
		<input type=submit value="Enviar">
</FORM>
<?
}
else 
	echo "Dados cadastrados com sucesso!";

 ?>
</BODY>
<HTML>