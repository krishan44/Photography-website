<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckingPhp</title>
</head>
<body>
    <?php
        $mail = $_POST['textMail'];
        $Pw = $_POST['textPw'];

        
        if (!empty($mail) && !empty($Pw)) {
            $Conn = mysqli_connect('localhost','root','', 'Malcolm');
            echo'tesrt on1';
            if ($Conn) {
                $QueCheck = "SELECT Realname FROM Users WHERE Email='$mail' AND Password='$Pw'";
                $results = mysqli_query($Conn, $QueCheck);
                if ($results) {
                    if (mysqli_num_rows($results) > 0) {
                        $row = mysqli_fetch_assoc($results);
                        $_SESSION['Realname'] = $row['Realname'];
                        header("location:adminBooktable.php");
                        exit(); // Add exit after header to prevent further execution
                    } else {
                        echo "Error: No matching records found.";
                    }
                } else {
                    echo "Error: " . mysqli_error($Conn);
                }
            } else {
                echo 'Error: Unable to connect to the database.';
            }
        } else {
            echo 'Error: Email and password cannot be empty.';
        }
        
    ?>
</body>
</html>
