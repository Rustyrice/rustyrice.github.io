<?php

	include("classes/autoload.php");

	$login = new Login();
	$user_data = $login->check_login($_SESSION['mybook_userid']);

	$USER = $user_data;

	if(isset($URL[1])){

		$profile = new Profile();
		$profile_data = $profile->get_profile($URL[1]);

		if(is_array($profile_data)){
			$user_data = $profile_data[0];
		}

	}



	//posting starts here
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		$post = new Post();
		$id = $_SESSION['mybook_userid'];
		$result = $post->create_post($id, $_POST,$_FILES);

		if($result == "")
		{
			header("Location:" . ROOT . "home");
			die;
		}else
		{

			echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
			echo "<br>The following errors occured:<br><br>";
			echo $result;
			echo "</div>";
		}
	}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Timeline | Sociacube</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>

		<style media="screen">
			<?php include 'css/main.css'; ?>
			<?php include 'css/responsive.css'; ?>
		</style>

	<body style="font-family: tahoma; background-color: #d0d8e4;">
		<?php include("header.php"); ?>

		<!--cover area-->
		<div class="textbox_area" style="width: 800px;margin:auto;min-height: 400px;">


			<!--below cover area-->
			<div style="display: flex;">

				<!--friends area-->
				<div style="min-height: 400px;flex:1;">

					<div id="friends_bar_home">

						 <?php

							$image = "images/user_male.jpg";
							if($user_data['gender'] == "Female")
							{
								$image = "images/user_female.jpg";
							}
							if(file_exists($user_data['profile_image']))
							{
								$image = $image_class->get_thumb_profile($user_data['profile_image']);
							}
						?>

					<img id="profile_pic_home" src="<?php echo ROOT . $image ?>"><br/>

						<a href="<?=ROOT?>profile" style="text-decoration:none;color:#173c8d;" id="home_username">
						 <?php echo $user_data['first_name'] . "<br> " . $user_data['last_name'] ?>
						</a>

					</div>

				</div>

				<!--posts area-->
 				<div style="flex:2.5;padding: 20px;padding-right: 0px;">

 					<div style="border:solid thin #aaa; padding: 10px;background-color: white;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius: 10px;">

 						<form method="post" enctype="multipart/form-data">
							<textarea id="autoresizing" name="post" placeholder="What's on your mind, <?= $user_data['first_name'] ?>?"></textarea>
			        <div class="image-preview" id="imagePreview">
			          <img src="" alt="Video selected" class="image-preview__image">
			        </div>
			        <br>
			        <label for="inpFile"><img id="image_icon" src="images/images_icon.png"></label>
			        <input id="inpFile" type="file" name="file" style="display:none;">
			        <input id="post_button" type="submit" value="Post" style="margin:5px;">
			        <br>
			      </form>
 					</div>

	 				<!--posts-->
	 				<div id="post_bar">

 						<?php

 							$page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  							$page_number = ($page_number < 1) ? 1 : $page_number;


 							$limit = 10;
 							$offset = ($page_number - 1) * $limit;

  						$DB = new Database();
 							$user_class = new User();
 							$image_class = new Image();

 							$followers = $user_class->get_following($_SESSION['mybook_userid'],"user");

 							$follower_ids = false;
 							if(is_array($followers)){

 								$follower_ids = array_column($followers, "userid");
 								$follower_ids = implode("','", $follower_ids);

 							}

 							if($follower_ids){
 								$myuserid = $_SESSION['mybook_userid'];
 								$sql = "select * from posts where parent = 0 and owner = 0 and (userid = '$myuserid' || userid in('" .$follower_ids. "')) order by id desc limit $limit offset $offset";
 								$posts = $DB->read($sql);
 							}

 	 					 	if(isset($posts) && $posts)
 	 					 	{

 	 					 		foreach ($posts as $ROW) {
 	 					 			# code...

 	 					 			$user = new User();
 	 					 			$ROW_USER = $user->get_user($ROW['userid']);

 	 					 			include("post.php");
 	 					 		}
 	 					 	}else{
								echo "<br>";
								echo "<div style='font-size:18px;color:gray;text-align:center;'>No posts to show</div>";
								echo "<br>";
								echo "<div style='font-size:11px;color:gray;text-align:center;'>Posts from people you follow will be displayed here</div>";
								echo "<br>";
							}

 	 					 	//get current url
 							$pg = pagination_link();

	 					 ?>

		 					 <a href="<?= $pg['next_page'] ?>">
		 					 <input id="post_button" type="button" value="Next Page" style="float: right;width:150px;">
		 					 </a>
		 					 <a href="<?= $pg['prev_page'] ?>">
		 					 <input id="post_button" type="button" value="Prev Page" style="float: left;width:150px;">
		 					 </a>
							 <br>
	 				</div>

 				</div>
			</div>

		</div>

	</body>
</html>

<script type="text/javascript">

  //resize textarea
  textarea = document.querySelector("#autoresizing");
  textarea.addEventListener('input', autoResize, false);

  function autoResize() {
    this.style.height = 'auto';
    this.style.height = this.scrollHeight + 'px';
  }

  //preview image in textarea
	const inpFile = document.getElementById("inpFile");
	const previewContainer = document.getElementById("imagePreview");
	const previewImage = previewContainer.querySelector(".image-preview__image");

	inpFile.addEventListener("change", function() {
		const file = this.files[0];

		if(file){
			const reader = new FileReader();

			previewContainer.style.display = "block";
			previewImage.style.display = "block";

			reader.addEventListener("load", function() {
				previewImage.setAttribute("src", this.result);
			});

			reader.readAsDataURL(file);
		}else{
			previewImage.style.display = null;
			previewImage.setAttribute("src","");
		}
	});

</script>
