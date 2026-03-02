<?php


$admin = [ 
    'adminben@mktime.com', 
    'adminsally@mktime.com',
    'admin@admin.admin' ];
    


function adminCheck( $email ) 
    {
    require ( '../config/connect_db.php' ) ;
    $q = "SELECT email FROM user WHERE email='$email'";
    $r = mysqli_query( $link, $q ) ;
    if ( mysqli_num_rows( $r ) > 0 ) {
        $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );
        if ( in_array( $row[ 'email' ], $GLOBALS[ 'admin' ] ) ) { return true; }
        else { return false; }
    }
    else { return false; }
    }

?>