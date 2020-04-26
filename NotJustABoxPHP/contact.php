<!DOCTYPE html>

<div class="container">
	<form action="contact.php" method="POST">
        Enter Name: <input type="text" name="Name" required="required" /> <br/>
        Enter Email: <input type="text" name="Email" required="required" /> <br/>
        Enter Store Name: <input type="text" name="StoreName" required="required" /> <br/>
        Enter Store Address: <input type="text" name="StoreAddress" required="required"> /> <br/>
        Enter Quantity of Cardboard Needed: <input type="text" name="CardboardQuantity" required="required"> /> <br/>
        Enter Quantity of Face Shields Needed: <input type="text" name="FaceshieldQuantity" required="required"> /> <br/>
        <input type="submit" value="Contact"/>
    </form>
</body>
</html>

<?php
$servername= "localhost";
$username = "root";
$password = "";
$dbname = "notjustabox";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if ($conn->connect_error){
	die("Contact Failed: " . mysqli_connect_error());
}

$name= $_POST['Name'];
$email= $_POST['Email'];
$store_name= $_POST['StoreName'];
$store_address= $_POST['StoreAddress'];
$quantity_of_cardboard= $_POST['CardboardQuantity'];
$quantity_of_faceshields= $_POST['FaceshieldQuantity'];

$sqlentry = "INSERT INTO users (name,email,store_name,store_address,quantity_of_cardboard,quantity_of_faceshields) VALUES ('$name','$email','$store_name','$store_address','$quantity_of_cardboard','$quantity_of_faceshields')";

if (mysqli_query($conn, $sqlentry)){
	echo "Thank you for contacting us! We will get back to you shortly!";
	mysqli_close($conn);
}
else{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>