<?php
include('session.php');

    // Open database connection
    require('connect_db.php');
    echo '<div class="container">
        <div class="row">';
    
    // Get items from 'products' database table
    
	$q = "SELECT * FROM products" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) != 0 )

		{
			
			echo '
	
			<h1>Read Records</h1>
				
				<table class="table">
				<thead>
				<tr><th>Product ID</th><th>Product Name</th><th>Description</th><th>Image</th><th>Price</th></tr></thead><tbody>';

				while($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
				{
				echo'<tr>
				<td>'.$row['item_id'].' </td><td>'.$row['item_name'].' </td><td>'.$row['item_desc'].'</td><td><img src="'.$row['item_img'].'" alt="product" width="50" height="50"></td><td>&pound'.$row['item_price'].'</td>
				';
			}
			
		}
			
			# Or display this error message..
	else { echo '<p>There are currently no items in the table to display.</p>'; }
		



?>
