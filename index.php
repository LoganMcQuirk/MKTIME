<?php
# Access session.
if (session_status() === PHP_SESSION_NONE) { session_start(); }
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require_once ( __DIR__ . '/auth/login_tools.php' ) ; load(); }

# Include navigation
include ( __DIR__ . '/includes/navbar.php' ) ;
?>