<?php
// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "Malcolm");

// Check if connection is successful
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Fetch image paths from the database
$sql = "SELECT photo FROM imgs";
$result = mysqli_query($conn, $sql);

// Check if query execution was successful
if ($result) {
    // Initialize an array to store image paths
    $imagePaths = array();

    // Fetch each row of the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Add the image path to the array
        $imagePaths[] = $row['photo'];
    }

    // Close the result set
    mysqli_free_result($result);
} else {
    echo "Error executing query: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="gallery.css">
</head>
<body>
    <header>
    <h2 class="logo">Malcolm</h2>
    <nav class="navigation">
      <a href="Home.html">Home</a>
      <a href="aboutus.html">About</a>
      <a href="#">Services</a>
      <a href="#">Contact</a>
      <button class="btnlogin-popup" onclick="location.href='#'" >Book</button>
    </nav>
</header>
<div class="fullImg" id="fullImgbox">
    <img src="" alt="photo" id="fullImgs">
    <span onclick="closefullImgs()">X</span>
</div>
    <div class="imgGal">
        <?php
        // Loop through the image paths and generate HTML for each image
        foreach ($imagePaths as $path) {
            echo '<img src="' . $path . '" alt="photo" onclick="openfullImgs(\'' . $path . '\')">';
        }
        ?>
    </div>

    <script>
        var fullImgbox = document.getElementById("fullImgbox");
        var fullImgs = document.getElementById("fullImgs");

        function openfullImgs(pic){
            fullImgbox.style.display="flex";
            fullImgs.src=pic;
        }

        function closefullImgs(){
            fullImgbox.style.display="none";
        }
    </script>

</body>
</html>
