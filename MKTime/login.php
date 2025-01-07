<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MK Time</title>
</head>
<body>
    
<?php 
include ( 'includes/nav.php' ) ;
# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<p id="err_msg">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo 'Please try again or <a href="register.php">Register</a></p>' ;
}
?>


<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card bg-light mb-3">
                <div class="card-header"><h1>Login</h1></div>
                    <div class="card-body">
                        <form action="login_action.php" method="post">
                          <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="inputemail">Email</label>
                                        <input type="text" 
                                                name="email" 
                                                class="form-control" 
                                                required 
                                                placeholder="* Enter Email"> 

                                        <label for="password">Password</label>        
                                        <input type="password" 
                                                name="pass"  
                                                class="form-control" 
                                                required 
                                                placeholder="* Enter Password">
            
                                    </div>
                                    <input type="submit" value="Login">
                                </div>
                            </div>
                        </form><!-- closing form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   
<!-- Footer -->
<?php
    include ( 'includes/footer.php' ) ;
?>
    

</body>
</html>


