<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "instafood";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$dp_id =$_GET['dp_id'];
$orders = mysqli_query($conn,"SELECT * FROM  orders where dp_id='$dp_id'");
$row1 = mysqli_fetch_array($orders);
$user_id = $row1['user_id'];
$res_id = $row1['restaurant_id'];
$or_no = $row1['order_number'];
$user_details = mysqli_query($conn,"SELECT * FROM  registereduser where user_id='$user_id'");

$res_details = mysqli_query($conn,"SELECT * FROM  restaurants where restaurant_id='$res_id'");

$order_details = mysqli_query($conn,"SELECT * FROM  orderdetails where order_number='$or_no'");

$row2 = mysqli_fetch_array($user_details);

$row3 = mysqli_fetch_array($res_details);

echo "<div>";
echo "<h3> ORDERS </h3>";
echo "<b>Order No: </b>" . $row1['order_number'] .
"</br><b>Order_Status: </b>".$row1['order_status'].
"</br><b>Total Price: </b>".$row1['total_price']. 
"</br>";

echo "<h3> Customer Details</h3>";
if ($row2['addressline2'] == "")
{
echo "<b>Customer Name: </b>" . $row2['firstname'] .
"</br><b>Delivery Address: </b></br>".$row2['addressline1'].
"</br>".$row2['city'].
"</br>".$row2['state'].
"</br>".$row2['zip_code'].
"</br>Phone Number: ".$row2['phone_number1']. 
"</br>";
}
else
{
echo "<b>Customer Name: </b>" . $row2['firstname'] .
"</br><b>Delivery Address: </b></br>".$row2['addressline1'].
"</br>".$row2['addressline2'].
"</br>".$row2['city'].
"</br>".$row2['state'].
"</br>".$row2['zip_code'].
"</br>Phone Number: ".$row2['phone_number1']. 
"</br>";
}	
echo "<h3> Restaurant Details</h3>";
if ($row3['restaurant_address_line2'] == "")
{
echo "<b>Restaurant Name: </b>" . $row3['restaurant_name'] .
"</br><b>Address: </b></br>".$row3['restaurant_address_line1'].
"</br>".$row3['city'].
"</br>".$row3['state'].
"</br>".$row3['zip_code'].
"</br>Phone Number: ".$row3['restaurant_phone_number1']. 
"</br>";
}
else
{
echo "<b>Restaurant Name: </b>" . $row3['restaurant_name'] .
"</br><b>Address: </b></br>".$row3['restaurant_address_line1'].
"</br>".$row3['restaurant_address_line2'].
"</br>".$row3['city'].
"</br>".$row3['state'].
"</br>".$row3['zip_code'].
"</br>Phone Number: ".$row3['restaurant_phone_number1']. 
"</br>";
}	
























?>