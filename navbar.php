<?php
?>
<style>
  /* Custom styles for the dropdown menu */
  .dropdown-menu {
    border: none; /* Remove default border */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Shadow on all directions */
  }

  /* Custom styles for the name label */
  .dropdown-menu .name-label {
    font-size: 14px; /* Adjust font size */
    padding: 10px 20px; /* Add padding */
  }

  /* Custom styles for dropdown items */
  .dropdown-menu .dropdown-item {
    padding: 10px 20px; /* Add padding */
  }
  /* Custom animation for navbar item transition */
.nav-animation {
    animation: slideIn 1200ms forwards ease-in-out;
    opacity: 0;
}

@keyframes slideIn {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

</style>

<nav class="navbar navbar-expand-lg bg-body-tertiary nav-animation">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="images/logo4.png" class="image" alt="Cannot Display"/></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 font">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Gallery.php">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="addYourOwn.php">Add your own</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Contact.php">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="about.php">About</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto"> <!-- Right-aligned items -->
        <li class="nav-item dropdown"> <!-- Dropdown menu -->
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['user_email']; ?> <!-- Display user's email -->
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item name-label" href="#"><?php echo $_SESSION['user_name']; ?></a></li>

            <!--<li><button class="dropdown-item" onclick="#">Liked Hairstyles</button></li>-->
            <li><button class="dropdown-item" onclick="window.location.href = 'login.php';">Logout</button></li> <!-- Logout option -->
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
