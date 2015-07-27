<?

$erro = null;
$valido = false;

if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true) {

	// Atenção para o uso de caixa alta e caixa baixa nos nomes das variáveis

	if(strlen($_POST["nome"]) < 5) {
		$erro = "Preencha o campo nome corretamente";
	}
	else if(strlen($_POST["email"]) < 5) {
		$erro = "Preencha o campo email corretamente";
	}
	else if(!is_numeric($_POST["idade"])) {
		$erro = "Preencha o campo idade corretamente";
	}
	else if($_POST["sexo"] != "M" && $_POST["sexo"] != "F") {
		$erro = "Preencha o campo sexo corretamente";
	}
	else if($_POST["estadoCivil"] != "Solteiro(a)" && 
		$_POST["estadoCivil"] != "Casado(a)" && 
		$_POST["estadoCivil"] != "Divorciado(a)" && 
		$_POST["estadoCivil"] != "Viúvo(a)") {
		$erro = "Preencha o campo estado civil corretamente";
	}
	else {
		$valido = true;
	}
}

?>

<HTML>
  <HEAD>
    <TITLE>Curso de PHP - Módulo de Banco de Dados</TITLE>
  </HEAD>
  <BODY>

<?

if(!$valido) {
	if(isset($erro)) {
		echo $erro . "<BR><BR>";
	}

?>

<SCRIPT language='JavaScript'>

function validaFormulario() {

	if(document.forms['registro'].nome.value == "") {
		alert('Preencha corretamente o campo nome.');
		return;
	}
	else if(document.forms['registro'].email.value == "") {
		alert('Preencha corretamente o campo email.');
		return;
	}
	else if(document.forms['registro'].idade.value == "" || 
		isNaN(document.forms['registro'].idade.value)) {
		alert('Preencha corretamente o campo idade.');
		return;
	}
	else if(document.forms['registro'].estadoCivil.selectedIndex == 0) {
		alert('Preencha corretamente o campo estado civil.');
		return;
	}	
	else if(document.forms['registro'].senha.value == "") {
		alert('Preencha corretamente o campo senha.');
		return;
	}
	else
		document.forms['registro'].submit();
}

</SCRIPT>

<FORM method=POST name='registro' onSubmit='validaFormulario(); return false;' 
      action='?validar=true'>

Nome: 	
  <INPUT type=TEXT name=nome
	<? if(isset($_POST["nome"])) { echo "value='".$_POST["nome"]."'"; } ?>
	><BR>

E-mail:	
  <INPUT type=TEXT name=email
	<? if(isset($_POST["email"])) { echo "value='".$_POST["email"]."'"; } ?>
	><BR>

Idade: 	
  <INPUT type=TEXT name=idade
	<? if(isset($_POST["idade"])) { echo "value='".$_POST["idade"]."'"; } ?>
	><BR>

Sexo: 	
  <INPUT type=RADIO name=sexo value='M'
	<? if(isset($_POST["sexo"]) && $_POST["sexo"] == "M") { echo "checked"; } ?>
	>Masculino

	<INPUT type=RADIO name=sexo value='F'
	<? if(isset($_POST["sexo"]) && $_POST["sexo"] == "F") { echo "checked"; } ?>
	>Feminino<BR>

Interesses:
	<INPUT type=checkbox name='Humanas'
	<? if(isset($_POST["Humanas"])) { echo "checked"; } ?>
	> Ciências Humanas

	<INPUT type=checkbox name='Exatas'
	<? if(isset($_POST["Exatas"])) { echo "checked"; } ?>
	> Ciências Exatas

	<INPUT type=checkbox name='Biológicas'
	<? if(isset($_POST["Biológicas"])) { echo "checked"; } ?>
	> Ciências Biológicas<BR>

Estado civil: 
	<SELECT name=estadoCivil>
		<OPTION>Selecione</OPTION>

		<OPTION
		<? if(isset($_POST["estadoCivil"]) && $_POST["estadoCivil"] == "Solteiro(a)") 
    		{ echo "selected"; } ?>
		>Solteiro(a)</OPTION>

		<OPTION 
		<? if(isset($_POST["estadoCivil"]) && $_POST["estadoCivil"] == "Casado(a)") 
    		{ echo "selected"; } ?>
		>Casado(a)</OPTION>

		<OPTION 
		<? if(isset($_POST["estadoCivil"]) && $_POST["estadoCivil"] == "Divorciado(a)") 
    		{ echo "selected"; } ?>
		>Divorciado(a)</OPTION>

		<OPTION
		<? if(isset($_POST["estadoCivil"]) && $_POST["estadoCivil"] == "Viúvo(a)") 
   		{ echo "selected"; } ?>
		>Viúvo(a)</OPTION>
	</SELECT>
	<BR>

Senha: 	
  <INPUT type=PASSWORD name=senha><BR>
	<INPUT type=SUBMIT value='Enviar'>

</FORM>

<?

}
else {
  echo "Dados recebidos e validados com sucesso!";
}

?>
  </BODY>
</HTML>
