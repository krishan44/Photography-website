
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// Check if the form is submitted


if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
    // Check if file upload is successful
    if (isset($_FILES["pic"]) && $_FILES["pic"]["error"] == UPLOAD_ERR_OK) {
        // Establish database connection
        $conn = mysqli_connect("localhost", "root", "", "Malcolm");


        // Check if connection is successful
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Get image data
        $imageData = addslashes(file_get_contents($_FILES["pic"]["tmp_name"]));

        // Prepare and execute SQL query to insert image data into database
        $sql = "INSERT INTO imgs (photo) VALUES ('$imageData')";
        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);

            // Redirect to galleryUp.html after successful upload
            header("Location:galleryUp.html");
            exit;
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading file: ";
        switch ($_FILES["pic"]["error"]) {
            case UPLOAD_ERR_INI_SIZE:
                echo "The uploaded file exceeds the upload_max_filesize directive in php.ini.";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                echo "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
                break;
            case UPLOAD_ERR_PARTIAL:
                echo "The uploaded file was only partially uploaded.";
                break;
            case UPLOAD_ERR_NO_FILE:
                echo "No file was uploaded.";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                echo "Missing a temporary folder. Check your PHP configuration.";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                echo "Failed to write file to disk. Check permissions on the upload directory.";
                break;
            case UPLOAD_ERR_EXTENSION:
                echo "A PHP extension stopped the file upload.";
                break;
            default:
                echo "Unknown error occurred.";
                break;
        }
    }
}
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

</body>
</html>
