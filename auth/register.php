<?php
include ( '../includes/navbar.php' ) ;

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
    # Connect to the database.
    require ('../config/connect_db.php'); 
    # Initialize an error array.
  $errors = array();

  # Check for a first name.
  if ( empty( $_POST[ 'firstname' ] ) )
  { $errors[] = 'Enter your first name.' ; }
  else
  { $fn = mysqli_real_escape_string( $link, trim( $_POST[ 'firstname' ] ) ) ; }

  # Check for a last name.
  if ( empty( $_POST[ 'surname' ] ) )
  { $errors[] = 'Enter your last name.' ; }
  else
  { $ln = mysqli_real_escape_string( $link, trim( $_POST[ 'surname' ] ) ) ; }

  # Check for email
  if ( empty( $_POST[ 'email' ] ) )
    { $errors[] = 'Enter your email address' ; }
  else 
    { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }

  
  # Check for useraddress
  if ( empty( $_POST[ 'useraddress' ] ) )
    { $errors[] = 'Enter your address' ; }
  else 
    { $ad = mysqli_real_escape_string( $link, trim( $_POST[ 'useraddress' ] ) ) ; }
 
  # Check for phone number
  if ( empty( $_POST[ 'phone' ] ) )
    { $errors[] = 'Enter your phone number' ; }
  else 
    { $ph = mysqli_real_escape_string( $link, trim( $_POST[ 'phone' ] ) ) ; }

  # Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }

  # Check if email useraddress already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT user_id FROM user WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    if ( mysqli_num_rows( $r ) != 0 ) 
        $errors[] = 
        'Email useraddress already registered. 
        <a class="alert-link" href="login.php">Sign In Now</a>' ;
    }

  # On success register user inserting into 'user' database table.
  if ( empty( $errors ) ) 
  {
    $q = "INSERT INTO user (firstname, surname, email, pass, useraddress , phone) 
	VALUES ('$fn', '$ln', '$e', '$p', '$ad', '$ph' )";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    { echo '
     <p>You are now registered.</p>
	  <a class="alert-link" href="login.php">Login</a>'; }
	  
    # Close database connection.
    mysqli_close($link); 
    exit();
  }

   # Or report errors.
  else 
  {
    echo '<h4 class="alert-heading" id="err_msg">The following error(s) occurred:</h4>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo '<p>or please try again.</p></div>';
    # Close database connection.
    mysqli_close( $link );
  }  
}
?>

<form action="register.php" method="post">

    <label for="inputfirstname">First Name</label>
   <input type="text" 
          name="firstname" 
          required 
          placeholder="* First Name " 
          value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>"> 
				
  <label for="inputlastname">Last Name</label>
	<input type="text" 
	       name="surname" 
	       class="form-control" 
	       required 
	       placeholder="* Last Name" 
	       value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>">
			
	<label for="inputemail">Email</label>
	  <input type="email" 
	         name="email" 
	         class="form-control" 
	         required 
	         placeholder="* email@example.com" 
	         value="<?php if (isset($_POST['email'])) 
	           echo $_POST['email']; ?>">

  <label for="inputaddress">Address</label>
	  <input type="text" 
	         name="useraddress" 
	         class="form-control" 
	         required 
	         placeholder="* Address" 
	         value="<?php if (isset($_POST['useraddress'])) echo $_POST['useraddress']; ?>">
  
  <label for="inputphone">Phone Number</label>
    <input type="text"
           name="phone" 
           class="form-control" 
           required 
           placeholder="* Phone Number" 
           value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
					
			
	<label for="inputpass1">Create New Password</label>
		<input type="password"
		       name="pass1" 
		       class="form-control" 
		       required 
		       placeholder="* Create New Password" 
		       value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
					 
					 
	<label for="inputpass2">Confirm Password</label>
		<input type="password" 
		       name="pass2" 
		       class="form-control" 
		       required 
		       placeholder="* Confirm Password" 
		       value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
					
				
		<input type="submit" 
		       value="Create Account Now">
		</form><!-- closing form -->