<li class="nav-item <?php echo ($current_page == "home.php") ? "active" : ""; ?>">
  <a class="nav-link" href="../products/home.php">Home</a>
</li>
<li data-cy="admin-nav"  class="nav-item <?php echo ($current_page == "create.php") ? "active" : ""; ?>">
  <a data-cy="create-nav-link" class="nav-link" href="../admin/create.php">Create</a>
</li>
<li class="nav-item <?php echo ($current_page == "read.php") ? "active" : ""; ?>">
  <a data-cy="read-nav-link" class="nav-link" href="../admin/read.php">Read</a>
</li>
<li class="nav-item <?php echo ($current_page == "update.php") ? "active" : ""; ?>">
  <a data-cy="update-nav-link" class="nav-link" href="../admin/update.php">Update</a>
</li>
<li class="nav-item <?php echo ($current_page == "delete.php") ? "active" : ""; ?>">
  <a data-cy="delete-nav-link" class="nav-link" href="../admin/delete.php">Delete</a>
</li>
