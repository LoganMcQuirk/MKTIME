<?php

 include ('../includes/accessible.php');

 include '../includes/navbar.php';
 # Open database connection.
	require ( '../config/connect_db.php' );
    # Retrieve items from 'products' database table.
	$q = "SELECT * FROM product" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 ) {
      # Display items in a table.
    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC )) {
        
        echo '
        <div class="col-md-3 justify-content-center">
            <div class="card" style="width: 18rem;">
            <img src='. $row['product_img'].' class="card-img-top" alt="Product">
            <div class="card-body">
            <h5 class="card-title text-center">' . $row['product_name'] .'</h5>
            <p class="card-text">'. $row['description'] . '</p>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item"><p class="text-center">&pound' . $row['price'] . '</p></li>
            <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block" href="update.php?id='.$row['product_id'].'">
            Update</a></li>
            <li class="list-group-item"><a class="btn btn-dark" href="delete.php?product_id='.$row['product_id'].'">
            Delete Item</a></li>
            </ul>
            </div>
            
        </div>';
        
        
	  }

    # Close database connection.
       mysqli_close( $link) ; 

    # Or display message.
}	else { echo '<p>There are currently no items in the table to display.</p>
	' ; }
	
        include ('../includes/footer.php');
?>