<?php

// Connessione al database
$servername = "loc
-alhost";
$username = "username";
$password = "password";
$dbname = "nome_database";

// Creazione della connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica della connessione
if ($conn->connect_error) {
	
    die("Connessione fallita: " . $conn->connect_error);
}

// Selezione dei dati dalla tabella "utenti"
$sql = "SELECT id, nome, email FROM utenti";
$result = $conn->query($sql);

// Stampa dei risultati
if ($result->num_rows > 0) {
    // Output dei dati di ogni riga
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Nome: " . $row["nome"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 risultati";
}

// Aggiornamento dei dati nella tabella "utenti"
$sql = "UPDATE utenti SET email='nuovo_email@esempio.com' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Record aggiornato con successo";
} else {
    echo "Errore nell'aggiornamento del record: " . $conn->error;
}

// Chiusura della connessione
$conn->close();

?>
