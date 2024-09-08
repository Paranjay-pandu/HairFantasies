<?php
session_start();

// Initialize like count and status
$likeCount = isset($_SESSION['likeCount']) ? $_SESSION['likeCount'] : 0;
$isLiked = isset($_SESSION['isLiked']) ? $_SESSION['isLiked'] : false;

if (isset($_POST['action']) && $_POST['action'] === 'toggleLike') {
    $isLiked = !$isLiked;
    $_SESSION['isLiked'] = $isLiked;
    // Update like count if needed
    if ($isLiked) {
        $likeCount++;
    } else {
        $likeCount--;
    }
    $_SESSION['likeCount'] = $likeCount;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Like Button</title>
  <!-- Add Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    .like-card {
      width: 200px; /* Set the width of the card */
      height: 200px; /* Set the height of the card */
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      transition: transform 0.3s ease-in-out;
    }

    .like-card:hover {
      transform: scale(0.9); /* Scale down on hover */
    }

    .like-button {
      transition: color 0.3s ease-in-out; /* Add transition effect for color change */
    }

    .like-button.like-button:click {
      color: red; /* Change color on hover to indicate interactivity */
    }
  </style>
</head>
<body>

<div class="like-card" onclick="toggleLike()">
  <i id="heart-icon" class="<?php echo $isLiked ? 'fas' : 'far'; ?> fa-heart fa-4x like-button"></i> <!-- Font Awesome heart icon -->
</div>

<script>
  function toggleLike() {
    const heartIcon = document.getElementById("heart-icon");

    // Toggle the like status
    heartIcon.classList.toggle("far");
    heartIcon.classList.toggle("fas");

    // Send AJAX request to PHP to toggle like
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Update session variables if needed (optional)
        const response = JSON.parse(xhr.responseText);
        // You can handle any additional logic here if required
      }
    };
    xhr.send("action=toggleLike");
  }
</script>
</body>
</html>
