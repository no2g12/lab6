<!-- ============================== -->
<!-- PART 1 PROCESS BID PLACEHOLDER -->
<!-- ============================== -->
<?php
  require_once('includes/header.php');
  require('includes/db.php');
  require('classes/car.class.php');
  require('classes/bid.class.php');
?>

<div id="content" class="row">
  <?php
    try{
      if(empty($_POST["name"]) OR empty($_POST["bid"]) OR !is_numeric($_POST["bid"])) throw new Exception('You may not have submitted the form correctly. <br> Check that you have inputted a name. <br> Make sure the bid you have placed contains only numbers.'); 
      $name = $_POST["name"];
      $bid = $_POST["bid"];
      $id = $_POST["car_id"];
      $result = $db->query("INSERT INTO bid (car_id, name, value, datetime) VALUES ('$id', '$name', '$bid', NOW())");
      echo ("Your bid has been successful! The following information related to your bid:<br>");
      echo ("Your name is : ".$name."<br>");
      echo ("Your bid is : £".$bid."<br>");
      echo ("The car id is : ".$id."<br>");
      ?>
    <?php
    }catch(Exception $e){
      echo '<div class="alert alert-danger">';
      echo '<strong>Error!</strong>';
      echo '<p>'.$e->getMessage().'</p>';
      echo '</div>';
    }
    ?>
</div>

<?php require_once('includes/footer.php'); ?>