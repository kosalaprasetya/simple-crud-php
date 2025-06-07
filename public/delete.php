<?php
require_once '../config/database.php';

$id = $_GET["id"];
$sql_query = "DELETE FROM employees WHERE id = :id";
$stmt = $pdo->prepare($sql_query);
$stmt->execute(['id' => $id]);

header("Location: index.php");
