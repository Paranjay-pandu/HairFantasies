<?php
    include 'header.php';
?>

<style>
    .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin: 20px auto;
            max-width: 500px;
        }
        .card h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"], .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-group input[type="submit"] {
            background-color: gray;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

#uploadLabel {
  cursor: pointer;
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  color: #fff;
  background-color: #808080; /* Grey color */
  border-radius: 20px;
  text-align: center;
}

#uploadLabel:hover {
  background-color: #000; /* Black color on hover */
  transition: background-color 0.3s;
}
.container-upload {
  border-radius: 10px; /* Adjust the value to change the roundness of the corners */
  /* Optionally, you can also add other styles */
  background-color: #F8F9FA; /* Background color */
  padding: 20px; /* Padding inside the container */
  border: 1px solid #ccc; /* Border color and thickness */
}


/* Custom CSS for Submit Button */
input[type="submit"] {
  background-color: #808080; /* Grey color */
  color: #808080;
  border: none;
  padding: 8px 15px;
  cursor: pointer;
  transition: background-color 0.3s, transform 0.3s;
  border-radius: 5px;
}

input[type="submit"]:hover {
  background-color: #000; /* Black color on hover */
}

</style>

<body>

    <!-- Upload Card -->
    <div class="font card container-upload nav-animation">
        <h2>Upload Hairstyle</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="hfname">Hairstyle Name:</label>
                <input type="text" name="hfname" id="hfname" required>
            </div>
            <div class="form-group">
                <label for="hfgender">Gender:</label>
                <select name="hfgender" id="hfgender" required>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hflen">Hair Length:</label>
                <select name="hflen" id="hflen" required>
                    <option value="1">Short</option>
                    <option value="2">Medium</option>
                    <option value="3">Long</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hfface">Face Shape:</label>
                <select name="hfface" id="hfface" required>
                    <option value="1">Oval</option>
                    <option value="2">Round</option>
                    <option value="3">Square</option>
                    <option value="4">Heart</option>
                    <option value="5">Rectangular</option>
                    <option value="6">Diamond</option>
                    <option value="7">Triangle</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hfagecat">Age Category:</label>
                <select name="hfagecat" id="hfagecat" required>
                    <option value="1">Adult</option>
                    <option value="2">Teen</option>
                    <option value="3">Kids</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hfimage">Upload Hairstyle Image:</label>
                <input type="file" name="hfimage" id="hfimage" accept="image/*" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Upload Hairstyle">
            </div>
        </form>
    </div>

    <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include_once 'connection.php';

    // Get form data
    $hfname = $_POST['hfname'];
    $gender = $_POST['hfgender'];
    $hair_length = $_POST['hflen'];
    $face_shape = $_POST['hfface'];
    $age_category = $_POST['hfagecat'];

    // File upload path
    $targetDir = "uploads/";
    $fileName = basename($_FILES["hfimage"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    // Upload file to server
    if (move_uploaded_file($_FILES["hfimage"]["tmp_name"], $targetFilePath)) {
        // Insert image file path into database
        $insert = "INSERT INTO all_hairstyles (hfname, hfimage, fc_id, len_id, age_id, gender_id) 
                   VALUES ('$hfname', '$targetFilePath', '$face_shape', '$hair_length', '$age_category', '$gender')";
        $query = mysqli_query($con, $insert);
        if ($query) {
            echo '<script>alert("Hairstyle uploaded successfully.")</script>';
        } else {
            echo '<script>alert("Error uploading hairstyle.")</script>';
        }
    } else {
        echo '<script>alert("Error uploading hairstyle.")</script>';
    }
}
?>

</body>

<?php
    include 'footer.php';
?>
