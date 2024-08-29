<?php
require 'db.php';

$ID = $_GET['ID'];
$stmt = $pdo->prepare("DELETE FROM products WHERE ID = ?");
$stmt->execute([$ID]);
header("Location: index.php");
?>
