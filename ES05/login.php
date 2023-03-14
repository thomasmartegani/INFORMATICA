<?php
//sessione in php
session_start();
require 'funzioni.php';
//definizione del database
define('DB_SERVER', 'localhost');
define('DB_NAME', 'es05');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

if(!isset($_SESSION['login']))
{
	//login non verificato
	if(!isset($_POST['invio']))
	{
		//visualizzo il form di login
        form_login();
	}
	else
	{
		//connessione al database
		login();
	}
}
else
{
	//login già effettuato
	echo "L'utente ha già effetuato il login <br>";
	echo "<a href='index.php'>Home</a><br>";
	echo "<a href='logout.php'>Esci</a><br>";
}
?>
