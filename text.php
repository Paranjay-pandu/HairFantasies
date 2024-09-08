<?php
// Assuming you have fetched the file path from the database and stored it in a variable $imagePath
$imagePath = "uploads/your_image_filename.jpg"; // Example path

// Display the image using HTML <img> tag
echo '<img src="' . $imagePath . '" alt="Uploaded Image">';
?>
