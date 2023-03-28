<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Check if file was uploaded successfully
  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Get the temporary file name
    $tempName = $_FILES['image']['tmp_name'];
    // Get the original file name
    $fileName = $_FILES['image']['name'];
    // Get the file size in bytes
    $fileSize = $_FILES['image']['size'];
    // Get the MIME type of the file
    $fileType = $_FILES['image']['type'];

    // Define the target directory where the uploaded file will be stored
    $target_dir = "IMGaddShare/images/";
    // Define the target path where the uploaded file will be stored
    $targetPath = $targetDir . $fileName;

    // Check if the target directory exists; if not, create it
    if (!file_exists($targetDir)) {
      mkdir($targetDir);
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($tempName, $targetPath)) {
      // Display a success message and the uploaded image
      echo '<h2>Image uploaded successfully:</h2>';
      echo '<img src="' . $targetPath . '" alt="' . $fileName . '">';
    } else {
      // Display an error message
      echo '<h2>Error uploading image.</h2>';
    }
  } else {
    // Display an error message
    echo '<h2>Error uploading image.</h2>';
  }
}
?>
