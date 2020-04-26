<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="./style.css">

<img class="logo" src="EarthBox.jpg">
    
<div class="topnav">
    <a href="home.html">Home</a>
    <a href="impact.html">Impact</a>
    <a href="places.html">What We Offer</a>
    <a class="active" href="contact.php">Contact Us</a>
</div>

<div class="container">

	<form action="contact.php" method="POST">
        Enter Name: <input type="text" name="Name" required="required" /> <br/>
        Enter Email: <input type="text" name="Email" required="required" /> <br/>
        Enter Store Name: <input type="text" name="StoreName" required="required" /> <br/>
        Enter Store Address: <input type="text" name="StoreAddress" required="required"> <br/>
        Enter Quantity of Cardboard Needed: <input type="text" name="CardboardQuantity" required="required"> <br/>
        Enter Quantity of Face Shields Needed: <input type="text" name="FaceshieldQuantity" required="required"> <br/>
        <input type="submit" value="Contact"/>
    </form>

<?php
$name='null';
$email='null';
$store_name='null';
$store_address='null';
$quantity_of_cardboard='null';
$quantity_of_faceshields='null';
$bool=false;
$sqlentry='null';

if (isset($_POST['Name']) || isset($_POST['Email']) || isset($_POST['StoreName']) || isset($_POST['StoreAddress']) || isset($_POST['CardboardQuantity']) || isset($_POST['FaceshieldQuantity'])){
    $name= $_POST['Name'];
    $email= $_POST['Email'];
    $store_name= $_POST['StoreName'];
    $store_address= $_POST['StoreAddress'];
    $quantity_of_cardboard= $_POST['CardboardQuantity'];
    $quantity_of_faceshields= $_POST['FaceshieldQuantity'];
    $bool=true;

}
?>

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

if ($bool){
    $sqlentry = "INSERT INTO users (name,email,store_name,store_address,quantity_of_cardboard,quantity_of_faceshields) VALUES ('$name','$email','$store_name','$store_address','$quantity_of_cardboard','$quantity_of_faceshields')";
}

if (mysqli_query($conn, $sqlentry)){
	echo "Thank you for contacting us! We will get back to you shortly!";
	mysqli_close($conn);
}

?>