<?php
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'auth/login_tools' ) ; load() ; }

# Include navigation 
include ( 'includes/navbar.php' ) ;

?>

