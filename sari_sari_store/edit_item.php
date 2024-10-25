<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM items WHERE id=$id";
$result = $conn->query($sql);
$item = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE items SET name='$name', category='$category', price='$price', quantity='$quantity' WHERE id=$id";
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
    <title>Edit Item</title>
</head>
<body>

<form method="POST">
    <h2>Edit Item</h2>
    Name: <input type="text" name="name" value="<?php echo $item['name']; ?>" required><br>
    Category: 
    <select name="category" required>
        <option value="Food" <?php if ($item['category'] == 'Food') echo 'selected'; ?>>Food</option>
        <option value="Beverage" <?php if ($item['category'] == 'Beverage') echo 'selected'; ?>>Beverage</option>
        <option value="Household" <?php if ($item['category'] == 'Household') echo 'selected'; ?>>Household</option>
        <option value="Personal Care" <?php if ($item['category'] == 'Personal Care') echo 'selected'; ?>>Personal Care</option>
    </select><br>
    Price: <input type="text" name="price" value="<?php echo $item['price']; ?>" required><br>
    Quantity: <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" required><br>
    <input type="submit" value="Update Item">
</form>

<a href="view_items.php">Back to Items</a>

</body>
</html>