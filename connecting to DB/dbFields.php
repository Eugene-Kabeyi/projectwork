<?php
/* Module Creation
** Author: Karari E.Karari
** Date: 04/03/2024
** Purpose: Training
*/

/* Module Description
** This module reads data from the form post method
** a field at a time (array style element retrieval)
** and assigns it to corresponding variables.
** The variables become the values in query string 
** VALUES section of the INSERT command
*/
$std_name=$_POST['txtName'];
$std_id=$_POST['txtID'];
$gender=$_POST['rdoGender'];
$dob=$_POST['dteDOB'];
$course=$_POST['course'];
$email=$_POST['emailInput'];
$phone=$_POST['telNumber'];
echo "Data from the form picked successfully</br>";
?>