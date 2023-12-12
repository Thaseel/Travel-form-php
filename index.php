<?php
$msg = false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("Connection to the database failed due to". mysqli_connect_error());
    }
    // echo "Successfully connected to the database";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `Travel_Form`.`trip` ( `Name`, `age`, `gender`, `email`, `phone`, `other`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc')";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $msg = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Travel Agency</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
    //     if ($msg == true) {
    //         echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
    //     }
    // ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter you Full Name">
            <input type="text" name="age" id="Age" placeholder="Enter you Age">
            <input type="text" name="gender" id="Gender" placeholder="Enter you Gender">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone Number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Additional information to be entered here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>