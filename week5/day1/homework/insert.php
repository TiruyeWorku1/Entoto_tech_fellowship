<?php
$con = mysqli_connect('127.0.0.1', 'root','');
if (!$con){
    echo 'Not Connected To Server';
}
if (!mysqli_select_db($con, 'tutorial')){
    echo 'Database Not Selected';
}
$Name = $_POST['username'];
$Email = $_POST['email'];
$sql = "INSERT INTO person (Name, Email) VALUES ('$Name, $Email')";
if (!mysqli_query($con,$sql)){
        echo 'Not inserted';
}
 else {
echo 'inserted';    
}
header(" refresh:2; url=html.php");
?>

