<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MsSave</title>
</head>
<body>
    <?php
       $User = $_POST['Uname'];
       $Email = $_POST['email'];
       $phone = $_POST['phone'];
       $msg = $_POST['message']; 

       $Conn = mysqli_connect('localhost', 'root', '', 'Malcolm');
       if($Conn){
            $que = "INSERT INTO Msg(UserName,Email,Phone,msgs) VALUES ('$User','$Email','$phone','$msg')";
            if(mysqli_query($Conn,$que)){
                header('Location:Home.html');
                exit();
            }else{
                echo "Error message: " . mysqli_error($Conn);
            }
       }else{
            echo "Data not retrieved: " . mysqli_connect_error();
       }
    ?>
</body>
</html>
