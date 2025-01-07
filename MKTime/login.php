
<!-- Include HTML Structure and Navbar -->

<?php 

include ( 'includes/nav.php' ) ; 

# Display any error messages if present.

if ( isset( $errors ) && !empty( $errors ) )
{

 echo '<p id="err_msg">Oops! There was a problem:<br>' ;
 foreach ( $errors as $msg )
  { echo " - $msg<br>" ; }

 echo 'Please try again or <a href="register.php">Register</a></p>' ;

}
?>

<!-- Login Form -->
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
                                    <button type="submit" class="btn btn-dark w-100">Log In</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   
<!-- Include required JS and Jquery in Footer -->
<?php
    include ( 'includes/footer.php' ) ;
?>
    


    

