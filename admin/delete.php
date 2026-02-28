<?php
# Include navbar with HTML structure.
include ( '../includes/navbar.php' ) ;

# Open database connection.
require ( '../config/connect_db.php' ) ;


if (isset($_GET['item_id'])) {
    $id = $_GET['item_id'];
    
    # Delete the product if item_id is provided
    $sql = "DELETE FROM products WHERE item_id='$id'";
    if ($link->query($sql) === TRUE) {
        header("Location: read.php");
    } else {
        echo "Error deleting record: " . $link->error;
    }
}

# Display table of products from database based on query with a delete button at the end of each row
    $sql = "SELECT * FROM products";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        echo "<table class='table table-striped'><tr><th>ID</th><th>Name</th><th>Description</th><th>Image</th><th>Price</th><th>Action</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["item_id"]. "</td><td>" . $row["item_name"]. "</td><td>" . $row["item_desc"]. "</td><td>" . $row["item_img"]. "</td><td>" . $row["item_price"]. "</td><td><a href='delete.php?item_id=" . $row["item_id"] . "' class='btn btn-danger'>Delete</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }



# Close database connection.
$link->close();
?>

<?php include ( '../includes/footer.php' ) ; ?>


