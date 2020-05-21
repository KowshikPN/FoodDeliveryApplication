<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "instafood";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$resID=$_GET['resID'];
$MenuItems = mysqli_query($conn,"SELECT * FROM MenuItems where restaurant_id='$resID'");
if (!$MenuItems) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

echo "<table cellpadding='5' style='border: 1px solid black;border-collapse: collapse' >
<tr>
<th>Item name</th>
<th>Item price</th>
</tr>";

while($row = mysqli_fetch_array($MenuItems))
{
echo "<tr>";
echo "<td style='border: 1px solid black;'>" . $row['item_name'] . "</td>";
echo "<td style='border: 1px solid black;'>" . $row['item_price'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>