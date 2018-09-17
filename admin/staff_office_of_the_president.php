
<!DOCTYPE html>
<html>
<head>
	<title>Office of the President</title>
	<script src="ckeditor/ckeditor.js"></script>
	<?php 
	include 'require/dbconnection.php';
	//================News and Update===============
	// delete
	if (isset($_GET['news_delete']) && !empty($_GET['news_delete'])) {
		$news_delete_id = (int)$_GET['news_delete'];
		$sql_dnews_delete = "DELETE FROM president_news WHERE id = $news_delete_id";
		$news_delete = $connection->query($sql_dnews_delete);
		header('location: staff_office_of_the_president.php');

	}
	
	// edit
	 $news_title_value = "";
	 $news_body_value = "";
	 $news_edit_id = 0;
	if (isset($_GET['news_edit']) && !empty($_GET['news_edit'])) {
		$news_edit_id = (int)$_GET['news_edit'];
		$sql_edit = "SELECT * FROM president_news WHERE id = $news_edit_id";
		$p_news_edit = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($p_news_edit);
	// 	header('location: faculty_appontment_info.php');
	 }
	 if(isset($_GET['news_edit'])){
		$news_title_value = $edit_post_row['title'];
		$news_body_value = $edit_post_row['body'];
	}else{
		if(isset($_POST['staff_news_post'])){
			$news_title_value = $_POST['news_title'];
			$news_body_value = $_POST['editor'];
		}
	}
	if(isset($_POST['staff_news_post'])){
		$news_title_value = $_POST['news_title'];
		$news_body_value = $_POST['editor'];

		$sql = "INSERT INTO president_news(title, body) VALUES ('$news_title_value','$news_body_value')";
		if(isset($_GET['news_edit'])){
			$sql = "UPDATE president_news SET title = '$news_title_value', body = '$news_body_value' WHERE id = $news_edit_id";
		}
		$p_news = $connection->query($sql);
		if(!$p_news){
			echo "Insert Failed :".$connection->error;
		}else{
			echo "Inserted";
		}
		header('location: staff_office_of_the_president.php');
	}

	//================Biography===============

	// edit
	 $president_name = "";
	 $bio_body_value = "";
	 $bio_edit_id = 0;
	if (isset($_GET['bio_edit']) && !empty($_GET['bio_edit'])) {
		$bio_edit_id = (int)$_GET['bio_edit'];
		$sql_edit = "SELECT * FROM president_biography WHERE id = $bio_edit_id";
		$p_bio_edit = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($p_bio_edit);
	 }

	 if(isset($_GET['bio_edit'])){
		$president_name = $edit_post_row['name'];
		$bio_body_value = $edit_post_row['biography'];
	}else{
		if(isset($_POST['presedent_details_post'])){
			$president_name = $_POST['presedent_name'];
			$bio_body_value = $_POST['editor'];
		}
	}
	if(isset($_POST['presedent_details_post'])){
		$president_name = $_POST['presedent_name'];
		$bio_body_value = $_POST['editor'];


		$sql = "UPDATE president_biography SET name = '$president_name', biography = '$bio_body_value' WHERE id = 1";

		if(isset($_GET['bio_edit'])){
			$sql = "UPDATE president_biography SET name = '$president_name', biography = '$bio_body_value' WHERE id = $bio_edit_id";
		}
		$p_news = $connection->query($sql);
		if(!$p_news){
			echo "Insert Failed :".$connection->error;
		}else{
			echo "Inserted";
		}
		header('location: staff_office_of_the_president.php');
	}

	// =================President Speeches=====================
	if(isset($_POST['presedent_speeches_post'])){
		$pre_video_url = mysqli_real_escape_string($connection, $_POST['video_src']);
		$destination = "../images/staff/".$_FILES['thm_img']['name'];
		$destination_path = "images/staff/".$_FILES['thm_img']['name'];
		$filename = $_FILES['thm_img']['tmp_name'];
		if(move_uploaded_file($filename, $destination)){
			$sql = "INSERT INTO president_spc_writ(img_thum_path, vdo_url) VALUES ('$destination_path', '$pre_video_url')";
			$pre_spees =  $connection->query($sql);

			if(!$pre_spees){
				echo "Insert Failed :".$connection->error;
			}else{
				echo "Inserted";
			}
		}
	}

 ?>
<?php
	include 'include/head.php';
