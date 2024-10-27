<?php
include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $itemId = $_POST['id'];
    $itemName = $_POST['name'];
    $itemPrice = $_POST['price'];
    $quantityToBuy = $_POST['quantity'];

    // Fetch the current quantity of the item
    $sql = "SELECT quantity FROM items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $itemId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentQuantity = $row['quantity'];

        // Check if enough quantity is available
        if ($currentQuantity >= $quantityToBuy) {
            // Update the quantity in the database
            $newQuantity = $currentQuantity - $quantityToBuy;
            $updateSql = "UPDATE items SET quantity = ? WHERE id = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("ii", $newQuantity, $itemId);
            $updateStmt->execute();

            // Optional: You can also log the purchase or redirect to a confirmation page
            echo "You have successfully purchased $quantityToBuy of $itemName for " . ($itemPrice * $quantityToBuy) . "!";
        } else {
            echo "Not enough quantity available for $itemName. Available quantity: $currentQuantity.";
        }
    } else {
        echo "Item not found.";
    }

    $stmt->close();
} else {
    echo "Invalid request.";
}

$conn->close();
?>