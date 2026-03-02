<?php
# Access session - only start if not already started
if (session_status() === PHP_SESSION_NONE) { session_start(); }
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( '../auth/login_tools.php' ) ; load() ; }
?>