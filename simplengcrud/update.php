<?php
require 'db.php';

$ID = $_GET['ID'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE ID = ?");
$stmt->execute([$ID]);
$product = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['Name'];
    $Description = $_POST['Description'];
    $Price = $_POST['Price'];
    $Quantity = $_POST['Quantity'];
    $Created_at = date('Y-m-d H:i:s');
    $Updated_at = date('Y-m-d H:i:s');

    $stmt = $pdo->prepare("UPDATE products SET Name = ?, Description = ?, Price = ?, Quantity = ?, Created_at = ?, Updated_at = ? WHERE ID = ?");
    $stmt->execute([$Name, $Description, $Price, $Quantity, $Created_at, $Updated_at, $ID]);
    header("Location: index.php");
}
?>

<form method="post">
    Name: <input type="text" name="Name" value="<?php echo htmlspecialchars($product['Name']); ?>"><br>
    Description: <input type="text" name="Description" value="<?php echo htmlspecialchars($product['Description']); ?>"><br>
    Price: <input type="text" name="Price" value="<?php echo htmlspecialchars($product['Price']); ?>"><br>
    Quantity: <input type="text" name="Quantity" value="<?php echo htmlspecialchars($product['Quantity']); ?>"><br>
    <input type="submit" value="Update">
</form>
