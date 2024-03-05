<?php

$start=microtime(true);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "aluno123";
$db = "classicmodels";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db)
        or die("Connection to the database failed: %s\n". $conn -> error);

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sample website for performance benchmark</title>
</head>

<body>

<?php
        // Just creating CPU work

for($counter=0; $counter < 10; $counter++) {
        $sqlQuery="SELECT * FROM customers INNER JOIN orders ON customers.customerNumber = orders.customerNumber; ";
        $result = $conn->query($sqlQuery);

        $sqlQuery="SELECT * FROM products INNER JOIN orderdetails ON products.productCode = orderdetails.productCode; ";
        $result = $conn->query($sqlQuery);
}

echo "<h1>This script in running on ".gethostname();

?>




<h2>Customer list</h2>
    <?php
      $sqlQuery="SELECT * FROM customers WHERE CustomerName LIKE '%au%'; ";

      $result = $conn->query($sqlQuery);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<p>".$row['customerName'];
         }
      }

      $conn -> close();




        $end = microtime(true);

        // Calculate the execution time
        $executionTime = $end - $start;

        // Output the result
        echo "<h2>Script execution time: " . $executionTime . " seconds</h2>";

   ?>
</body>
</html>
        