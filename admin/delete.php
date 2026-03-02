<?php
include ('../includes/accessible.php');
# Include navbar with HTML structure.
include ( '../includes/navbar.php' ) ;

# Open database connection.
require ( '../config/connect_db.php' ) ;


if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];
    
    # Delete the product if product_id is provided
    $sql = "DELETE FROM product WHERE product_id='$id'";
    if ($link->query($sql) === TRUE) {
        header("Location: read.php");
    } else {
        echo "Error deleting record: " . $link->error;
    }
}

# Display table of products from database based on query with a delete button at the end of each row
    $sql = "SELECT * FROM product";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        echo "<table class='table table-striped'><tr><th>ID</th><th>Name</th><th>Description</th><th>Image</th><th>Price</th><th>Action</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["product_id"]. "</td><td>" . $row["product_name"]. "</td><td>" . $row["description"]. "</td><td>" . $row["product_img"]. "</td><td>" . $row["price"]. "</td><td><a href='delete.php?product_id=" . $row["product_id"] . "' class='btn btn-danger'>Delete</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }



# Close database connection.
$link->close();
?>

<?php include ( '../includes/footer.php' ) ; ?>


