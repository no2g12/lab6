<?php

require_once('includes/header.php');

// get the database connection
require('includes/db.php');
// get the car and bid classes
require('classes/car.class.php');
require('classes/bid.class.php');

?>

<!-- main content -->
<div id="content" class="row">
	
	
	<?php
	
	try{
		// check that the ID exists and it is the correct type
		if(!isset($_GET['id']) OR empty($_GET['id']) OR !is_numeric($_GET['id'])) throw new Exception('The car ID must be specified in order to view the car information. Please go back and try again.');
		
		// get the manufacturer we are dealing with
		// ensuring we escape the GET string
		$cars = $db->query('SELECT * FROM car WHERE id = '.$db->real_escape_string($_GET['id']));
		$car = $cars->fetch_object('Car');
		
		// get all of the bids for this car
		$bids = $db->query('SELECT * FROM bid WHERE car_id= '.$db->real_escape_string($_GET['id']));
		?>
		
		<h2>Car - <?=$car->model?> (<?=$car->regNumber?>)</h2>
		
		<!-- car profile -->
		<div class="row">
			
			<div>
				<dl class="dl-horizontal">
					<dt>Model</dt>
						<dd><?=$car->model?></dd>
					<dt>Price</dt>
						<dd><?=$car->price?></dd>
					<dt>Registration</dt>
						<dd><?=$car->regNumber?></dd>
					<dt>Registration Date</dt>
						<dd><?=$car->regDate?></dd>
					<dt>Description</dt>
						<dd><?=$car->description?></dd>
				</dl>
			</div>
			
			<div>
				<h3>Current Bids</h3>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Bid Ref</th>
							<th>Bidder</th>
							<th>Bid value</th>
							<th>Submittted</th>
						</tr>
					</thead>
					<tbody>
						<?php while($bid = $bids->fetch_object("Bid")): ?>
							<tr>
								<td><?=$bid->id?></td>
								<td><?=$bid->name?></td>
								<td>&pound;<?=number_format($bid->value)?></td>
								<td><?=$bid->datetime?></td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
			
			
			
		</div><!-- /car profile -->
		
		<!-- car bid form -->
		<div class="row">
			<h3>Place A Bid!</h3>
			
			
			<!-- =========================== -->
			<!-- PART 1 BID FORM PLACEHOLDER -->
			<!-- =========================== -->
			
			<form action="process-bid.php" method="post">
        <div class="col-md-2">
          Name: 
        </div>
          <input type="text" name="name"><br>
        <div class="col-md-2">
          Your Bid: 
        </div>
          <input type="integer" name="bid"><br>
          <input type="Submit">
			</form>
			
		</div><!-- /car bid form -->
	<?php
	}
	catch(Exception $e){
		echo '<div class="alert alert-danger">';
		echo 	'<strong>Error!</strong>';
		echo 	'<p>'.$e->getMessage().'</p>';
		echo '</div>';
	}
	
	?>
	
</div><!-- /main content -->


<?php require_once('includes/footer.php'); ?>