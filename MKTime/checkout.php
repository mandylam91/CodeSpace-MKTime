<!-- Display Checkout Page -->
<?php 
include ('session.php');
include('includes/nav_logout.php');

// Check for passed total and cart

if ( isset( $_GET['total'] ) && ( $_GET['total'] > 0 ) && (!empty($_SESSION['cart']) ) )
{

// Open database connection

require ('connect_db.php');

// Store buyer and order total in 'orders' database table

$q = "INSERT INTO orders ( user_id, total, order_date ) VALUES (". $_SESSION['user_id'].",".$_GET['total'].", NOW() ) ";
$r = mysqli_query ($link, $q);

// Retrieve current order number

$order_id = mysqli_insert_id($link) ;

// Retrieve cart items from products database table

$q = "SELECT * FROM products WHERE item_id IN (";
foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
$q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';
$r = mysqli_query ($link, $q);

// Store order contents in 'order_contents' database table

while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
{
  $query = "INSERT INTO order_contents ( order_id, item_id, quantity, price )
  VALUES ( $order_id, 
         ".$row['item_id'].",
         ".$_SESSION['cart'][$row['item_id']]['quantity'].",
         ".$_SESSION['cart'][$row['item_id']]['price'].")" ;
  $result = mysqli_query($link,$query);

}

// Close Database connection 

mysqli_close($link);

// Display order number


echo "<p>Thanks for your order. Your Order Number Is #".$order_id."</p>  ";

// Remove Cart items
$_SESSION['cart'] = NULL ;
}

else { echo ' <p>Your cart is empty.</p> ' ; }

?>