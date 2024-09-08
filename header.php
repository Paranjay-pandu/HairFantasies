<?php 
session_start();
if (isset($_SESSION['user_name']) && isset($_SESSION['user_email'])) {
    $user_name = $_SESSION['user_name'];
    $user_email = $_SESSION['user_email'];
} else {
    header("Location: login.php");
    exit();
}
include 'included.php';
?>
    <header>
        <h1 class="font nav-animation">Hair Fantasies</h1>
    </header>
<?php include 'navbar.php' ?>