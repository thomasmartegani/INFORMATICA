<?php

function form_login()
{
	?>
	<font color=#FF0000>
    <h1>BENVENUTI NEL FORM DI LOGIN</h1>
    </font>
    <h4>Inserire i dati richiesti:</h4>
	<form name="formLogin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
	Username: <input type="text" name="username"> <br> <br>
	Password: <input type="password" name="password"> </br> </br> 
	<input type="submit"  name="invio" value="invio"> <br> <br>
	<input type="reset"   value="cancella"> </br>
	</form>
    <p>Non sei registrato? <a href="registrazione.php"> Crea un account!</a>.</p>
	<p>Password dimenticata? <a href="reset.php"> Cambia Password!</a>.</p></br>
	<?php
}

function login()
{	
	//variabili login
	$username=$_POST['username'];
	$pasword=$_POST['password'];
	
	//query per database
	$pdo = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);	
	
	//interogazione database
	$interr = "SELECT * FROM utente WHERE username = '$username' AND pasword = '$pasword'";
	//risultato interrogazione
	$ris = $pdo->query($interr);
	
	if($ris->rowCount()>0){
		$_SESSION['login']=true;
		echo "<a href='riservata.php'>pagina riservata!</a>";
	}
	else
	{
		$_SESSION['login']=false;
		echo "<a href='index.php'>Credenziali sbagliate!";
	}
}
