<!-- Liked.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liked Hairstyles</title>
    <style>
        /* Styling for the content */
        .liked-content {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            z-index: 999; /* Ensure the content appears above other elements */
            display: none; /* Initially hide the content */
        }

        .liked-inner-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="liked-content" id="likedContent">
        <div class="liked-inner-content">
            <!-- Content of liked hairstyles goes here -->
            <h2>Liked Hairstyles</h2>
            <p>This is where your liked hairstyles will be displayed.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <!-- Close button -->
            <span class="close-btn" onclick="closeLikedContent()">Close</span>
        </div>
    </div>

    <script>
        // Function to display the liked content
        function showLikedContent() {
            document.getElementById('likedContent').style.display = 'block';
        }

        // Function to close the liked content
        function closeLikedContent() {
            document.getElementById('likedContent').style.display = 'none';
        }
    </script>
</body>
</html>
