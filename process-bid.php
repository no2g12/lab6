<!-- ============================== -->
<!-- PART 1 PROCESS BID PLACEHOLDER -->
<!-- ============================== -->
<html>
<body>

Your name is <?php  
  $name = $_POST["name"];
  print_r($name); ?>
  <br>
Your bid is : <?php 
  $bid = $_POST["bid"];
  print_r($bid); ?>
  <br>
The car id is : <?php
  $id = $_POST["car_id"];
  print_r($id); ?>
  
</body>
</html>