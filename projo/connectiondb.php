<?php
$Firstname = $_POST['Firstname'];
$Sirname = $_POST['Sirname'];
$ID = $_POST['ID'];
$PHONE= $_POST['PHONE'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$DOB = $_POST['DOB'];
$service = $_POST['service'];
$Insuarance = $_POST['Insuarance'];
$comments = $_POST['comments'];
//db connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "hospital";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error()."</br>");
}
echo "Connection successfully created</br>";

$sql = "INSERT INTO `patients`(`id_num`, `firstname`, `sirname`, `gender`, `dob`, `email`, `phonenumber`, `service`, `insuarance`, `comments`) VALUES ('$ID','$Firstname','$Sirname','$gender','$DOB','$email','$PHONE','$service','$Insuarance','$comments')";
$result = mysqli_query($conn,$sql);  
if($result){
 echo "You have been Registered";

}else{
 echo "error executing  query $sql".mysqli_error($link);

}
