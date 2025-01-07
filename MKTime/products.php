<?php

// Include session and logout NAV
include('session.php');
include ( 'includes/nav_logout.php' ) ;

    // Open database connection
    require('includes/connect_db.php');

?>

<h1>Hello, <?php
	echo "{$_SESSION['first_name']} {$_SESSION['last_name']}";
	?>
</h1>


<div class="container">
<?php

	# Retrieve items from 'products' database table.
	$q = "SELECT * FROM products" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) != 0 )

		{
				
			echo '<div class="container mt-4">';
			echo '<div class="row">';

	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    // Product variables
    $productName = htmlspecialchars($row['item_name']); 
    $productDescription = htmlspecialchars($row['item_desc']); 
    $productPrice = htmlspecialchars($row['item_price']);
    $productImage = htmlspecialchars($row['item_img']);  
    // Bootstrap card 
    echo '<div class="col-md-4 mb-4">';
    echo '  <div class="card h-100">';
    echo '    <img src="' . $productImage . '" class="card-img-top" alt="' . $productName . '">';
    echo '    <div class="card-body">';
    echo '      <h5 class="card-title">' . $productName . '</h5>';
    echo '      <p class="card-text">' . $productDescription . '</p>';
    echo '      <p class="card-text"><strong>Price:</strong> £' . $productPrice . '</p>';
    echo '    </div>';
    echo '    <div class="card-footer">';
    echo '      <a href="#" class="btn btn-primary">Buy Now</a>';
    echo '    </div>';
    echo '  </div>';
    echo '</div>';
}
		}
		else { echo '<p>There are currently no items in the table to display.</p>'; }
		

echo '</div>'; // End of row
echo '</div>'; // End of container
				
		

		
			
// # Or display this error message..
// 	else { echo '<p>There are currently no items in the table to display.</p>'; }
		

	
	# Close database connection.
	mysqli_close( $link) ; 
		


		
include ('includes/footer.php');
		
?>

