<?php

$email = $_POST['email'];

if(!empty($email)){

$host = "localhost";
$dbusername = "root";
$dbpassword =  ""; 
$dbname = "event_photography_management_system";

//connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'
    .mysqli_connect_error());
}
else{
    $select = "SELECT email from subscribers_emails where email = ? Limit 1";
    $insert = "INSERT INTO subscribers_emails (email) values (?)";

    $stmt = $conn->prepare($select);
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum == 0){
        $stmt->close();
        $stmt = $conn->prepare($insert);
        $stmt->bind_param("s",$email);
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
        echo "<script> alert('Email should not be empty !');</script>";
    die();
}
?>
