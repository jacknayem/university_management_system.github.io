<?php 
if(isset($_POST['presedent_speeches_post'])){
	$name = $_FILES['thm_img']['name'];
	echo $name;
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome 5.1.0 -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

	<!-- amination CSS file -->
	<link rel="stylesheet" type="text/css" href="css/animate.min.css">

	<!-- main CSS file -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- Javascript -->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

	<!-- Wow js -->
	<script type="text/javascript" src="js/wow.min.js"></script>

	<!-- Main JS file -->
	<script type="text/javascript" src="js/main.js"></script>
	<!-- Main JS file -->
	<script type="text/javascript" src="js/staff_main.js"></script>
</head>
<body>
<form action="test.php" method="post" enctype="multipart/form-data" class="div_color text-white p-4 rounded">
	<div class="form-group">
	<label for="thm_img">Thum image</label>
		<input type="file" name="thm_img" class="form-control" id="thm_img">
	</div>
	<div class="form-group">
		<label for="presedent_name">Video URL </label>
		<input type="text" name="video_src" class="form-control" id="video_src" placeholder="video source">
		<div class="d-flex justify-content-end">
			<small class="pre_video_src_error_message"></small>
		</div>
	</div>
	<div class="d-flex justify-content-between">
		<div><input type="submit" name="presedent_speeches_post" id="presedent_details_post" class="btn btn-success btn-block"></div>
	</div>
</form>
</body>
</html>