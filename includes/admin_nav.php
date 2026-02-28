
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
      <li class="nav-item <?php echo ($current_page == 'home.php') ? 'active' : ''; ?>">
        <a class="nav-link" href="../products/home.php">Home</a>
      </li>
      <li class="nav-item <?php echo ($current_page == 'create.php') ? 'active' : ''; ?>">
        <a class="nav-link" href="../admin/create.php">Create</a>
      </li>
      <li class="nav-item <?php echo ($current_page == 'read.php') ? 'active' : ''; ?>">
        <a class="nav-link" href="../admin/read.php">Read</a>
      </li>
      <li class="nav-item <?php echo ($current_page == 'update.php') ? 'active' : ''; ?>">
        <a class="nav-link" href="../admin/update.php">Update</a>
      </li>
      <li class="nav-item <?php echo ($current_page == 'delete.php') ? 'active' : ''; ?>">
        <a class="nav-link" href="../admin/delete.php">Delete</a>
      </li>
    </ul>
      <span class="nav-item ml-auto text-center ">
        <a class="nav-link bg-dark text-white rounded nav-pills" style="max-width: fit-content;" href="../auth/logout.php">Logout</a>
      </span>
  </div>
</nav>