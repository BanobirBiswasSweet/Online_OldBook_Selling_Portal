<?php
session_start();
require_once "./functions/admin.php";
$title = "List book";
require_once "./template/header.php";
require_once "./functions/database_functions.php";
$conn = db_connect();
$i = 1;
$query = "SELECT o.orderid,c.name,o.date,o.ship_address,o.ship_city,o.ship_zip_code,o.ship_country from orders o,customers c where o.customerid=c.customerid ORDER BY date DESC";
$result = mysqli_query($conn, $query);
if(!$result){
  echo "Can't retrieve data " . mysqli_error($conn);
  exit;
}

 ?>



 <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Order id</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Date</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>
    	<?php while($row = mysqli_fetch_assoc($result)){ ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $row['orderid']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['date']; ?></td>
      <td><?php echo $row['ship_address']; ?>, <?php echo $row['ship_city']; ?>, <?php echo $row['ship_zip_code']; ?>, <?php echo $row['ship_country']; ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
