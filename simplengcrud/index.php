<?php
require 'db.php';

$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* css*/
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 1800px;
            max-height  : 1800px;
            margin: 0 auto;
            padding: 50px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        .btn-container {
            display: flex;
            gap: 15px; }
            
        .btn {
            margin-top: auto;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }
        .btn-success {
            background-color: #28a745;
            color: #fff;
        }
        .btn-warning {
            background-color: #ffc107;
            color: #333;
        }
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .add{
            margin-top: 25px;
        }
    </style>
    <title>Products Management Form</title>
</head>
<body>
<div class="container">
    <h2>PRODUCTS</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['ID']); ?></td>
                <td><?php echo htmlspecialchars($product['Name']); ?></td>
                <td><?php echo htmlspecialchars($product['Description']); ?></td>
                <td><?php echo $product['Price']; ?></td>
                <td><?php echo $product['Quantity']; ?></td>
                <td><?php echo htmlspecialchars($product['Created_at']); ?></td>
                <td><?php echo htmlspecialchars($product['Updated_at']); ?></td>
                <td>
                     <div class="btn-container">
                        <a href="update.php?ID=<?php echo $product['ID']; ?>" class="btn btn-warning">Edit</a>
                        <br>
                        <a href="delete.php?ID=<?php echo $product['ID']; ?>" class="btn btn-danger">Delete</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="add">
        <a href="create.php" class="btn btn-success">Add New Product</a>
    </div>
</div>
</body>
</html>
