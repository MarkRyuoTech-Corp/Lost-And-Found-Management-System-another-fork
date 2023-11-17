<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Missing Item</title>
</head>
<body>

<h2>Report Missing Item</h2>

<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_nt3102";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemName = $_POST["item_name"];
    $dateFound = $_POST["date_found"];

    // Insert data into the database
    $sql = "INSERT INTO your_table_name (Item_Name, Date_Found) VALUES ('$itemName', '$dateFound')";

    if ($conn->query($sql) === TRUE) {
        echo "<h3>Reported Missing Item:</h3>";
        echo "Item Name: $itemName <br>";
        echo "Date Found: $dateFound <br>";
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="item_name">Item Name:</label>
    <input type="text" id="item_name" name="item_name" required><br>

    <label for="date_found">Date Found:</label>
    <input type="date" id="date_found" name="date_found" required><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
