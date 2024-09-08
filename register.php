<?php
    // Include header
    include 'included.php';
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

    input[type="submit"] {
        background-color: #808080; /* Grey color */
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 3px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #000; /* Black color on hover */
    }
</style>

<body>
<header>
        <h1 class="font nav-animation">Hair Fantasies</h1>
    </header>
    <div class="card nav-animation">
        <h2>Registration Form</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <!-- Change type to "submit" for registration -->
                <input type="submit" value="Register">
            </div>
        </form>
    </div>
</body>

<?php
// Include database connection file
include_once 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password != $confirm_password) {
        echo '<script>alert("Passwords do not match.")</script>';
        exit; // Stop further execution
    }

    // Check if the email already exists in the database
    $check_email_query = "SELECT * FROM hfuser WHERE user_email = '$email'";
    $result = mysqli_query($con, $check_email_query);
    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("Email already exists. Please register with a different email.")</script>';
        exit; // Stop further execution
    }

    // Encrypt the password before storing it in the database
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

    // Start or resume the session
    session_start();

    // Set session variables
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;

    // Insert user details into the database
    $insert = "INSERT INTO hfuser (user_name, user_email, user_password) VALUES ('$name', '$email', '$encrypted_password')";
    $query = mysqli_query($con, $insert);
    
    if ($query) {
        // Redirect to login.php after successful registration
        echo '<script>alert("User registered successfully.")</script>';
        echo '<script>window.location.href = "login.php";</script>';
    } else {
        echo '<script>alert("Error registering user.")</script>';
    }
}
?>


<?php
    include 'footer.php';
?>
