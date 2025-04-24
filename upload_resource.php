<?php
include "db_connect_library.php";

// Process file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $unitCode = $_POST["unitCode"];
    $name = $_POST["name"];
    $category = $_POST["category"]; // A, B, C, D, E

    // Allowed file extensions
    $allowedExtensions = ["pdf", "doc", "docx", "ppt", "pptx", "xls", "xlsx", "mp4", "avi", "jpg", "png", "zip"];
    $maxFileSize = 50 * 1024 * 1024; // 50MB limit

    if ($_FILES["file"]["error"] == 0) {
        $fileName = basename($_FILES["file"]["name"]);
        $fileSize = $_FILES["file"]["size"];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        $uploadDir = "uploads/$category/";

        // Validate file type
        if (!in_array(strtolower($fileType), $allowedExtensions)) {
            die("Invalid file type. Allowed: " . implode(", ", $allowedExtensions));
        }

        // Validate file size
        if ($fileSize > $maxFileSize) {
            die("File is too large. Max size: 50MB");
        }

        // Create directory if not exists
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Save file
        $filePath = $uploadDir . time() . "_" . $fileName;
        move_uploaded_file($_FILES["file"]["tmp_name"], $filePath);

        // Insert into database
        $query = "INSERT INTO $category (unitCode, Name, Upload, FileType, FileSize) 
                  VALUES ('$unitCode', '$name', '$filePath', '$fileType', '$fileSize')";
        
        if (mysqli_query($conn, $query)) {
            echo "File uploaded successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error uploading file.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Resource</title>
    <link rel="stylesheet" href="upload_resource.css">
</head>
<body>
    <h2>Upload The Learning Resource(s):</h2>
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label>Unit Code:</label></td>
                <td><input type="text" name="unitCode" required></td>
            </tr>
            <tr>
                <td><label>Resource Name:</label></td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td><label>Select Category:</label></td>
                <td>
                    <select name="category" required>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label>Upload File:</label></td>
                <td><input type="file" name="file" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="submit">Upload</button>
                </td>
            </tr>
        </table>
    </form>

    <!-- Link to delete resource page -->
   <!-- <p><a href="delete_resource.php">Delete Resource</a></p>-->
    <!-- Link to delete resource page -->
<p><a href="delete_resource.php"><button class="delete-button">Delete Resource(s)</button></a></p>

</body>
</html>
