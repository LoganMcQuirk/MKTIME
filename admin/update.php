<?php

 include ('../includes/accessible.php');
# Include navigation 
include ( '../includes/navbar.php' ) ;


if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
    {
    # Connect to the database.
    require ('../config/connect_db.php'); 

        # Initialize an error array.
        $errors = array();

        # Check for a item name.
        if ( empty( $_POST[ 'product_id' ] ) )
        { $errors[] = 'Update item ID.' ; }
        else
        { $id = mysqli_real_escape_string( $link, trim( $_POST[ 'product_id' ] ) ) ; }
        
        # Check for a item name.
        if ( empty( $_POST[ 'product_name' ] ) )
        { $errors[] = 'Update item name.' ; }
        else
        { $n = mysqli_real_escape_string( $link, trim( $_POST[ 'product_name' ] ) ) ; }

        # Check for a item description.
        if (empty( $_POST[ 'description' ] ) )
        { $errors[] = 'Update item description.' ; }
        else
        { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'description' ] ) ) ; }

        # Check for a item price.
        if (empty( $_POST[ 'product_img' ] ) )
        { $errors[] = 'Update image address.' ; }
        else
        { $img = mysqli_real_escape_string( $link, trim( $_POST[ 'product_img' ] ) ) ; }
        
        # Check for a item price.
        if (empty( $_POST[ 'price' ] ) )
        { $errors[] = 'Update item price.' ; }
        else
        { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'price' ] ) ) ; }

        if ( empty( $errors ) ) 
        {
            $q = "UPDATE product SET product_name='$n', description='$d', product_img='$img', price='$p'  WHERE product_id='$id'";
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
    <label for="product_id">Item ID:</label>
    <input type="text" name="product_id" class="form-control" 
    value="<?php if (isset($_POST['product_id'])) echo $_POST['product_id']; ?>">
    <label for="product_name">Item Name:</label>
    <input type="text" name="product_name" class="form-control" 
    value="<?php if (isset($_POST['product_name'])) echo $_POST['product_name']; ?>">
    <label for="description">Item Description:</label>
    <input type="text" name="description" class="form-control" 
    value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>">
    <label for="product_img">Item Image:</label>
    <input type="text" name="product_img" class="form-control" 
    value="<?php if (isset($_POST['product_img'])) echo $_POST['product_img']; ?>">
    <label for="price">Item Price:</label>
    <input type="text" name="price" class="form-control" 
    value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>">

    <button type="submit" class="btn btn-dark mt-4">Update Item</button>
    <button type="reset" class="btn btn-outline-dark mt-4">Reset Form</button>
</form>
</div>

<?php
include ('../includes/footer.php');
?>