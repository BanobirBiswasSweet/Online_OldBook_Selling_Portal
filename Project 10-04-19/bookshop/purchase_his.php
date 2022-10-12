<?php
session_start();


$title = "Purchase Record";
require_once "./template/header.php";
require_once "./functions/database_functions.php";

$conn = db_connect();
$id = $_SESSION['cus_id'];
$i = 1;
$query = "SELECT b.book_title,c.date,o.item_price,o.quantity from order_items o,books b,orders c where o.orderid=c.orderid AND c.customerid = '" . $id . "' AND b.book_isbn=o.book_isbn ORDER BY date DESC";
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
      <th scope="col">Book Title</th>
      <th scope="col">Date</th>
      <th scope="col">Price</th>
      <th scope="col">Quentity</th>
    </tr>
  </thead>
  <tbody>
    	<?php while($row = mysqli_fetch_assoc($result)){ ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $row['book_title']; ?></td>
      <td><?php echo $row['date']; ?></td>
      <td><?php echo $row['item_price']; ?></td>
      <td><?php echo $row['quantity']; ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
