<?php
$Firstname = $_POST['$Firstname'];
$Sirname = $_POST['$Sirname'];
$ID = $_POST['$ID'];
$PHONE= $_POST['$PHONE'];
$email = $_POST['$email'];
$gender = $_POST['$gender'];
$DOB = $_POST['$DOB'];
$service = $_POST['$service'];
$Insuarance = $_POST['$Insuarance'];
$comments = $_POST['$comments'];
//db connection
$conn = new mysqli('localhost','root','','hospital');
if ($conn->connect_error) {
  die('Connection failed'. $conn->connect_error);}
  else{
    $stmt = $conn ->prepare("insert into patient(Firstname, Sirname, ID, PHONE, email, gender, D.O.B, service, Insuarnce, comments) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssissssss", $Firstname, $Sirname, $ID, $PHONE, $email, $gender, $DOB, $Insuarance, $comments);
    $stmt->execute();
    echo"patient record successfully uploaded";
    $stmt->close();
    $conn->close();
  }
?>
