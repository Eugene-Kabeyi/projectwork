<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Age</title>
    </head>
<body>
    <h2>Verify Age</h2>
    <label for="dob">Date of Birth:</label>
    <input type="date" id="dob">
    <button onclick="verifyAge()">Verify</button>
    <script>
        function verifyAge() {
            var dobInput = document.getElementById("dob").value;
            var dob = new Date(dobInput);
            var currentDate = new Date();
            var age = currentDate.getFullYear() - dob.getFullYear();

            if (currentDate.getMonth() < dob.getMonth() || (currentDate.getMonth() == dob.getMonth() && currentDate.getDate() < dob.getDate())) {
                age--;
            }
        
            if (age >= 18) {
                alert("You are " + age + " years old. You are eligible.");
                //document.write("You are " + age + " years old. You are eligible.");
            } else {
                alert("You are " + age + " years old. You are not eligible.");
               // document.write("You are " + age + " years old. You not are eligible.");
            }
        }
    </script>
</body>
</html>