
<?php

// Check if a session is active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Include database connection
include 'connection.php';
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email and password from form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // SQL to retrieve the encrypted password from the database
    $sql = "SELECT user_password FROM hfuser WHERE user_email = '$email'";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        // Fetch the encrypted password
        $row = $result->fetch_assoc();
        $hashed_password = $row['user_password'];
        
        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct
            // Retrieve user details
            $sql = "SELECT * FROM hfuser WHERE user_email = '$email'";
            $result = $con->query($sql);

            // If result has one row, credentials are correct
            if ($result->num_rows == 1) {
                // Fetch user details
                $row = $result->fetch_assoc();
                
                // Set session variables
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['user_email'] = $row['user_email'];

                // Redirect to dashboard or any other page
                header("Location: index.php");
                exit();
            }
        } else {
            // Incorrect credentials
            echo "<script>alert('Invalid email or password. if new user try registering first.')</script>";
        }
    } else {
        // Incorrect credentials
        echo "<script>alert('Invalid email or password. if new user try registering first.')</script>";
    }
}
?>

<?php include 'included.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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
    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="password"] {
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
    .form-group input[type="submit"],
    .form-group input[type="button"] {
        background-color: #808080; /* Grey color */
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .form-group input[type="submit"]:hover,
    .form-group input[type="button"]:hover {
        background-color: #000; /* Black color on hover */
    }

    </style>
</head>
<body>
<header>
        <h1 class="font nav-animation">Hair Fantasies</h1>
    </header>
    <!-- Login Card -->
    <div class="card nav-animation">
        <h2>Login Form</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
                <!-- Change type to "button" to prevent form submission -->
                <input type="button" value="Register" onclick="location.href='Register.php';">
            </div>
        </form>
    </div>
</body>
</html>
<?php include'footer.php'; ?>