<?php
include "included.php";
include "connection.php";

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve filter options from form and sanitize inputs
    $faceShape = isset($_POST['faceShape']) ? $_POST['faceShape'] : '';
    $hairLength = isset($_POST['hairLength']) ? $_POST['hairLength'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $ageCategory = isset($_POST['ageCategory']) ? $_POST['ageCategory'] : '';

    // Construct your SQL query based on the received data
    $sql = "SELECT a.hfname AS hairstyle_name,a.hfimage AS image_source, f.fc_name AS face_shape, l.len_name AS hair_length, ag.age_name AS age_group, g.gender_name AS gender
            FROM all_hairstyles a
            JOIN hfface f ON a.fc_id = f.fc_id
            JOIN hflength l ON a.len_id = l.len_id
            JOIN hfage ag ON a.age_id = ag.age_id
            JOIN hfgender g ON a.gender_id = g.gender_id
            WHERE 1=1";

    // Prepare an array to hold parameters for the prepared statement
    $params = array();

    if (!empty($faceShape)) {
        $sql .= " AND f.fc_name = ?";
        $params[] = $faceShape;
    }

    if (!empty($hairLength)) {
        $sql .= " AND l.len_name = ?";
        $params[] = $hairLength;
    }

    if (!empty($gender)) {
        $sql .= " AND g.gender_name = ?";
        $params[] = $gender;
    }

    if (!empty($ageCategory)) {
        $sql .= " AND ag.age_name = ?";
        $params[] = $ageCategory;
    }

    // Prepare the statement
    $stmt = $con->prepare($sql);

    // Bind parameters
    if ($stmt) {
        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $stmt->bind_param($types, ...$params);
        }
        // Execute the statement
        $stmt->execute();
        // Get result set
        $result = $stmt->get_result();
        // Fetch filtered data
        $filteredData = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        die("Error in preparing SQL statement: " . $con->error);
    }


    // Close statement
    $stmt->close();
}
?>

<div class="container nav-animation">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-3 col-sm-6 custom-padding">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="face-shape">Face Shape</label>
                    <select class="form-select" id="face-shape" name="faceShape">
                        <option value="">All</option>
                        <option value="Oval">Oval</option>
                        <option value="Round">Round</option>
                        <option value="Square">Square</option>
                        <option value="Heart">Heart</option>
                        <option value="Rectangular">Rectangular</option>
                        <option value="Diamond">Diamond</option>
                        <option value="Triangle">Triangle</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 custom-padding">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="hair-length">Hair Length</label>
                    <select class="form-select" id="hair-length" name="hairLength">
                        <option value="">All</option>
                        <option value="Short">Short</option>
                        <option value="Medium">Medium</option>
                        <option value="Long">Long</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 custom-padding">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="gender">Gender</label>
                    <select class="form-select" id="gender" name="gender">
                        <option value="">All</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 custom-padding">
                <div class="input-group mb-3">
                    <label class="input-group-text" for="age-category">Age Category</label>
                    <select class="form-select" id="age-category" name="ageCategory">
                        <option value="">All</option>
                        <option value="Adult">Adult</option>
                        <option value="Teen">Teen</option>
                        <option value="Kids">Kids</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 custom-padding">
                <button type="submit" class="btn btn-dark btn-block">Filter</button>
            </div>
        </div>
    </form>

    <?php
// Display filtered data
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($filteredData)) {
    echo '<div class="card-container nav-animation">';
    foreach ($filteredData as $row) {
        // Display card structure for each row
        echo '<a href="#" class="card-link">';
        echo '<div class="card font">';
        echo '<div class="card-content">';
        echo '<div class="left-content">';
        
        // Handle image display
        $image_src = isset($row['image_source']) ? $row['image_source'] : 'default_image.png';
        
        // Output image
        echo '<img src="' . $image_src . '" class="card-img-left" alt="...">';
        echo '</div>';
        echo '<div class="right-content">';
        // Output hairstyle name, face shape, hair length, age group, and gender
        echo '<h5 class="hairstyle">' . $row['hairstyle_name'] . '</h5>';
        echo '<p class="face-shape">' . $row['face_shape'] . '</p>';
        echo '<p class="hair-length">' . $row['hair_length'] . '</p>';
        echo '<p class="age-group">' . $row['age_group'] . '</p>';
        echo '<p class="gender">' . $row['gender'] . '</p>';
        // Add heart icon here
        echo '</div>';
        echo '<div class="heart-icon">';
        echo '<i class="fas fa-heart"></i>';
        echo '</div>';
        echo '</div>'; // Close card-content
        echo '</div>'; // Close card
        echo '</a>';
    }
    echo '</div>'; // Close card-container
} else {
    include "card.php"; // Display default content if no data is filtered
}
?>
