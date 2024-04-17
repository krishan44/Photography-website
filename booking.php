<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
</head>
<body>
    <?php
        $name = $_POST['name'];
        $email = $_POST['email'];
        $Service = $_POST['Service'];
        $location = $_POST['location'];
        $date = $_POST['date'];
        $number = $_POST['number'];
        
        $Conn = mysqli_connect('localhost', 'root', '', 'Malcolm');
        if ($Conn) {
            $que = "INSERT INTO bookings (Name, Email, Service, location, date, number) VALUES ('$name', '$email', '$Service', '$location', '$date', $number)";
            if (mysqli_query($Conn, $que)) {
                header("Location: booking.html");
                exit(); // Add exit() to prevent further execution
            } else {
                echo 'Error Message: ' . mysqli_error($Conn);
            }
        } else {
            echo 'Error: Unable to connect to the database.';
        }
    ?>
</body>
</html>
