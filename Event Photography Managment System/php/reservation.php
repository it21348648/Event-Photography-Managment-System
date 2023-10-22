<?php
$server_name="localhost";
$username="username";
$password="password";
$database_name="event_photography_management";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['save']))
{	
	 $First_name = $_POST['first_name'];
	 $Last_name = $_POST['last_name'];
	 $Email_address = $_POST['email_address'];
	 $Phone_number = $_POST['phone_number'];
	 $Date = $_POST['date1'];
	 $Address = $_POST['address'];
	 
	

	 $sql_query = "INSERT INTO edit_profile (first_name,last_name,email_address,phone_number,date1,address)
	 VALUES ('$First_name','$Last_name ','$Email_address','$Phone_number',' $Date','$Address',)";

	 if (mysqli_query($conn, $sql_query)) 
	 {
		echo "New Details Entry inserted successfully !";
	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>