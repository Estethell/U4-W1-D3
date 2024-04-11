













<?php

// connessione al database
$host = "localhost";
$db = "lista_utenti";
$user = "root";
$pass = "";


$dsn = "mysql:host=$host;dbname=$db";

$options = [

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,

];


// comando che connette al databse
$pdo = new PDO($dsn, $user, $pass, $options);

echo "tutto apposto";


// preparazione ed esecuzione della query
// USIAMO SELECT PER SELEZIONARE TUTTE LE RIGHE
$stmt = $pdo->query('SELECT * FROM utenti');

// PRODUCIAMO L'HTML

// LO POSSIAMO FARE O CON UN CICLO WHILE:
/* echo "<ul>";

while ($row = $stmt->fetch())
{
    echo "<li>$row[Name]</li>";
}

echo "</ul>";
 */


// O CON UN CICLO FOREACH
echo "<ul>";

foreach ($stmt as $row)
{
    echo "<li>$row[Name]</li>";
}

echo "</ul>";


// VEDIAMO COME SELEZIONARE UNA RIGA SPECIFICA
// query non controlla nulla, usare se non ci sono valori presi dall'utente
// execute invece controlla i dati dopo averli preparati


$id = $_GET["Id"];


$stmt = $pdo->prepare('SELECT * FROM utenti WHERE id = ?');
$stmt->execute([$id]);
$row = $stmt->fetch(2);
echo "<h2>$row[Name]</h2>";


// CON INSERT

$stmt = $pdo -> prepare("INSERT INTO user (Name, Surname, Age) VALUES (:name, :surname, :age)");

$stmt->execute([
    
]);

// DELETE
$stmt = $pdo->prepare("DELETE FROM Dishes WHERE id = ?");
$stmt->execute([$id]);


// UPDATE
$stmt = $pdo->prepare("UPDATE Dishes SET Name = :name  WHERE id = :id");
$stmt->execute([
    'id' => 16,
    'name' => 'Pizza editata'
]);

