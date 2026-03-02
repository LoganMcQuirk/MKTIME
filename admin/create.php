
<?php


 include ('../includes/accessible.php');
 # Include navigation 
 include ( '../includes/navbar.php' ) ;

 ?>
 


<?php
        if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
	{
	  # Connect to the database.
	  require ('../config/connect_db.php'); 

  # Initialize an error array.
  $errors = array();

  # Check for item name .
  if ( empty( $_POST[ 'product_name' ] ) )
  { $errors[] = 'Enter the item name.' ; }
  else
  { $n = mysqli_real_escape_string( $link, trim( $_POST[ 'product_name' ] ) ) ; }

  # Check for a item decription.
  if (empty( $_POST[ 'description' ] ) )
  { $errors[] = 'Enter the item decription.' ; }
  else
  { $d = mysqli_real_escape_string( $link, trim( $_POST[ 'description' ] ) ) ; }
  
  # Check for a item image.
  if (empty( $_POST[ 'product_img' ] ) )
  { $errors[] = 'Enter the item image.' ; }
  else
  { $img = mysqli_real_escape_string( $link, trim( $_POST[ 'product_img' ] ) ) ; }
  
  # Check for a item price.
  if (empty( $_POST[ 'price' ] ) )
  { $errors[] = 'Enter the item price.' ; }
  else
  { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'price' ] ) ) ; }

	
   # On success data into my_table on database.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO product (product_name, description, product_img, price) 
	VALUES ('$n','$d', '$img', '$p' )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '<p>New record created successfully</p>'; }
  
    # Close database connection.
    mysqli_close($link); 

    exit();
    header("Location: read.php");

  }
   
  # Or report errors.
  else 
  {
    echo '<p>The following error(s) occurred:</p>' ;
    foreach ( $errors as $msg )
    { echo "$msg<br>" ; }
    echo '<p>Please try again.</p></div>';
    # Close database connection.
    mysqli_close( $link );
    
    
	
  }  
}
?>
<div class="container mt-4">

    <h1>Add Item</h1>
	<form action="create.php" method="post" >
	  <!-- input box for item name  -->
	  <label for="name">Item Name:</label>
	  <input type="text" 
	  id="product_name" 
	  class="form-control" 
	  name="product_name" 
	  required 
	  value="<?php if (isset($_POST['product_name'])) echo $_POST['product_name']; ?> ">
	  
	  <!-- input box for item description -->  
	  <label for="description">Description:</label>
	  <textarea id="description" 
	  class="form-control" 
	  name="description" 
	  required 
	  value="<?php if (isset($_POST['description'])) echo $_POST['description']; ?>">
	  </textarea>
	  
	 <!-- input box for image path -->
	 <label for="image">Image:</label>
	 <input type="text" 
	 id="product_img" 
	 class="form-control" 
	 name="product_img" 
	 required 
	 value="<?php if (isset($_POST['product_img'])) echo $_POST['product_img']; ?>">
	 
	 <!-- input box for item price -->
	 <label for="price">Price:</label>
	 <input 
	 type="number" 
	 id="price" 
	 class="form-control" 
	 name="price" 
	 min="0" step="0.01" 
	 required 
	 value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>"><br>
	  <!-- submit button -->
     <input type="submit" class="btn btn-dark" value="Submit">
	</form>
</div>

