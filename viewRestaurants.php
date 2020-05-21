<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "instafood";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$userId =$_GET['userId'];
$restaurants = mysqli_query($conn,"SELECT * FROM Restaurants");

echo "<div><b>
<h2>Restaurants</h2></b>";

while($row = mysqli_fetch_array($restaurants))
{
if($row['restaurant_name']!=null){
echo "<div>";
echo "<b><h2>" . $row['restaurant_name'] . "</h2></b>";
echo "<b>Address:</b></br>" . $row['restaurant_address_line1'].
"</br>".$row['restaurant_address_line2'].
"</br>".$row['zip_code'].
"</br>".$row['city'].
"</br>".$row['state']. 
"</br><b>Contact:</b></br>".$row['restaurant_phone_number1']. 
"</br>".$row['restaurant_phone_number2']. 
"</br>".$row['restaurant_email_id']. 
"</br>
<div style='padding-top:15px;'>
<button onClick='window.location=\"http://localhost/instafood/listMenus.php?resID=".$row['restaurant_id']."&userId=".$userId."\"'> View Menu </button> 
<button onClick='window.location=\"http://localhost/instafood/viewRateReview.php?resID=".$row['restaurant_id']."\"'> View Ratings </button> 
<button onClick='window.location=\"http://localhost/instafood/addRateReview.php?resID=".$row['restaurant_id']."&userId=".$userId."\"'> Add Rating/Review </button>
</div>
</br> </br>";
echo "</div>";
}
}
echo "</div>";

mysqli_close($conn);
?>