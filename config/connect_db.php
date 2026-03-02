<?php # Connect to mySQL database.

    # Connect on localhost
    $link = mysqli_connect('localhost', 'root', '', 'MKTIME');
    if (!$link) {
        die('Could not connect: ' . mysqli_error());
    }
?>