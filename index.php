<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HairFantasies</title>
    <style>
        img {
            opacity: 0; /* Start with the image hidden */
            transform: skewX(0.3);
            width: 50%; /* Set the width of the image to 50% of its original size */
            height: auto; /* Allow the height to adjust automatically to maintain aspect ratio */
            animation: fadeInImage 1s ease-in-out forwards; /* Apply fade-in animation */
        }

        .container {
            opacity: 0; /* Start with the text container hidden */
            animation: fadeInContainer 1s ease-in-out forwards; /* Apply fade-in animation for the container */
        }

        .fade-in {
            opacity: 0; /* Start with the text hidden */
            animation: slideIn 0.5s ease-out forwards; /* Apply slide-in animation for each line of text */
        }

        @keyframes fadeInImage {
            from {
                opacity: 0;
            }
            to {
                opacity: 0.85;
            }
        }

        @keyframes fadeInContainer {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body>
    <div class="center" style="background-color: black">
        <img src="hfindex.png" alt="Cannot display">
    </div>

    <div class="container font">
        <h1>Welcome to HairFantasies</h1>
        <p class="fade-in">Discover the perfect hairstyle that suits your unique features and personality with HairFantasies. Whether you're looking for a bold new look or a subtle change, we've got you covered. Our intuitive recommendation system helps you find hairstyles based on your face shape, gender, and hair length, ensuring that you always look and feel your best.</p>
        <p class="fade-in">How It Works</p>
        <ol>
            <li class="fade-in">Choose your face shape, gender, and hair length.</li>
            <li class="fade-in">Explore our curated selection of hairstyles tailored to your preferences.</li>
            <li class="fade-in">Select your favorite hairstyle and get styling tips and recommendations.</li>
            <li class="fade-in">Ready to try out your new look? Take a photo and share it with friends and family!</li>
        </ol>
        <p class="fade-in">Get Inspired</p>
        <p class="fade-in">Need some inspiration for your next hairstyle? Check out our gallery of stunning hairstyles created by our community members. Whether you're into short pixie cuts, long flowing locks, or anything in between, you'll find endless inspiration to fuel your hair fantasies.</p>
        <p class="fade-in">Join the Community</p>
        <p class="fade-in">Ready to share your own hairstyle creations with the world? Join our community of hairstyling enthusiasts and showcase your talent. Whether you're a professional hairstylist or a DIY enthusiast, everyone is welcome to share their unique hairstyles and inspire others.</p>
        <p class="fade-in">Start your journey to fabulous hair today with HairFantasies!</p>
    </div>

    <?php include 'footer.php'; ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var container = document.querySelector('.container');
            var paragraphs = document.querySelectorAll('.fade-in');

            // Calculate delay for each line based on the total number of lines and animation duration
            var totalDelay = 50; // Initial delay before starting animation
            var animationDuration = 100; // Duration of each line animation
            var lineDelay = 10; // Delay between each line
            paragraphs.forEach(function(paragraph, index) {
                paragraph.style.animationDelay = totalDelay + 'ms';
                totalDelay += animationDuration + lineDelay;
            });

            // Set opacity to 1 to trigger fade-in animation for the text container
            container.style.opacity = 1;
        });
    </script>
</body>
</html>
