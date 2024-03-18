<?php
$conn = mysqli_connect("localhost","root","","hospital");
$sql="SELECT `id`, `firstname`, `sirname`, `gender`, `dob`, `email`, `phone`, `insuarance`, `comments` FROM `patient` WHERE 1";

$result= mysqli_query($conn,$sql);
if($result){

    $data= mysqli_num_rows($result);
    if($data>0){

        echo "<br>";
        echo "<table class='table table-striped table-bordered'>";
        echo "<tr>";
        echo "<th>ID Number</th>";
        echo "<th>Firstname</th>";
        echo "<th>Sirname</th>";
        echo "<th>Gender</th>";
        echo "<th>Date of birth</th>";
        echo "<th>Email</th>";
        echo "<th>Phone<th>";
        echo "<th>Insuarance</th>";
        echo "</tr>";

        while ($row= mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['firstname']."</td>";
            echo "<td>".$row['sirname']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['dob']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['phone']."</td>";
            echo "<td>".$row['insuarance']."</td>";





            echo "</tr>";
        }


    }else{
        echo "No data in db";
    }

}else{
    echo "Error executing query $sql".mysqli_error($conn);
}

