<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	<?php  
require_once 'core/dbConfig.php';
// NUMBER 8 - DISPLAY RESULTS IN AN HTML TABLE
$stmt = $pdo->prepare("SELECT * FROM grocery_items ORDER BY category_name ASC");
$stmt->execute();

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr>
        <th>ID</th>
        <th>Item Name</th>
        <th>Brand</th>
        <th>Category</th>
        <th>Country</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Unit</th>
        <th>Expiry Date</th>
      </tr>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['grocery_item_id']) . "</td>";
    echo "<td>" . htmlspecialchars($row['item_name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['brand_name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['category_name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['country_of_origin']) . "</td>";
    echo "<td>" . htmlspecialchars($row['price']) . "</td>";
    echo "<td>" . htmlspecialchars($row['quantity_in_stock']) . "</td>";
    echo "<td>" . htmlspecialchars($row['unit']) . "</td>";
    echo "<td>" . htmlspecialchars($row['expiry_date'] ?? '') . "</td>";
    echo "</tr>";
}

echo "</table>";
?>


	
</body>
</html>