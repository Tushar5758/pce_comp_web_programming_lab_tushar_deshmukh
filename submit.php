<?php

$una=$_POST['u'];
$co=$_POST['content'];

$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="blog";

$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);

if($conn->connect_error){
    die("Connection error:".$conn->connect_error);
}
$que="INSERT INTO blog (uname,bcontent) VALUES ('$una','$co')";
$result=$conn->query($que);
$que1="SELECT * FROM blog WHERE uname='$una' AND bcontent='$co'";
$result1=$conn->query($que1);

if($result1->num_rows == 1)
{
    header("Location:blogi.html"); 
    exit();
}
else
{
    alert("Blog not inserted");
    header("Location:blogc.html");
    exit();
}

$conn->close();
?>