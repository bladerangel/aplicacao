<HTML>
<HEAD>
<title>Lista de dados </title>
</HEAD>
<BODY>

<table border =1>
<tr>
	<td>Nome</td>
	<td>Email</td>
	<td>Idade</td>
	<td>Sexo</td>
	<td>Estado Civil</td>
	<td>Humanas</td>
	<td>Exatas</td>
	<td>Hash Senha</td>
	<td>Acoes</td>
</tr>
<?
	
	try{

		$connection = new PDO("mysql:host=localhost;dbname=test","root","");

	}catch(PDOException $erro ){
		echo "Erro bando de dados!". $erro->getMessage();
		exit();
	}

	if(isset($_REQUEST["excluir"]) && isset($_REQUEST["excluir"]) == true){
		$stmt = $connection->prepare("delete from usuarios where id = ?");
		$stmt->bindParam(1, $_REQUEST["id"]);
		$stmt->execute();
		if($stmt->errorCode() != "00000"){
			echo "Erro codigo : ". $stmt->errorCode() . " ";
			echo implode(", ",$stmt->errorInfo());
		}else echo "usuario removido com sucesso!";

	}


	$rs = $connection->prepare("select * from usuarios");
	if($rs->execute()){
		while($registro = $rs->fetch(PDO::FETCH_OBJ)){
			echo "<TR>";
			echo "<TD>".$registro->nome . "</TD>";
			echo "<TD>".$registro->email . "</TD>";
			echo "<TD>".$registro->idade . "</TD>";
			echo "<TD>".$registro->sexo . "</TD>";
			echo "<TD>".$registro->estadoCivil . "</TD>";
			echo "<TD>".$registro->humanas . "</TD>";
			echo "<TD>".$registro->exatas . "</TD>";
			echo "<TD>".$registro->senha . "</TD>";
			echo "<TD> <a href='?excluir=true&id=".$registro->id."'>X</a> </TD>";

			echo "</TR>";

		}
	}
	else echo "Falha na listagem dos usuarios!";

?>

</table>


</body>
</html>