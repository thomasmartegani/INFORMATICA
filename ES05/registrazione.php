<html>
<head>
<title>Registrazione</title>
</head>
<body>
<?php
session_start();
require 'funzioni.php';
//definizioni del database
define('DB_SERVER', 'localhost');
define('DB_NAME', 'es05');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

if(!isset($_SESSION['login']))
{
	if(!isset($_POST['invio']))
	{		  
        //visualizzoform di registrazione
		form_registrazione();
	}
	else 
    {
		//registrazione
		registrazione();
	}
}
else
{
	echo "utente già registrato<br>";
	echo "<a href='registrazione.php'></a><br>";
}
?>
</body>
</html>
