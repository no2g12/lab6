<!-- ============================== -->
<!-- PART 1 PROCESS BID PLACEHOLDER -->
<!-- ============================== -->
<?php
  require('includes/db.php');
?>

<html>
<body>
<?php
  $name = $_POST["name"];
  $bid = $_POST["bid"];
  $id = $_POST["car_id"];
  $result = $db->query("INSERT INTO bid (car_id, name, value, datetime) VALUES ('$id', '$name', '$bid', NOW())");
  echo ("Your name is : ".$name."<br>");
  echo ("Your bid is : £".$bid."<br>");
  echo ("The car id is : ".$id."<br>");
?>
</body>
</html>