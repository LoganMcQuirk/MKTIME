<?php
    include ('../includes/navbar.php');

    require ( '../config/connect_db.php' ) ;
    session_start();
    # Check if form has been submitted for update.
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
    {
    # Update changed quantity field values.
        foreach ( $_POST['qty'] as $item_id => $item_qty )
        {
            # Ensure values are integers.
            $id = (int) $item_id;
            $qty = (int) $item_qty;

            # Change quantity or delete if zero.
            if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
            elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
        }
    }
    # Initialise grand total variable.
        $total = 0; 

    if (!empty($_SESSION['cart'])) {
        # Open database connection.
        require ( '../config/connect_db.php' ) ;
        # Retrieve items from 'products' database table.
        $q = "SELECT * FROM products WHERE item_id IN (";
        foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
        $q = substr($q, 0, -1) . ') ORDER BY item_id ASC';
        $r = mysqli_query($link, $q);

        

        # Display body section with a form and a table.
        echo '<form action="cart.php" method="post">';
        while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
        {
            # Calculate sub-totals and grand total.
            $subtotal = $_SESSION['cart'][$row['item_id']]['quantity'] * $_SESSION['cart'][$row['item_id']]['price'];
            $total += $subtotal;

            echo "{$row['item_name']} 
            <input type=\"text\" 
                size=\"3\" 
                name=\"qty[{$row['item_id']}]\" 
                value=\"{$_SESSION['cart'][$row['item_id']]['quantity']}\">
            <br>@ {$row['item_price']} = 
            
            <br> &pound ".number_format ($subtotal, 2)." ";

            # Display the total.
            echo ' <p>Total = &pound '.number_format($total,2).'</p>
                    <p><input type="submit" name="submit" class="btn btn-light btn-block" value="Update My Cart"></p>
                <br>
                    <a href="checkout.php?total='.$total.'" class="btn btn-light btn-block">Checkout Now</a><br>
            </form>';

        }
    
    }
    else { echo '<p>Your cart is currently empty.</p>'; }


?>

