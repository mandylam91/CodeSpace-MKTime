<?php
// Set page title and display header
include ('session.php');
include('includes/nav_logout.php');
// Get Passed product id and assign it to a variable

if ( isset( $_GET['id'] ) ) $id = $_GET['id'];

// Open Database connection
require('includes/connect_db.php');

// Retrieve Selective item data from 'products' database table.
$q = "SELECT * FROM products WHERE item_id = $id";
$r = mysqli_query( $link, $q );

if ( mysqli_num_rows( $r ) == 1 ) 
{
    $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );
    // Product details are fetched and stored in $row


    # Check if cart already contains one of this product id.
    if ( isset( $_SESSION['cart'][$id] ) )
    { 
    # Add one more of this product.
    $_SESSION['cart'][$id]['quantity']++; 
    echo '
        <div class="container">
                <div class="alert alert-secondary" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>Another '.$row["item_name"].' has been added to your cart</p>
                    <a href="products.php">Continue Shopping</a> | <a href="cart.php">View Your Cart</a>
                </div>
            </div>';
    } 
    else
    {
    # Or add one of this product to the cart.
    $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['item_price'] ) ;
    echo '<div class="container">
            <div class="alert alert-secondary" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <p>A '.$row["item_name"].' has been added to your cart</p>
            <a href="products.php">Continue Shopping</a> | <a href="cart.php">View Your Cart</a>
            </div>
        
            </div>' ; 
 }
}


mysqli_close($link);

// include('includes/footer.php');



?>