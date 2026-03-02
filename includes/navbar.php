
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MK TIME</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
crossorigin="anonymous">
</head>

<body>
<?php
# Get current page filename
$current_page = basename($_SERVER['PHP_SELF']);
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">MK Time</a>
  <button class="navbar-toggler" type="button" 
    data-toggle="collapse" 
    data-target="#navbarNav" 
    aria-controls="navbarNav" 
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php 
        include ('../auth/user_type.php');
        if ( isset( $_SESSION[ 'email' ] ) && adminCheck( $_SESSION[ 'email' ] ) )
        { include ('../includes/admin_nav.php'); }
        else if ( isset( $_SESSION[ 'email' ] ) ) { include ('../includes/public_nav.php'); }
        ?>
      
    </ul>
      <span class="nav-item ml-auto text-center ">
        <a data-cy="logout-nav-link" class="nav-link bg-dark text-white rounded" style="max-width: fit-content;" href="../auth/logout.php">Logout</a>
      </span>
  </div>
</nav>