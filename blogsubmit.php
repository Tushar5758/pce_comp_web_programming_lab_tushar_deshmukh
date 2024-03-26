<?php

$una=$_POST['u'];
$co=$_POST['content'];
$tit=$_POST['title'];
$dt1=date("Y-m-d");

$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="project";
// Establish MySQL connection
$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);

if($conn->connect_error){
    die("Connection error:".$conn->connect_error);
}
// Query to insert blog posts into MySQL
$que="INSERT INTO blog (uname,bcontent,btitle,bdate) VALUES ('$una','$co','$tit','$dt1')";
$result=$conn->query($que);
// Query to check that blog inserted into MySQL
$que1="SELECT * FROM blog WHERE uname='$una' AND bcontent='$co'";
$result1=$conn->query($que1);

if($result1->num_rows == 1)
{
    header("Location:blog.html"); 
    exit();
}
else
{
    alert("Blog not inserted");
    header("Location:blogwrite.html");
    exit();
}
// Close MySQL connection
$conn->close();
?>