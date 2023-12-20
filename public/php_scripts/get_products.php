<?php
// Mag-connect sa database
$DBHOST = "localhost";
$DBNAME = "id21357081_pos_db";
$DBUSER = "id21357081_root";
$DBPASS = "Galo123456789@@";
$DBDRIVER = "mysql";

$conn = new mysqli($DBHOST, $DBUSER, $DBPASS, $DBNAME);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products ORDER BY date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $products = array();

  while($row = $result->fetch_assoc()) {
    $product = array(
      'image' => $row['image'],
      'description' => $row['description'],
      'amount' => $row['amount']
    );
    $products[] = $product;
  }

  echo json_encode($products);
} else {
  echo "0 results";
}

$conn->close();
