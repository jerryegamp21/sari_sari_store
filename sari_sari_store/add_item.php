<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO items (name, category, price, quantity) VALUES ('$name', '$category', '$price', '$quantity')";
    if ($conn->query($sql) === TRUE) {
        header("Location: view_items.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Item</title>
</head>
<body>

<form method="POST">
    <h2>Add New Item</h2>
    Name: <input type="text" name="name" required><br>
    Category: 
        <select name="category" required>
        <option value="Food">Food</option>
        <option value="Beverage">Beverage</option>
        <option value="Household">Household</option>
        <option value="Personal Care">Personal Care</option>
    </select><br>
    Price: <input type="text" name="price" required><br>
    Quantity: <input type="number" name="quantity" required><br>
    <input type="submit" value="Add Item">
</form>

<a href="view_items.php">View Items</a>

</body>
</html>