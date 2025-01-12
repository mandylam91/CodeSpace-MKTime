<?php
// Get Nav bar and start session
include ('session.php');
include('includes/nav_logout.php');

# Check if form has been submitted for update.
if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
  # Update changed quantity field values.
    foreach ( $_POST['qty'] as $item_id => $item_qty )
  {
    # Ensure values are integers.
    $id = (int) $item_id;
    $qty = (int) $item_qty;

    # Change quantity or delete if zero.
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }
}

# Initialise grand total variable.
$total = 0; 

if (!empty($_SESSION['cart']))
{

require('connect_db.php');

$q = "SELECT * FROM products WHERE item_id IN (";
foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
$q = substr( $q, 0, -1 ) . ') ORDER BY item_id ASC';

$r = mysqli_query($link, $q);


# Display body section with a form and a table.
echo '

<div class="container">
  <div class="p-3 mb-2 bg-light text-dark">
    <div class="container">
    <div class="rounded p-3 mb-2 bg-white text-dark">
    <form action="cart.php" method="post">
    <div class="row">
      <div class="col-8">
        
          <h1>Shopping Cart</h1>
          <table class="table">
            <thead>
              <tr><th>Image</th><th>Product Name</th><th>Quantitiy</th><th>Price</th><th>Item Total</th></tr>
            </thead>';
              while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
              {
                # Calculate sub-totals and grand total.
                $subtotal = $_SESSION['cart'][$row['item_id']]['quantity'] * $_SESSION['cart'][$row['item_id']]['price'];
                $total += $subtotal;

              # Display the row/s:

              echo'<tr>
              <td><img src="'.$row['item_img'].'" alt="product" width="50" height="50"></td>
              <td>'.$row['item_name'].' </td>
              <td><input type="text" size="3" name="qty[' . $row['item_id'] . ']" value="' . $_SESSION['cart'][$row['item_id']]['quantity'] . '"></td>

              <td>&pound'.$row['item_price'].'</td>
              <td>&pound '.number_format ($subtotal, 2).'</td>
            
            </div>'
            ;}

  echo'   </table>
      </div>
      <div class="col-4">
        
        <h1>Summary</h1>
         
          <div class="p-3 mb-2 bg-light text-dark">
            <p>Total Price <br> &pound '.number_format($total,2).'</p>
          
          </div>
        
        <p><input type="submit" name="submit" class="btn btn-dark" value="Update My Cart"></p>
        
        <a href="checkout.php?total='.$total.'" class="btn btn-primary">Checkout Now &pound'.number_format($total,2).'</a><br>

        </form>
        
      </div>
      </div>
      </div>
    </div>
  </div>
  ';
}

else
# Or display a message.
{ echo '<p>Your cart is currently empty.</p>' ; }

?>