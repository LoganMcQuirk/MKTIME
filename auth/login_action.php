<?php 
    if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
    {
        require ( '../config/connect_db.php' ) ;

        require ( 'login_tools.php' ) ;
        list ( $check, $data ) = validate ( $link, $_POST[ 'email' ], $_POST[ 'pass' ] ) ;

        if ( $check )
            {
            session_start();
            $_SESSION[ 'user_id' ] = $data[ 'user_id' ] ;
            $_SESSION[ 'firstname' ] = $data[ 'firstname' ] ;
            $_SESSION[ 'surname' ] = $data[ 'surname' ] ;
            $_SESSION[ 'email' ] = $_POST[ 'email' ] ;
            $_SESSION[ 'useraddress' ] = $data[ 'useraddress' ] ;
            $_SESSION[ 'phone' ] = $data[ 'phone' ] ;
            load ( '../products/home.php' ) ;
            }
        else { $errors = $data; }

        mysqli_close( $link ) ;
        include ( 'login.php' ) ;
    }
    ?>