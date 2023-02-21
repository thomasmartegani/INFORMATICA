<html>
<head>
<title>LOGIN</title>
</head>
<body>
<?php
session_start();
require 'function.php';
if(!isset($_POST["invio"]))
{
    ?>
    <h1>Pagina di login</h1>
    <br> <br>
    <form name="formLogin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
	Username: <input type="text" name="username"> <br> <br>
	Password: <input type="password" name="password"> </br> </br> 
	<input type="submit"  name="invio" value="invio"> <br> <br>
	<input type="reset"   value="cancella"> </br>
	</form>
	<?php
}
else
{
    $username = $_POST['username'];
    $password = $_POST['password'];
	if (empty($username) || empty($password)) 
	{
        $msg = 'Inserisci username e password %s';
    } 
	else 
	{
        $query = "
            SELECT username, password
            FROM utente
            WHERE username = :username
        ";
	    $check = $pdo->prepare($query);
        $check->bindParam(':username', $username, PDO::PARAM_STR);
        $check->execute();
        $user = $check->fetch(PDO::FETCH_ASSOC);
		$pass = $check->fetch(PDO::FETCH_ASSOC);
		if (!$user || $pass === false) 
		{
            $msg = 'Credenziali utente errate %s';
        } 
		else 
		{
            $_SESSION['username'] = $user['username'];
            $_SESSION['password'] = $pass['password'];
		}
    }
}
?>
</body>
</html>
