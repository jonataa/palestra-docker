<?php

$pdo = new PDO('mysql:host=db;dbname=information_schema', 'root', '123456');
$statement = $pdo->query("SELECT * FROM TABLES");
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>' . var_export($rows, true);