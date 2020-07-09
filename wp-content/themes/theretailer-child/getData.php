<?php
// connect to database
$conn = mysqli_connect("localhost", "root", "", "cias");
$result = mysqli_query($conn, "SELECT * FROM cias_price_for_each_person");
$data = array();
while ($row = mysqli_fetch_object($result)) {
    array_push($data, $row);
}
echo json_encode($data);
exit();