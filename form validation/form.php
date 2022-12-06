<html>
<head>
<title>FORM VALIDATION</title>
<style>
.errore {color: #FF0000;}
</style>
</head>
<body>
<?php
if(!isset($_POST["invio"]))
{
	$errNome = $errCog = $errDob = $errEmail = $errCell = "";
	$nome = $cog = $dob = $email = $cell = "";
    ?>
    <font color=#FF0000>
    <h1>BENVENUTI NEL FORM</h1>
	</font>
    <br> <br>
	<h4>Inserire i dati richiesti:</h4>
	<br> <br>
	<p><span class="errore">* campo obbligatorio</span></p>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	Nome: <input type="text" name="nome" value="<?php echo $nome;?>"> 
	<span class="errore">* <?php echo $errNome;?></span>
	<br> <br>
	Cognome: <input type="text" name="cognome" value="<?php echo $cog;?>"> 
	<span class="errore">* <?php echo $errCog;?></span>
	<br> <br> 
	Data di nascita: <input type="date" name="data di nascita" value="<?php echo $dob;?>">
	<span class="errore">* <?php echo $errDob;?></span>
	<br> <br>
	Email: <input type="text" name="email" value="<?php echo $email;?>">
	<span class="errore">* <?php echo $errEmail;?></span>
	<br> <br>
    Cellulare: <input type="tel" name="cellulare" value="<?php echo $cell;?>">
	<span class="errore"> <?php echo $errCell;?></span>
    <br> <br>
	<input type="submit"  name="invio" value="invio"> <br> <br>
	<input type="reset"   value="cancella"> </br>
	</form>
	<?php
}
else
{
	if ($_SERVER["REQUEST_METHOD"]=="POST") 
	{
		if(empty($_POST["nome"]))
		{
			$errNome="Inserisci il nome!";
		}
		else
		{
			$nome=controllo($_POST["nome"]);
			if(!preg_match("/^[a-zA-Z]*$/",$nome))
			{
				$errNome="Solo caratteri alfabetici consentiti!";
			}
		}
		if(empty($_POST["cognome"]))
		{
			$errCog="Inserisci il cognome!";
		}
		else
		{
			$cog=controllo($_POST["cognome"]);
			if(!preg_match("/^[a-zA-Z-' ]*$/",$cog))
			{
				$errCog="Solo caratteri alfabetici consentiti!";
			}
		}
		if(empty($_POST["data di nascita"]))
		{
			$errDob="Inserisci la tua data di nascita!";
		}
		else
		{
			$dob=controllo($_POST["data di nascita"]);
			if(!preg_match("/^([0-9]{2})/([0-9]{2})/([0-9]{4})*$/",$dob))
			{
				$errDob="Data di nascita inserita non valida!";
			}
		}
		if(empty($_POST["email"]))
		{
			$errEmail="Inserisci l'indirizzo e-mail!";
		}
		else
		{
			$email=controllo($_POST["email"]);
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			{
				$errEmail="E-mail non valida!";
			}
		}
		if(empty($_POST["cellulare"]))
		{
			$cell="";
		}
		else
		{
			$cell=controllo($_POST["cellulare"]);
			if(!preg_match("/^[0-9]{10}+$/",$cell))
			{
				$errCell="numero di cellulare non valido!";
			}
		}
		function controllo($info)
        {
	        $info=trim($info);
	        $info=stripslashes($info);
            $info=htmlspecialchars($info);
            return $info;
        }
		echo "<h4>I tuoi dati:</h4>";
        echo $nome;
        echo "<br>";
        echo $cog;
        echo "<br>";
        echo $dob;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $cell;
        echo "<br>";
	}
}
?>
</body>
</html>
