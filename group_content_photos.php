<style media="screen">

#search_box{

	width: 400px;
	height: 20px;
	border-radius: 20px;
	border: none;
	padding: 4px;
	font-size: 14px;
	background-image: url(../../images/search.png);
	background-size: 20px;
	background-repeat: no-repeat;
	background-position: 375px;
	outline: none;
}

</style>

<div style="min-height: 400px;width:100%;background-color: white;text-align: center;position: relative;top:20px;border-radius:10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
	<div style="padding: 20px;">
	<?php if($group_data['group_type'] == 'public' || group_access($_SESSION['mybook_userid'],$group_data,'member')): ?>
	<?php

		$DB = new Database();
		$sql = "select image,postid from posts where has_image = 1 && owner = $group_data[userid] order by id desc";
		$images = $DB->read($sql);

		$image_class = new Image();

		if(is_array($images)){

			foreach ($images as $image_row) {
				# code...
				echo "<a href='".ROOT."single_post/$image_row[postid]' class='img-hover-zoom'>";
				echo "<img src='" . ROOT . $image_class->get_thumb_post($image_row['image']) . "' style='width:150px;margin:10px;border-radius:10px;' />";
				echo "</a>";
			}

		}else{

			echo "<div style='font-size:14px;color:gray;'>No images were found</div>";
		}


	?>
	<?php else: ?>
		<div style="font-size:14px;color:gray;">You do not have access to this content. Join the group to access to this content</div>
	<?php endif; ?>
	</div>
</div>
<br><br>
