<?php include_once ("mapSearch.php"); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Book Store Maps</title>
<script defer async type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB_q5OQblNFn9uGd2XfIYqO2y_RrmgcsJU&sensor=false">
</script>

<script type="text/javascript">
	function initialize() {
		var latlng = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $long; ?>);
		var myOptions = {
			zoom:15,
			center:latlng,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		};

		var map = new google.maps.Map(document.getElementById("map_canvas"),
		myOptions);

		var point = new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $long; ?>);
		var marker = new google.maps.Marker({
			position:point,
			map:map,
			title:'<?php echo $bookstore; ?>',
			draggable:true,
		})
	}
</script>

<!--------Bootstrap CSS---------->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
</head>

<body onLoad="initialize()">

	<!-------Carousel Slide and footer--------->
	<?php include_once("./template/header.php"); ?>


    <div style="margin-left: 480px;">
        	<h2 style="font-size: 30px; color: black; font-style: bold;">Find nearest Stores </h2>
     </div>
    <!----------Google Map Search DIV----------->
		<div class="map-search" style="margin-top: 5px; border-radius: 15px;">
        <form style="float:left; margin-top: 5px; margin-left: 390px; margin-bottom: 10px;" action="map.php" method="get">
            <input style="float:left; width:300px; height: 30px;border: 1px solid black;border-radius: 5px; margin-left: 31px;" type="search" name="m">
            <input  name="map" class="btn btn-primary btn-md" type="submit" value="Search" style="margin-left: 5px;height: 31px; float:left;">
					  <a style="float: left; margin-left: 10px; margin-top: 5px;" href="admin.php">Admin Login</a>
					</form>

        <!---------Google Map Division------------>
				<div id="map_canvas" style="width:1150px; height:585px; float:left; border-radius: 15px; margin-top: 10px;"></div>

    </div>

</body>
</html>
