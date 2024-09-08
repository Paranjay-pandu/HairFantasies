<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Add Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            width: calc(33.33% - 20px); /* Adjust width for three cards in a row */
            max-width: 300px; /* Maximum width for each card */
            height: 280px; /* Adjust height of the card */
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
            transition: transform 0.3s; /* Add transition for smooth transformation */
        }
        .card:hover {
            transform: scale(0.9); /* Scale down on hover */
        }
        .card-content {
            display: flex;
            align-items: center; /* Align content vertically */
            padding: 15px;
        }
        .card-img-left {
            width: 100px; /* Adjust image width */
            height: auto;
            margin-right: 20px; /* Add margin for spacing */
        }
        .heart-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            color: gray;
        }
        .hairstyle {
            margin: 0;
        }
        .face-shape,
        .hair-length {
            margin-top: 5px;
            margin-bottom: 0;
        }
        .card-link {
            text-decoration: none;
            color: inherit;
            cursor: pointer; /* Add cursor pointer for better UX */
        }
    </style>
</head>
<body>

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
        <div class="card font card-link" onclick="toggleLike(this)">
            <div class="card-content">
                <img src="<?php echo $image_src ?>" class="card-img-left" alt="...">
                <!-- Heart icon added here -->
                <div class="heart-icon">
                    <i class="<?php echo $isLiked ? 'fas' : 'far'; ?> fa-heart"></i>
                </div>
                <div class="right-content">
                    <h5 class="hairstyle"><?php echo $row['hfname'] ?></h5>
                    <p class="face-shape"><?php echo $row['face_shape'] ?></p>
                    <p class="hair-length"><?php echo $row['hair_length'] ?></p>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<script>
    function toggleLike(card) {
        // Toggle the like status
        const heartIcon = card.querySelector('.heart-icon i');
        heartIcon.classList.toggle('far');
        heartIcon.classList.toggle('fas');
    }
</script>

</body>
</html>
