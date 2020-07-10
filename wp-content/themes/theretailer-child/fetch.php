
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "cias");
$output = '';
$query = "SELECT * FROM cias_orderdetail ORDER BY ID DESC";
$result = mysqli_query($connect, $query);
$output = '
<br />
<h3 align="center">Order Data</h3>
<table class="table table-bordered table-striped">
 <tr>
 <th width="10%">ID</th>
  <th width="30%">Name</th>
  <th width="10%">Email</th>
  <th width="50%">Age</th>
 </tr>
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
 <td>'.$row["ID"].'</td>
  <td>'.$row["name"].'</td>
  <td>'.$row["email"].'</td>
  <td>'.$row["age"].'</td>
 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>