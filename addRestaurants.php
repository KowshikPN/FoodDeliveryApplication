<html>
<body style="padding-left:50px">
<form method="POST" action="<?php $_PHP_SELF ?>">
  <div class="container">
    <h1>Add new Restaurant</h1>
    <hr>
    <label for="name"><b>Restaurant Name : </b></label>
    <input type="text" placeholder="Enter Restaurant Name" name="name" required>
</br>
</br>
    <label for="id"><b>Restaurant ID : </b></label>
    <input type="text" placeholder="Enter Restaurant ID" name="id" required>
</br>
</br>
    <label for="managerName"><b>Manager Name : </b></label>
    <input type="text" placeholder="Enter Manager Name" name="managerName" required>
</br>
</br>
    <label for="addressLine1"><b>Address Line 1 : </b></label>
    <input type="text" placeholder="Enter Address Line 1" name="addressLine1" required>
</br>
</br>
    <label for="addressLine2"><b>Address Line 2 : </b></label>
    <input type="text" placeholder="Enter Address Line 2" name="addressLine2" required>
</br>
</br>
    <label for="city"><b>City : </b></label>
    <input type="text" placeholder="Enter City" name="city" required>
</br>
</br>
    <label for="state"><b>State : </b></label>
    <input type="text" placeholder="Enter State" name="state" required>
</br>
</br>
    <label for="zipcode"><b>Zipcode : </b></label>
    <input type="text" placeholder="Enter zipcode" name="zipcode" required>
</br>
</br>
    <label for="phone1"><b>Phone Number 1 : </b></label>
    <input type="text" placeholder="Enter Phone Number" name="phone1" required>
</br>
</br>
    <label for="phone2"><b>Phone Number 2 : </b></label>
    <input type="text" placeholder="Enter Phone Number" name="phone2" required>
</br>
</br>
    <label for="resemail"><b>Email Address : </b></label>
    <input type="text" placeholder="Enter Email Address" name="resemail" required>
</br>
</br>
    <hr>
    <button style="width:300px;" type="submit"><h4>Add</h4></button>
  </div>
</form>
</body>
</html>

<?php
if(isset($_POST['id'])){
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "instafood";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = $_POST['id'];
$name = $_POST['name'];
$managerName = $_POST['managerName'];
$addressLine1 = $_POST['addressLine1'];
$addressLine2 = $_POST['addressLine2'];
$zipcode = $_POST['zipcode'];
$city = $_POST['city'];
$state = $_POST['state'];
$phone1 = $_POST['phone1'];
$phone2 = $_POST['phone2'];
$resemail = $_POST['resemail'];

$sql = "INSERT INTO Restaurants (restaurant_id, restaurant_name, restaurant_manager_name, restaurant_address_line1, restaurant_address_line2, zip_code, city, state, restaurant_phone_number1, restaurant_phone_number2, restaurant_email_id)
VALUES ('$id', '$name', '$managerName', '$addressLine1', '$addressLine2', '$zipcode', '$city', '$state', '$phone1', '$phone2', '$resemail')";

if ($conn->query($sql) === TRUE) {
    echo "New restaurant added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>