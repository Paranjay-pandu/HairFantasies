<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<head>
    <head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #fff;
            color: #000;
        }

        header {
            background-color: #000;
            color: white;
            text-align: center;
            padding: 1em;
        }

        nav {
            background-color: #333;
            padding: 1em;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 0.5em 1em;
            margin: 0 1em;
            display: inline-block;
            transition: color 0.3s; /* Add transition for smooth effect */
        }
        

        .card-link {
            width: calc(33.33% - 20px); /* Ensure each card takes up 1/3rd of the screen width with some padding */
            display: inline-block; /* Ensure the anchor tag covers the entire card */
            box-sizing: border-box; /* Include padding and border in the element's total width and height */
            padding: 10px; /* Adjust padding as needed */
            text-decoration: none; /* Remove default underline for anchor tag */
            vertical-align: top; /* Align cards to the top */
        }

        .card-link .card {
            transition: transform 0.3s ease; /* Add a smooth transition effect */
            width: 100%; /* Make the card take up full width */
            height: auto; /* Allow the height to adjust based on content */
        }

        .card-link:hover .card {
            transform: scale(0.95); /* Shrink the card on hover */
        }

        .card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden; /* Ensure the content doesn't overflow */
            height: auto; /* Allow the height to adjust based on content */
        }

        .card-content {
            display: flex; /* Use flexbox for layout */
        }

        .left-content {
            width: 50%; /* Left part takes up 50% of the card width */
            padding-right: 10px; /* Add padding as needed */
        }

        .card-img-left {
            max-width: 100%; /* Ensure the image doesn't exceed its container */
            height: auto; /* Allow the height to adjust based on content */
            display: block; /* Remove default inline-block spacing */
        }

        .right-content {
            width: 50%; /* Right part takes up 50% of the card width */
            padding-left: 10px; /* Add padding as needed */
        }

        .right-content h5,
        .right-content p {
            margin: 0; /* Remove default margin */
        }

        .right-content h5 {
            font-size: 1.2em; /* Adjust font size as needed */
        }

        .right-content p {
            font-size: 0.9em; /* Adjust font size as needed */
        }

        .right-content h5 {
            margin-bottom: 5px; /* Add spacing between elements */
        }

        .right-content p {
            margin-bottom: 3px; /* Add spacing between elements */
        }

        /* Add a vertical line to divide the left and right content */
        .card-content::after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 1px;
            background-color: #ccc;
            z-index: 1; /* Ensure the line appears above the content */
        }





        nav a:hover {
            color: #000000; /* Change the text color on hover */
        }

        main {
            padding: 2em;
        }
        /* Custom animation for fading in and returning to original position */

        section {
            margin-bottom: 2em;
        }.nav-animation {
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

        footer {
            background-color: #000;
            color: white;
            text-align: center;
            padding: 1em;
    left: 0;
    bottom: 0;
        }
        .center{
            text-align: center;
            padding: 1em;
        }
        .navbar-nav .nav-link:hover {
            color: lightslategray;
        }
        .font{
            font-family: cursive;
        }
        .round-corners{
            border: 1px;
        }
        .image{
            padding-bottom: 0px;
            padding-top: 0px;
            height: 50px;
            width: auto;

        }
    
    @media (max-width: 992px) {
        .card {
            width: calc(33.333% - 20px); /* Adjust width as needed for medium screens */
        }
    }
    
    @media (max-width: 768px) {
        .card {
            width: calc(50% - 20px); /* Adjust width as needed for small screens */
        }
    }
    
    @media (max-width: 576px) {
        .card {
            width: 100%; /* Full width for extra small screens */
            margin-right: 0; /* Remove margin-right for extra small screens */
        }
    }
        /* Responsive Styles */
        @media only screen and (max-width: 600px) {
            nav {
                display: block;
            }

            nav a {
                display: block;
                margin-bottom: 0.5em;
            }
        }
    </style>
    </head>
</head>