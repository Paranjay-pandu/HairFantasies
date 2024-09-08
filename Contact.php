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
    .form-group input[type="text"], .form-group input[type="email"], .form-group textarea {
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
        color: #fff;
        border: none;
        padding: 8px 15px;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.3s;
        border-radius: 5px;
    }

    input[type="submit"]:hover {
        background-color: #000; /* Black color on hover */
    }
    .whatsapp-icon {
        font-size: 24px;
        color: #25D366;
    }

    .whatsapp-link {
        text-decoration: none;
        color: #25D366;
        margin-top: 10px;
        display: block;
    }
</style>

<body>

    <!-- Contact Card -->
    <div class="font card container-upload nav-animation">
        <h2>Contact Us</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea name="message" id="message" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
            <a href="https://wa.me/+918310567015" target="_blank" class="whatsapp-link">
                <i class="fab fa-whatsapp whatsapp-icon"></i> Chat on WhatsApp
            </a>
        </form>
    </div>

    <?php 
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Create an instance; passing true enables exceptions
$mail = new PHPMailer(true);

// Sanitize and store data in variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Access form data using $_POST
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Send data
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'paranjaypandu133@gmail.com';
        $mail->Password   = 'qiyo agqg hpkf vtfl'; // Add your Gmail password here
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('paranjaypandu133@gmail.com', 'HairFantasies');
        $mail->addAddress('paranjaypandu133@gmail.com', 'Paranjay');

        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Submission';
        $mail->Body    = '<html><body>
            <h4>The message to</h4><br>
            <h3>HairFantasies</h3><br>
            <h4>was from:</h4><br>
            <h4>Name is: ' . $name . '</h4>
            <h4>Email is: ' . $email . '</h4>
            <h2>Message is: ' . $message . '</h2>
            </body></html>';

        $mail->send();
        echo '<script>alert("Message has been sent successfully")</script>';
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}')</script>;";
    }
}
?>
</body>

<?php
    include 'footer.php';
?>
