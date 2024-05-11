<?php
// conecting to database and stooring the products
include 'conect.php'; 

// SQL query to create the table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS sales (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    quantity DECIMAL(5) NOT NULL,
    date datetime NOT NULL,
    total DECIMAL(10, 3)
    
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
    $total = $price * $quantity;

    $sql = "SELECT quantity FROM items WHERE name = '$name'";
$result = $conn->query($sql);
if ($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $qtt = $row['quantity'];


    // SQL query to insert form values into the table
    $insertSql = "INSERT INTO sales (name, price, quantity, date, total)
                  VALUES ('$name', $price, '$quantity', '$date', '$total')";

    // Execute the insert query
    if ($conn->query($insertSql) === TRUE) {
        header("location: add-sales.php");
        echo "<script>alert('sales added successfully');</script>";
    } else {
        echo "Error inserting data: " . $conn->error;
    }
    //update quantity
    $newqtt = $qtt - $quantity;
    $sql = "UPDATE items SET quantity = $newqtt WHERE name = '$name'";
    if($conn->query($sql) === TRUE){
      echo "<script>alert('sale added successfully')";
      header("Location: add-sales.php"); 
      // Redirect back to the main page
    }else{
      echo "product not updated";
    }
}
}


// Close the database connection
$conn->close();


?>