?>
<div class="bg-dark py-3">
	<h1 class="text-center text-white wow fadeInLeft" data-wow-duration="5s">Office of the President
</div>
<?php
	include 'include/sidenavbar.php';
 ?>
 <section class="container">
 	<div class="row justify-content-center">
 		<div class="col-sm-12">
 			<div class="my-3" id="president_tabs">
				<ul class="nav nav-tabs justify-content-around">
					<li class="nav-item div_color rounded-top"><a href="#home" class="nav-link active" data-toggle="tab">Home</a></li>
					<li class="nav-item div_color rounded-top"><a href="#newsUpdate" class="nav-link" data-toggle="tab">News &amp; Update</a></li>
					<li class="nav-item div_color rounded-top"><a href="#biography" class="nav-link" data-toggle="tab">Biography</a></li>
					<li class="nav-item div_color rounded-top"><a href="#speechesWritings" class="nav-link" data-toggle="tab">Speeches &amp; Writings</a></li>
					<li class="nav-item div_color rounded-top"><a href="#pastPresident" class="nav-link" data-toggle="tab">Past President</a></li>
					<li class="nav-item div_color rounded-top"><a href="#contact" class="nav-link" data-toggle="tab">Contact</a></li>
				</ul>
				<div class="tab-content">
					<div class="px-3 big_div_color tab-pane active" id="home">
						<div class="row justify-content-around py-2">
							<div class="col-md-6">
								<h4 class="p-0 m-0">Letest Message</h4>
								<div class="div_color p-2 m-1 rounded">
									<time>17-jun,2018</time>
									<p>What is Lorem Ipsum?Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
								</div>
								<h4>Update News</h4>
								<div class="div_color p-2 m-1 rounded">
									<div class="d-flex justify-content-start">
										<div class="pr-3">
											<img src="images/staff/news_icon.png" alt="News Iocn" class="img-fluid">
										</div>
										<div>
											<h6 class="p-0 m-0">News Title</h6>
											<time>jan-3,2018</time>
										    <div class="read-more">
										      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
										    </div>      
										</div>
									</div>
								</div>
								<div class="div_color p-2 m-1 rounded">
									<div class="d-flex justify-content-start">
										<div class="pr-3">
											<img src="images/staff/news_icon.png" alt="News Iocn" class="img-fluid">
										</div>
										<div>
											<h6 class="p-0 m-0">News Title</h6>
											<time>jan-3,2018</time>
										    <div class="read-more">
										      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
										    </div>      
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="div_color rounded p-3">
									<img src="images/staff/clock_icon.png" alt="Time Shedule" class="img-fluid rounded-circle">
									<div class="row p-2">
										<div class="div-md-4">
											<div>Sunday:</div>
											<div>Monday:</div>
											<div>Tuesday:</div>
											<div>Wednesday:</div>
											<div>Thursday:</div>
										</div>
										<div class="div-md-4 pl-1">
											<div>8:00 am- 1:00 pm</div>
											<div>10:00 am- 2:00 pm</div>
											<div>10:00 am- 2:00 pm</div>
											<div>10:00 am- 2:00 pm</div>
											<div>10:00 am- 2:00 pm</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="py-3 big_div_color tab-pane fade" id="newsUpdate">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">Update & News</h2>
					 			</div>
					 			<form action="staff_office_of_the_president.php<?=((isset($_GET['news_edit']))?'?news_edit='.$news_edit_id:'');?>" method="post" class="div_color text-white p-4 rounded">
					 				<div class="form-group">
					 					<label for="news_title"><?=(isset($_GET['news_edit'])?'Edit':'');?> News Title</label>
					 					<input type="text" name="news_title" class="form-control" id="news_title" placeholder="News Title" value="<?=$news_title_value?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="form-group">
					 					<label for="news_title"><?=(isset($_GET['news_edit'])?'Edit':'');?> Post Body :</label>
					 					<textarea class="ckeditor" name="editor" id="news_body"><?php echo $news_body_value?></textarea>
					 					<div class="d-flex">
					 						<small class="staff_news_body_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['news_edit'])): ?>
					 						<div><a href="staff_office_of_the_president.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="staff_news_post" id="staff_news_post" value="<?=((isset($_GET['news_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>
					 			<div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">All News list</h2>
								<?php

									$sql = "SELECT * FROM president_news";
									$pre_result = $connection->query($sql);
									if(!$pre_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($pre_result) > 0){
											while ($row = mysqli_fetch_array($pre_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?news_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?news_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
												 			</div>
													 		<div><?=$row['title'];?></div>
													 		<div><i class="fas fa-plus px-2"></i></div>
													 	</div>
													 	<div class="collapse mx-5 div_collaple  p-3" id="<?= $row['id']; ?>"><?= $row['body']; ?></div>
												 	</div>
								<?php					
								 				}
								 			}
								 		}
								?>
								 </div>
							</div>
						</div>
					</div>

					<div class="px-3 big_div_color tab-pane fade" id="biography">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">Biography</h2>
					 			</div>
					 			<form action="staff_office_of_the_president.php<?=((isset($_GET['bio_edit']))?'?bio_edit='.$bio_edit_id:'');?>" method="post" class="div_color text-white p-4 rounded">
					 				<div class="form-group">
					 					<label for="presedent_name"><?=(isset($_GET['bio_edit'])?'Edit':'');?> Presedent Name</label>
					 					<input type="text" name="presedent_name" class="form-control" id="presedent_name" placeholder="Presedent Name" value="<?=$president_name?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="presedent_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="form-group">
					 					<label for="presedent_details"><?=(isset($_GET['bio_edit'])?'Edit':'');?> Post Body :</label>
					 					<textarea class="ckeditor" name="editor" id="presedent_details"><?php echo $bio_body_value?></textarea>
					 					<div class="d-flex">
					 						<small class="presedent_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['bio_edit'])): ?>
					 						<div><a href="staff_office_of_the_president.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="presedent_details_post" id="presedent_details_post" value="<?=((isset($_GET['bio_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>

					 			<div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">President Biography</h2>
								<?php

									$sql = "SELECT * FROM president_biography";
									$pre_result = $connection->query($sql);
									if(!$pre_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($pre_result) > 0){
											while ($row = mysqli_fetch_array($pre_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#bio_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?bio_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?bio_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
												 			</div>
													 		<div><?=$row['name'];?></div>
													 		<div><i class="fas fa-plus px-2"></i></div>
													 	</div>
													 	<div class="collapse mx-5 div_collaple  p-3" id="bio_<?= $row['id']; ?>"><?= $row['biography']; ?></div>
												 	</div>
								<?php					
								 				}
								 			}
								 		}
								?>
								 </div>
							</div>
						</div>
					</div>

					<div class="p-3 big_div_color tab-pane fade" id="speechesWritings">

						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">President Speeches</h2>
					 			</div>
					 			<form action="staff_office_of_the_president.php" method="post" enctype="multipart/form-data" class="div_color text-white p-4 rounded">
					 				<div class="form-group">
										<label for="thm_img"><?=(isset($_GET['pres_edit'])?'Edit':'');?> Thum image</label>
					 					<input type="file" name="thm_img" class="form-control" id="thm_img">
					 					<div class="d-flex justify-content-end">
					 						<small class="thm_img_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="form-group">
					 					<label for="presedent_name"><?=(isset($_GET['pres_edit'])?'Edit':'Insert');?> Video URL </label>
					 					<input type="text" name="video_src" class="form-control" id="video_src" placeholder="video source">
					 					<div class="d-flex justify-content-end">
					 						<small class="pre_video_src_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['pres_edit'])): ?>
					 						<div><a href="staff_office_of_the_president.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="presedent_speeches_post" id="presedent_details_post" value="<?=((isset($_GET['pres_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>

					 			<div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">President Speeches</h2>
								<?php

									$sql = "SELECT * FROM president_spc_writ";
									$pre_result = $connection->query($sql);
									if(!$pre_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($pre_result) > 0){
											while ($row = mysqli_fetch_array($pre_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#bio_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?bio_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?bio_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
												 			</div>
													 		<div>Hello</div>
													 		<div><i class="fas fa-plus px-2"></i></div>
													 	</div>
													 	<div class="collapse mx-5 div_collaple  p-3" id="bio_<?= $row['id']; ?>">
													 		<img src="../<?= $row['img_thum_path']; ?>">

													 		<iframe class="embed-responsive-item" src="<?= $row['vdo_url']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
													 		</div>
												 	</div>
								<?php					
								 				}
								 			}
								 		}
								?>
								 </div>
							</div>
						</div>



						<h3>President Speeches</h3>
						  <div class="row">
						    <div class="col-sm-6">
						      <div class="presidentVideo embed-responsive embed-responsive-16by9">
						        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/EY37Tq2cj7o" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						      </div>
						      <div class="presidentVideo d-none embed-responsive embed-responsive-16by9">
						        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/qIRjytgNuhM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						      </div>
						      <div class="presidentVideo d-none embed-responsive embed-responsive-16by9">
						        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/gulzQ_2IyfI" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						      </div>
						      <div class="presidentVideo d-none embed-responsive embed-responsive-16by9">
						        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/2OOsEjCyaEw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						      </div>
						    </div>
						  </div>
						<div class="row mt-2">
					  		<div class="col-3 videoThum active">
					  			<img src=" images/staff/president_video1.jpg" alt="president_video1" class="speeches img-fluid rounded">
					  		</div>
					  		<div class="col-3 videoThum">
					  			<img src=" images/staff/president_video2.jpg" alt="president_video2" class="speeches img-fluid rounded">
					  		</div>
					  		<div class="col-3 videoThum">
					  			<img src=" images/staff/president_video3.jpg" alt="president_video3" class="speeches img-fluid rounded">
					  		</div>
					  		<div class="col-3 videoThum">
					  			<img src=" images/staff/president_video4.jpg" alt="president_video4" class="speeches img-fluid rounded">
					  		</div>
					  	</div>
					</div>

					<div class="px-3 big_div_color tab-pane fade" id="pastPresident">
						<div class="row">
							<div class="col-md-12">
								<div class="past-president">
									<div class="past-president-item rounded left">
										<div class="content">
											<h4>2008</h4>
											<figure>
												<img src="images/staff/past_president1.jpg" alt="Past President" class="img-fluid rounded-circle">
												<figcaption class="text-center text-muted pt-2"><i>Name: Shohan</i></figcaption>
											</figure>
											<p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
										</div>
									</div>
									<div class="past-president-item rounded right">
										<div class="content">
											<h4>1995</h4>
											<figure>
												<img src="images/staff/past_president2.jpg" alt="Past President" class="img-fluid rounded-circle">
												<figcaption class="text-center text-muted pt-2"><i>Name: Shohan</i></figcaption>
											</figure>
											<p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
										</div>
									</div>
									<div class="past-president-item rounded left">
										<div class="content">
											<h4>1993</h4>
											<figure>
												<img src="images/staff/past_president3.jpg" alt="Past President" class="img-fluid rounded-circle">
												<figcaption class="text-center text-muted pt-2"><i>Name: Shohan</i></figcaption>
											</figure>
											<p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
										</div>
									</div>
									<div class="past-president-item rounded right">
										<div class="content">
											<h4>1990</h4>
											<figure>
												<img src="images/staff/past_president4.jpg" alt="Past President" class="img-fluid rounded-circle">
												<figcaption class="text-center text-muted pt-2"><i>Name: Shohan</i></figcaption>
											</figure>
											<p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="px-3 big_div_color tab-pane fade" id="contact">
						<div class="row justify-content-center">
							<div class="col-md-2 pl-5 pt-5">
								<img src="images/staff/message_icon.png" alt="Contract Info icon" class="img-fluid rounded-circle contact-info mt-5 mr-0 ml-5 pb-0">

								<img src="images/staff/call_icon.png" alt="Contract Info icon" class="img-fluid rounded-circle contact-info mt-3 mr-0 ml-3">

								<img src="images/staff/email_icon.png" alt="Contract Info icon" class="img-fluid rounded-circle contact-info mt-3 mr-0 ml-3">

								<img src="images/staff/location_icon.png" alt="Contract Info icon" class="img-fluid rounded-circle contact-info mt-3 mr-0 ml-5 pt-0">
							</div>
							<div class="col-md-7 pl-0">
								<img src="images/staff/contract_box.png" alt="Contract Box" class="img-fluid" id="contact-info-box">
								<!-- <div class="image-caption ">Fax: 789065</div>
								<div class="image-caption ">Office Number: +8877777</div>
								<div class="image-caption ">Email : message@info.university.com</div> -->
								<div class="image-caption ">
									<address>
										Fax: 789065<br>
										Office Number: +8877777<br>
										Email : message@info.university.com <br>
										University of exaple<br>
										203, A-Building, Roman<br>
										Dhaka, Bangladesh
									</address>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
 		</div>
 	</div>
 </section>
</body>
</html>
