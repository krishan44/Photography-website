<?php
    session_start();
    if(isset($_SESSION['Realname'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="adminbooktable.css">
</head>
<body>

<?php
    $conn=mysqli_connect('localhost','root','','Malcolm');
    $que="SELECT * FROM bookings";
    if(mysqli_query($conn,$que)){
        $Data=mysqli_query($conn,$que);
        if(mysqli_num_rows($Data)>0){
            echo'
            <header>
        <h2 class="logo">Malcolm</h2>
        <nav class="navigation">
          <a href="adminBooktable.php">Bookings</a>
          <a href="Admingallery.html">Gallery</a>
          <a href="Adminmsg.php">Messages</a>
        
        </nav>
      </header>
      <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Customer Bookings</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="back/search.png">
            </div>
        </section>
            <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Customer <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Service <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Location <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Contact Number <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>'; // Moved tbody tag here
            while ($rv=mysqli_fetch_assoc($Data)){
                echo'
                    <tr>
                        <td> '.$rv['BkID'].'</td>
                        <td> '.$rv['Name'].'</td>
                        <td> '.$rv['Service'].' </td>
                        <td> '.$rv['location'].'</td>
                        <td>
                            <p class="status delivered">'.$rv['date'].'</p>
                        </td>
                        <td> '.$rv['number'].' </td>
                        <td> '.$rv['Email'].' </td>
                    </tr>';
            }
            echo'
                </tbody>
            </table>
        </section>
    </main>
    <script src="adminbooktable.js"></script>
</body>
</html>';
        }
    }
}
?>
