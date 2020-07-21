
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "cias_dev");
global $output;
$query = "SELECT * FROM `cias_orderextra` ORDER BY `cias_orderextra`.`ID` DESC LIMIT 1";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result))
{
 $output = $row["product_price"];

}
?>