//Full Code of php file for mySql database connection with html form
<?php
$server_name="localhost";
$username="username";
$password="password";
$database_name="edit_profile";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['save']))
{	
	 $Name = $_POST['name'];
	 $Email = $_POST['email'];
	 $Password = $_POST['password'];
	 $Phone_number = $_POST['phoneNumber'];
	 $gender = $_POST['gender'];
	 $Language = $_POST['language'];
	 $Zip_code = $_POST['zipcode'];
	 $About = $_POST['about'];

	 $sql_query = "INSERT INTO edit_profile (name,email,password,phoneNumber,gender,language,zipcode,about)
	 VALUES ('$Name','$Email','$Password','$Phone_number','$gender','$Language','$Zip_code','$About')";

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