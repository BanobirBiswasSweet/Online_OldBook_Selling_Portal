<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>

      	<hr>

      	<footer>
  	<div class="text-muted pull-left">
          <li><a href="map.php"><span class="glyphicon glyphicon-search"></span>&nbsp; Locate Store</a></li>
</div>
<?php if(isset($_SESSION)){
  if(!isset($_SESSION['user_id'])){
 ?>
        	<div class="text-muted pull-right">
          		<a href="admin.php">Admin Login</a> 2019
        	</div>
        <?php } } ?>
      	</footer>
    </div>

    <script type="text/javascript" src="./bootstrap/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
