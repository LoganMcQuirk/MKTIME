<?php

include ('../includes/accessible.php');

include ('../includes/navbar.php');
?>
<main class="container mt-4 mb-4 d-flex flex-column align-items-start">
<h1>Products</h1>

<?php
 # Open database connection.
	require ( '../config/connect_db.php' );
	echo '<div class="row">';	
	# Retrieve items from 'product' database table.
	$q = "SELECT * FROM product" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{
	# Display body section.
	
	while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
	{
	echo '
    <div class="row-md-3 d-flex justify-content-center">
	 <div class="card" style="width: 18rem;">
	  <img src="'. $row['product_img'].'" class="card-img-top" alt="'. $row['product_name'].'">
	   <div class="card-body text-center">
		<h5 class="card-title">'. $row['product_name'].'</h5>
		<p class="card-text">'. $row['description'].'</p>
	 </div>
	  <div class="card-footer bg-transparent border-dark text-center">
		<p class="card-text">&pound '. $row['price'].'</p>
	  </div>
	  <div class="card-footer text-muted">
		<a href="../cart/added.php?id='.$row['product_id'].'" class="btn btn-light btn-block">Add to Cart</a>
	   </div>
	  </div>
	</div>  
	';
	}
	# Close database connection.
	mysqli_close( $link) ; 
	}
	# Or display message.
	else { echo '<p>There are currently no items in the table to display.</p>
	' ; }
?>


</main>

<?php
    include ('../includes/footer.php');
?>