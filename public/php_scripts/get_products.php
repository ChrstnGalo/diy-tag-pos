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

// Query para kunin ang mga record na may discount na equal sa 0
$sql = "SELECT description, qty, amount, image FROM products WHERE discount = 0";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Lumikha ng isang array para sa mga resulta
    $response = array();

    while ($row = $result->fetch_assoc()) {
        // Gumawa ng bagong associative array na maglalaman ng mga detalye ng produkto
        $productDetails = array(
            'description' => $row['description'],
            'qty' => $row['qty'],
            'amount' => $row['amount'],
            'image' => $row['image']
        );

        // Idagdag ang bawat detalye ng produkto sa response array
        $response[] = $productDetails;
    }

    // I-echo ang response array bilang JSON
    echo json_encode($response);
} else {
    // Kung walang record na natagpuan
    echo "0 results";
}

// Isara ang koneksyon sa database
$conn->close();
?>
