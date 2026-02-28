<?php
# Include navigation 
include ( '../includes/navbar.php' ) ;


if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
    {
    # Connect to the database.
    require ('../config/connect_db.php'); 

        # Initialize an error array.
        $errors = array();

        # Check for a item name.
        if ( empty( $_POST[ 'item_id' ] ) )
        { $errors[] = 'Update item ID.' ; }
        else
        { $id = mysqli_real_escape_string( $link, trim( $_POST[ 'item_id' ] ) ) ; }
        
        # Check for a item name.
        if ( empty( $_POST[ 'item_name' ] ) )
        { $errors[] = 'Update item name.' ; }
        else
        { $n = mysqli_real_escape_string( $link, trim( $_POST[ 'item_name' ] ) ) ; }

        # Check for a item description.
        if (empty( $_POST[ 'item_desc' ] ) )
        { $errors[] = 'Update item description.' ; }
        else
        { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'item_desc' ] ) ) ; }

        # Check for a item price.
        if (empty( $_POST[ 'item_img' ] ) )
        { $errors[] = 'Update image address.' ; }
        else
        { $img = mysqli_real_escape_string( $link, trim( $_POST[ 'item_img' ] ) ) ; }
        
        # Check for a item price.
        if (empty( $_POST[ 'item_price' ] ) )
        { $errors[] = 'Update item price.' ; }
        else
        { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'item_price' ] ) ) ; }

        if ( empty( $errors ) ) 
        {
            $q = "UPDATE products SET item_id='$id',item_name='$n', item_desc='$d', item_img='$img', item_price='$p'  WHERE item_id='$id'";
            $r = @mysqli_query ( $link, $q ) ;
            if ($r)
        {
        header("Location: read.php");
        } else {
            echo "Error updating record: " . $link->error;
        }

        # Close database connection.
        mysqli_close( $link );
        } 
    }
?>

<div class="container mt-4">
    <h2 class="text-center">Update Item</h2>
<form action="update.php" method="post" class="m-10">
    <label for="item_id">Item ID:</label>
    <input type="text" name="item_id" class="form-control" 
    value="<?php if (isset($_POST['item_id'])) echo $_POST['item_id']; ?>">
    <label for="item_name">Item Name:</label>
    <input type="text" name="item_name" class="form-control" 
    value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?>">
    <label for="item_description">Item Description:</label>
    <input type="text" name="item_desc" class="form-control" 
    value="<?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?>">
    <label for="item_img">Item Image:</label>
    <input type="text" name="item_img" class="form-control" 
    value="<?php if (isset($_POST['item_img'])) echo $_POST['item_img']; ?>">
    <label for="item_price">Item Price:</label>
    <input type="text" name="item_price" class="form-control" 
    value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>">

    <button type="submit" class="btn btn-dark mt-4">Update Item</button>
    <button type="reset" class="btn btn-outline-dark mt-4">Reset Form</button>
</form>
</div>

<?php
include ('../includes/footer.php');
?>