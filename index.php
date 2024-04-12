<a href="http://localhost/FSD%20IFOA/U1-S1-L3/?id=1">Pizza 1</a>













<?php

// connessione al database
$host = "localhost";
$db = "ifoa_exercises_01";
$user = "root";
$pass = "";


$dsn = "mysql:host=$host;dbname=$db";

$options = [

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,

];



$pdo = new PDO($dsn, $user, $pass, $options);

echo "tutto apposto";


$stmt = $pdo->query('SELECT * FROM Dishes');


echo "<ul>";

foreach ($stmt as $row)
{
    echo "<li>$row[Name]</li>";
}

echo "</ul>";





$id = $_GET["id"]; 


$stmt = $pdo->prepare('SELECT * FROM Dishes WHERE id = ?');
$stmt->execute([$id]);
$row = $stmt->fetch(2);
echo "<h2>$row[Name]</h2>";



$stmt = $pdo -> prepare("INSERT INTO Dishes (Name, Price) VALUES (:name, :price)");

$stmt->execute([
    "name" => "Pizza Parmigiana",
    "price" => "1000",
]);


$stmt = $pdo->prepare("DELETE FROM Dishes WHERE id = ?");
$stmt->execute([$id]);



$stmt = $pdo->prepare("UPDATE Dishes SET Name = :name  WHERE id = :id");
$stmt->execute([
    'id' => 16,
    'name' => 'Pizza editata'
]);

