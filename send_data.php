<?php

$con = mysqli_connect('127.0.0.1','root','');

if(!$con){
    echo 'Not Connected to Server';
}

if(!mysqli_select_db($con,'project')){
    echo 'Database not selected';
}

$bread = $_POST['bread'];
$sauce = $_POST['Sauce'];
$sv = $_POST['sv'];
$patty = $_POST['patty'];

$sql = "INSERT INTO sandwich (bread,sauce,sv,patty) VALUES ('$bread','$sauce','$sv','$patty')";

if(!mysqli_query($con,$sql)){
    echo 'Not inserted';
}
else{
    echo 'inserted';
}

header("refresh:2;url=landing.html");
?>