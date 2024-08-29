<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];
    $Price = $_POST['Price'];
    $Quantity = $_POST['Quantity'];
    $Created_at = date('Y-m-d H:i:s');
    $Updated_at = date('Y-m-d H:i:s');

    $stmt = $pdo->prepare("INSERT INTO products (Name, Description, Price, Quantity, Created_at, Updated_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$Name, $Description, $Price, $Quantity, $Created_at, $Updated_at]);
    header("Location: index.php");
}
?>

<form method="post">
    Name: <input type="text" name="Name"><br>
    Description: <input type="text" name="Description"><br>
    Price: <input type="text" name="Price"><br>
    Quantity: <input type="text" name="Quantity"><br>
    <input type="submit" value="Create">
</form>
