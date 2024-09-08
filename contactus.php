<?php 
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Art And Gallery Management</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
    /* Add some padding to the top and center the form vertically within the container */
    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    /* Custom class for the navigation bar */
    .custom-navbar {
        background-color: #D2B48C; /* Light brown color */
    }

    /* Rest of the styles remain unchanged */
    .container {
        max-width: 300px;
        margin: auto;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        padding: 20px;
        border-radius: 10px;
        background-color: #fff;
        animation: fadeInUp 1s ease-out;
    }

    

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
    }

    .btn-submit {
        background-color: #007bff;
        color: #fff;
    }

    .btn-submit:hover {
        background-color: #0056b3;
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
</head>
<body>
  <nav class="navbar navbar-expand-lg custom-navbar fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php"><i class="fa-solid fa-house-chimney"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact_us.php"><i class="fa-solid fa-envelope"></i> Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about_us.php"><i class="fa-solid fa-users"></i> About Us</a>
          </li>
          <li class="nav-item">
            <a href="cart.php" class="nav-link"><i class="fa-solid fa-cart-shopping"></i> My Cart</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa fa-user"></i> Login
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <div class="card" style="width: 18rem; text-align: center;">
                <div class="d-flex justify-content-center align-items-center" style="height: 100px; background-color: #f8f9fa;">
                  <img src="media/user.png" alt="Logo" style="width: 60px; height: 60px; border-radius: 50%;">
                </div>

                <div class="card-body">
                  <h3 class="card-text mb-3"><?php echo $userName; ?></h3>
                  <h6 class="card-text mb-3"><?php echo isset($_SESSION['user_email']) ? $userEmail : "Unknown"; ?></h6>

                  <?php
                  if (isset($_SESSION['user_email'])) {
                    echo '<form method="post" action=""><button type="submit" class="btn btn-danger mt-3" name="logout">Logout</button></form>';
                  } else {
                    echo '<button type="button" class="btn btn-warning mt-3" onclick="redirectToLoginPage();">Login</button>';
                  }
                  ?>
                </div>
              </div>
            </ul>
          </li>
        </ul>
        <form class="d-flex" method="post" action="search.php" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
          <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="container">
    <h2 class="text-center mb-3">Contact Us</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="email">Your Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="message">Your Message:</label>
            <textarea class="form-control" id="message" rows="3" name="message" placeholder="Enter your message"></textarea>
        </div>
        <button type="submit" class="btn btn-submit btn-block">Submit</button>
        <!-- WhatsApp icon and link -->
        <a href="https://wa.me/8088137341" target="_blank" class="whatsapp-link">
            <i class="fab fa-whatsapp whatsapp-icon"></i> Chat on WhatsApp
        </a>
    </form>
</div>

<!-- Bootstrap JS and jQuery (Optional, if needed) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Font Awesome icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>

  <!-- Your new website content goes here -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
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
        $mail->addAddress('paranjaypandu@gmail.com', 'Paranjay');

        $mail->isHTML(true);
        $mail->Subject = 'Contact Form Submission';
        $mail->Body    = '<html><body>
            <h4>Dear Sir/Madam,</h4><br>
            <h3>Welcome To HairFantasies</h3><br>
            <h4>Name is: ' . $name . '</h4>
            <h4>Email is: ' . $email . '</h4>
            <h2>Message is: ' . $message . '</h2>
            </body></html>';

        $mail->send();
        echo 'Message has been sent successfully';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<script>
function redirectToLoginPage() {
      window.location.href = 'login.php';
    }
    </script>
</body>
</html>