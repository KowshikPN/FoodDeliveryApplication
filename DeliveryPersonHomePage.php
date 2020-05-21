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

$sql = "select order_number,user_id,order_status,total_price,firstname,addressline1,addressline2,user_city,
user_state,user_zipcode,phone_number1,restaurant_name,restaurant_address_line1,
restaurant_address_line2,restaurant_city,restaurant_state,restaurant_zipcode,
restaurant_phone_number1 from order_info where dp_id='$dp_id' group by order_number";

$orders = mysqli_query($conn,$sql);

$row1 = mysqli_fetch_array($orders);

echo "<div>";
echo "<h3> ORDERS </h3>";
echo "<b>Order No: </b>" . $row1['order_number'] .
"</br><b>Order_Status: </b>".$row1['order_status'].
"</br><b>Total Price: </b>".$row1['total_price']. 
"</br>";

echo "<h3> Customer Details</h3>";
if ($row1['addressline2'] == "")
{
echo "<b>Customer Name: </b>" . $row1['firstname'] .
"</br><b>Delivery Address: </b></br>".$row1['addressline1'].
"</br>".$row1['user_city'].
"</br>".$row1['user_state'].
"</br>".$row1['user_zipcode'].
"</br>Phone Number: ".$row1['phone_number1']. 
"</br>";
}
else
{
echo "<b>Customer Name: </b>" . $row1['firstname'] .
"</br><b>Delivery Address: </b></br>".$row1['addressline1'].
"</br>".$row1['addressline2'].
"</br>".$row1['user_city'].
"</br>".$row1['user_state'].
"</br>".$row1['user_zipcode'].
"</br>Phone Number: ".$row1['phone_number1']. 
"</br>";
}	
echo "<h3> Restaurant Details</h3>";
if ($row1['restaurant_address_line2'] == "")
{
echo "<b>Restaurant Name: </b>" . $row1['restaurant_name'] .
"</br><b>Address: </b></br>".$row1['restaurant_address_line1'].
"</br>".$row1['restaurant_city'].
"</br>".$row1['restaurant_state'].
"</br>".$row1['restaurant_zipcode'].
"</br>Phone Number: ".$row1['restaurant_phone_number1']. 
"</br>";
}
else
{
echo "<b>Restaurant Name: </b>" . $row1['restaurant_name'] .
"</br><b>Address: </b></br>".$row1['restaurant_address_line1'].
"</br>".$row1['restaurant_address_line2'].
"</br>".$row1['restaurant_city'].
"</br>".$row1['restaurant_state'].
"</br>".$row1['restaurant_zipcode'].
"</br>Phone Number: ".$row1['restaurant_phone_number1']. 
"</br>";
}
	
?>