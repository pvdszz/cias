
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "cias_dev");
$output = '';
$query = "SELECT * FROM `cias_orderextra` ORDER BY `cias_orderextra`.`ID` DESC LIMIT 1";
$result = mysqli_query($connect, $query);
$output = '
<br />
<h3 align="center">Item Data</h3>
<table class="table table-bordered table-striped">
 <tr>
  <th width="30%">Item Name</th>
 </tr>
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["product_price"].'</td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>