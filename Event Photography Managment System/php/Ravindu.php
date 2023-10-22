<?php

    $CID = $_POST ['CID'];
    $rate = $_POST ['rate'];
    $Fullname = $_POST ['Fullname'];
    $email = $_POST ['email'];
    $Age = $_POST ['Age'];
    $Phone = $_POST ['Phone'];

if(!empty($CID ) || !empty($rate ) || !empty($Fullname ) || !empty($email ) || !empty($Age ) || !empty($Phone )){

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
    $select = "SELECT CID from review where CID = ? Limit 1";
    $insert = "INSERT INTO review (CID, rate, Fullname, email, Age, Phone) values (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($select);
    $stmt->bind_param("i",$CID);
    $stmt->execute();
    $stmt->bind_result($CID);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum == 0){
        $stmt->close();
        $stmt = $conn->prepare($insert);
        $stmt->bind_param("isssii",$CID, $rate, $Fullname, $email, $Age, $Phone);
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
        echo "<script> alert('CID should not be empty !');</script>";
    die();
}
?>


