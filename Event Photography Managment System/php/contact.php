<?php

    $name = $_POST ['name'];
    $email = $_POST ['email'];
    $message = $_POST ['message'];

if(!empty($name ) || !empty($email ) || !empty($message )){

$host = "localhost";
$dbusername = "root";
$dbpassword =  ""; 
$dbname = "feedback";

//connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'
    .mysqli_connect_error());
}
else{
    $select = "SELECT email from review where email = ? Limit 1";
    $insert = "INSERT INTO contact (name, email, message) values (?, ?, ?)";

    $stmt = $conn->prepare($select);
    $stmt->bind_param("i",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum == 0){
        $stmt->close();
        $stmt = $conn->prepare($insert);
        $stmt->bind_param("sss",$name, $email, $message);
        $stmt->execute();
        //echo "Successfully Subscribed !";
        echo "<script> alert('Successfully Subscribed !');</script>";
    }
    else{
        //echo "Someone already subscribed using this email";
        echo "<script> alert('Someone already subscribed using this email !');</script>";
    }
    $stmt->close();
    $conn->close();
    
}
}
else{
    //echo "Email should not be empty";
        echo "<script> alert('email should not be empty !');</script>";
    die();
}
?>