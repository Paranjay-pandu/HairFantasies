<div class="card-container">
    <?php
    require_once 'connection.php';
    $sql = "SELECT 
                a.hfimage,
                f.fc_name AS face_shape,
                l.len_name AS hair_length,
                ag.age_name AS age_group,
                g.gender_name AS gender,
                a.hfname  -- Assuming this is the hairstyle name column
            FROM 
                all_hairstyles a
            JOIN 
                hfface f ON a.fc_id = f.fc_id
            JOIN 
                hflength l ON a.len_id = l.len_id
            JOIN 
                hfage ag ON a.age_id = ag.age_id
            JOIN 
                hfgender g ON a.gender_id = g.gender_id";
    
    $result = $con->query($sql);
    while ($row = $result->fetch_assoc()) {
        // Using hfimage directly as the image source
        $image_src = $row['hfimage'];
    ?>
        <a href="#" class="card-link">
            <div class="card font">
                <div class="card-content">
                    <div class="left-content">
                        <img src="<?php echo $image_src ?>" class="card-img-left" alt="...">
                        <div class="heart-icon">
                            <i class="fa-regular fa-heart"></i>
                        </div>
                    </div>
                    <div class="right-content">
                        <h5 class="hairstyle"><?php echo $row['hfname'] ?></h5>
                        <p class="face-shape"><?php echo $row['face_shape'] ?></p>
                        <p class="hair-length"><?php echo $row['hair_length'] ?></p>
                    </div>
                </div>
            </div>
        </a>
    <?php
    }
    ?>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
</html>
