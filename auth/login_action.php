<?php 
    if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
    {
        require ( '../config/connect_db.php' ) ;

        require ( 'login_tools' ) ;
        list ( $check, $data ) = validate ( $link, $_POST[ 'email' ], $_POST[ 'pass' ] ) ;

        if ( $check )
            {
            session_start();
            $_SESSION[ 'user_id' ] = $data[ 'user_id' ] ;
            $_SESSION[ 'first_name' ] = $data[ 'first_name' ] ;
            $_SESSION[ 'last_name' ] = $data[ 'last_name' ] ;
            load ( '../products/home.php' ) ;
            }
        else { $errors = $data; }

        mysqli_close( $link ) ;
        include ( 'login.php' ) ;
    }
    ?>