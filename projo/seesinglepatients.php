<?php
$idnum = $_POST['idnum'];
$filter = $_POST['filter'];
$sql = "SELECT `id_num`, `firstname`, `sirname`, `gender`, `dob`, `email`, `phonenumber`, `service`, `insuarance`, `comments` FROM `patients` WHERE id_num=$idnum";

$result = mysqli_query($conn, $sql);
if ($result) {
    $data = mysqli_num_rows($result);
    if ($data > 0) {
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

        echo "<tr>";
        echo "<td>" . $row['id_num'] . "</td>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['sirname'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['dob'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phonenumber'] . "</td>";
        echo "<td>" . $row['insuarance'] . "</td>";
        echo "</tr>";
    } else {
        echo "No data in db";
    }
} else {
    echo "Error executing query $sql" . mysqli_error($conn);
}
