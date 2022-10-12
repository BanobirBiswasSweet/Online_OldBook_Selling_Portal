<?php
session_start();
require_once "./functions/admin.php";
$title = "List book";
require_once "./template/header.php";
require_once "./functions/database_functions.php";
$conn = db_connect();
$i = 1;
$query = "SELECT * from ask where 1 ";
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
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Query</th>

    </tr>
  </thead>
  <tbody>
    	<?php while($row = mysqli_fetch_assoc($result)){ ?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['text']; ?></td>

    </tr>
  <?php } ?>
  </tbody>
</table>
