<?php   

    include ('../includes/accessible.php');
    include ('../config/connect_db.php') ;

    include ('cart.php');
    if ( isset( $_GET['id'] ) ) $id = $_GET['id'];

    $q = "SELECT * FROM product WHERE product_id = $id";
    $r = mysqli_query( $link, $q );

    if ( mysqli_num_rows( $r ) == 1 ) {
    $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );
    // Product details are fetched and stored in $row
    # Check if cart already contains one of this product id.
        if ( isset( $_SESSION['cart'][$id] ) )
        { 
            # Add one more of this product.
            $_SESSION['cart'][$id]['quantity']++; 
            echo '
            <div class="container">
                    <div class="alert alert-secondary" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p>Another '.$row["product_name"].' has been added to your cart</p>
                        <a href="../products/home.php">Continue Shopping</a> | <a href="cart.php">View Your Cart</a>
                    </div>
                </div>';
        } 
        else
        {
            # Or add one of this product to the cart.
            $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['price'] ) ;
            echo '<div class="container">
                    <div class="alert alert-secondary" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p>A '.$row["product_name"].' has been added to your cart</p>
                    <a href="../products/home.php">Continue Shopping</a> | <a href="cart.php">View Your Cart</a>
                    </div>
                </div>' ;
        }
    }
    
    # Close database connection.
    mysqli_close( $link ) ;

    include ('../includes/footer.php');

    

?>

<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }
?>