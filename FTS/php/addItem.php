<?php
// conecting to database and stooring the products
include 'conect.php'; 

// SQL query to create the table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity DECIMAL(5) NOT NULL,
    date DATE NOT NULL,
    exdate DATE NOT NULL,
    time TIME NOT NULL
)";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Table 'items' created successfully or already exists.";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form values
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $date = $_POST["date"];
    $exdate = $_POST["exdate"];
    $time = $_POST["time"];

    // SQL query to insert form values into the table
    $insertSql = "INSERT INTO items (name, price, quantity, date, exdate, time)
                  VALUES ('$name', $price, '$quantity', '$date', '$exdate', '$time')";

    // Execute the insert query
    if ($conn->query($insertSql) === TRUE) {
        header("location: addstock.php");
        echo "<script>showDanger();</script>";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
}


// Close the database connection
$conn->close();


?>