<div style="display:flex;">

  <div style="min-height: 400px;flex: 1;">

    <!--intro area-->
    <div id="intro_bar">

      Intro<br>

      <?php

        $post_class = new Post();
        $user_class = new User();

        $followers_count = $post_class->get_likes($user_data['userid'],"user");
        $followers_str = "";
        if(is_array($followers_count)){
          $followers_str = count($followers_count);
        }

        $following_count = $user_class->get_following($user_data['userid'],"user");
        $following_str = "";
        if(is_array($following_count)){
          $following_str = count($following_count);
        }

      ?>

      <?php if($followers_count): ?>
        <br>
        <div>
          <svg fill="gray" width="18" height="18" viewBox="0 0 24 24"><path d="M8.213 16.984c.97-1.028 2.308-1.664 3.787-1.664s2.817.636 3.787 1.664l-3.787 4.016-3.787-4.016zm-1.747-1.854c1.417-1.502 3.373-2.431 5.534-2.431s4.118.929 5.534 2.431l2.33-2.472c-2.012-2.134-4.793-3.454-7.864-3.454s-5.852 1.32-7.864 3.455l2.33 2.471zm-4.078-4.325c2.46-2.609 5.859-4.222 9.612-4.222s7.152 1.613 9.612 4.222l2.388-2.533c-3.071-3.257-7.313-5.272-12-5.272s-8.929 2.015-12 5.272l2.388 2.533z"/></svg>&nbsp
          <a href="<?=ROOT?>profile/<?php echo $user_data['tag_name'] ?>/followers" class="username" style="font-size:12px;color:#405d9b;position:relative;bottom:5px;" >Followed by <?=$followers_str?> people</a>
        </div>
      <?php endif; ?>
      <?php if($friends): ?>
        <br>
        <div>
          <svg fill="gray" width="18" height="18" viewBox="0 0 24 24"><path d="M19.5 15c-2.483 0-4.5 2.015-4.5 4.5s2.017 4.5 4.5 4.5 4.5-2.015 4.5-4.5-2.017-4.5-4.5-4.5zm2.5 5h-2v2h-1v-2h-2v-1h2v-2h1v2h2v1zm-7.18 4h-14.815l-.005-1.241c0-2.52.199-3.975 3.178-4.663 3.365-.777 6.688-1.473 5.09-4.418-4.733-8.729-1.35-13.678 3.732-13.678 6.751 0 7.506 7.595 3.64 13.679-1.292 2.031-2.64 3.63-2.64 5.821 0 1.747.696 3.331 1.82 4.5z"/></svg>&nbsp
          <a href="<?=ROOT?>profile/<?php echo $user_data['tag_name'] ?>/following" class="username" style="font-size:12px;color:#405d9b;position:relative;bottom:5px;" >Follows <?=$following_str?> people</a>
        </div>
      <?php endif; ?>
    </div>

    <!--about area-->
    <div id="about_bar">

      <?php
        if(i_own_content($user_data)){

          echo "About <a href='". ROOT . "profile/$user_data[tag_name]/settings' class='text-hover-underline'>Edit</a><br>";
        }else{

          echo "About <a href='". ROOT . "profile/$user_data[tag_name]/about' class='text-hover-underline'>See More</a><br>";
        }

          $settings_class = new Settings();

          $settings = $settings_class->get_settings($user_data['userid']);

          if(is_array($settings)){

            echo "<br>
              <div style='border:none;width:auto;font-size:11px;color:black;' name='about'>".htmlspecialchars($settings['about'])."</div>
            ";
          }

      ?>

    </div>

    <!--friends area-->
    <div id="friends_bar">

      Following <a href="<?=ROOT?>profile/<?php echo $user_data['tag_name'] ?>/following" class="text-hover-underline">See All</a><br>

      <?php

        if($friends){

          foreach ($friends as $friend) {
            // code...
            $FRIEND_ROW = $user_class->get_user($friend['userid']);
            include("user.php");
          }
        }else
        if(i_own_content($user_data)){

          echo "<br>";
          echo "<div style='font-size:11px;color:gray;text-align:center;'>You are currently not following anyone. You can search for friends using the <a href='".ROOT."search' class='text-hover-underline' style='font-size:11px;float:none;color:none;'>search bar</a>.</div>";
        }

       ?>

    </div>

    <!--photos area-->
    <div id="photos_bar">

      Photos <a href="<?=ROOT?>profile/<?php echo $user_data['tag_name'] ?>/photos" class="text-hover-underline">See All Photos</a><br>

      <?php

        $DB = new Database();
        $sql = "select image,postid from posts where has_image = 1 && userid = $user_data[userid] && owner = 0 order by id desc limit 9";
        $images = $DB->read($sql);

        $image_class = new Image();

        if(is_array($images)){

          foreach ($images as $image_row) {

            echo "<a href='". ROOT . "single_post/$image_row[postid]' class='img-hover-darken'>";
            echo "<img src='" . ROOT . $image_class->get_thumb_post($image_row['image']) . "' style='flex:1;width:80px;margin:3px;' />";
            echo "</a>";
          }
        }else
        if(i_own_content($user_data)){

          echo "<br>";
          echo "<div style='font-size:11px;color:gray;text-align:center;'>No photos to show. You can share images with your friends using the textbox.</div>";
        }
      ?>
    </div>

  </div>

  <!--posts area-->
  <div class="textbox_area">

  <?php if($user_data['userid'] == $_SESSION['mybook_userid']): ?>
    <div id="textarea" style="border:solid thin #aaa; padding: 10px;background-color: white;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);border-radius: 10px;">

      <form method="post" enctype="multipart/form-data">
        <?php $user_data = $login->check_login($_SESSION['mybook_userid']); ?>
        <textarea id="autoresizing" name="post" placeholder="What's on your mind, <?= $user_data['first_name'] ?>?"></textarea>

          <div class="image-preview" id="imagePreview">
            <img src="" class="image-preview__image" alt="Video selected">
          </div>

          <!-- <div class="video-preview" id="videoPreview">
            <video controls autoplay muted class="video-preview__video" id="video" src=""></video>
          </div> -->

        <br>
        <label for="inpFile"><img id="image_icon" src="http://localhost/mybook/images/images_icon.png"></label>
        <input id="inpFile" type="file" name="file" style="display:none;">
        <!-- <label for="inpFile2"><img id="video_icon" src="images/video_icon.png"></label>
        <input id="inpFile2" type="file" name="file" style="display:none;" accept="video/*"> -->
        <input id="post_button" type="submit" value="Post" style="margin:5px;">
        <br>
      </form>
    </div>

  <?php endif; ?>

      <!--posts-->
      <?php if(!($user_data['userid'] == $_SESSION['mybook_userid'])): ?>
        <div id="post_bar" style="margin-top:0px;">

          <?php

            if(!$posts){
              echo "<br>";
              echo "<div style='font-size:18px;color:gray;text-align:center;'>No posts available</div>";
              echo "<br>";
            }else{

              foreach ($posts as $ROW) {

                $user = new User();
                $ROW_USER = $user->get_user($ROW['userid']);

                include("post.php");
              }
            }

            //get current url
            $pg = pagination_link();
          ?>

          <a href="<?php echo $pg['next_page'] ?>">
            <input id="post_button" type="button" value="Next Page" style="float:right;width:150px;">
          </a>
          <a href="<?php echo $pg['prev_page'] ?>">
            <input id="post_button" type="button" value="Prev Page" style="float:left;width:150px;">
          </a>
          </div>

      <?php else: ?>
        <div id="post_bar">

          <?php

            if(!$posts){
              echo "<br>";
              echo "<div style='font-size:18px;color:gray;text-align:center;'>No posts available</div>";
              echo "<br>";
            }else{

              foreach ($posts as $ROW) {

                $user = new User();
                $ROW_USER = $user->get_user($ROW['userid']);

                include("post.php");
              }
            }

            //get current url
            $pg = pagination_link();
          ?>

          <a href="<?php echo $pg['next_page'] ?>">
            <input id="post_button" type="button" value="Next Page" style="float:right;width:150px;">
          </a>
          <a href="<?php echo $pg['prev_page'] ?>">
            <input id="post_button" type="button" value="Prev Page" style="float:left;width:150px;">
          </a>
          <br>
          </div>

      <?php endif; ?>

      </div>
    </div>

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

//   //preview video in textarea
//   const input = document.getElementById('inpFile2');
//   const video = document.getElementById('video');
//   //const previewContainer = document.getElementById("videoPreview");
//   //const previewVideo = previewContainer.querySelector(".video-preview__video");
//   const videoSource = document.createElement('source');
//
//   input.addEventListener('change', function() {
//   const files = this.files || [];
//
//   if (!files.length) return;
//
//   const reader = new FileReader();
//
//   reader.onload = function (e) {
//     videoSource.setAttribute('src', e.target.result);
//     video.appendChild(videoSource);
//     video.load();
//     video.play();
//   };
//
//   reader.onprogress = function (e) {
//     console.log('progress: ', Math.round((e.loaded * 100) / e.total));
//   };
//
//   reader.readAsDataURL(files[0]);
// });

//show hashtag function
const modalHash = document.querySelector(".hash-box-wrapper");
let submitButton = $("#submitPostButton");


$(window).on("click",function(e){
    if(e.target == modalHash){
        modalHash.style.display = "none";
    }
})

$("#postTextarea").keyup(e=>{
    let regex = /[#|@](\w+)$/ig;
    let textbox = $(e.target);
    let content = textbox.val().trim();
    let max = 200;
    let text = content.match(regex);

    if(text != null && text != ""){
        var dataString = 'hashtag=' + text;
        $.ajax({
            type: "POST",
            data: dataString,
            url: "http://localhost/sociacube/ajax/getHashtag.php",
            cache: false,
            success: function(data){
                modalHash.style.display = "block";
                $(".hash-box ul").html(data);
                $(".hash-box li").click(function(){
                    let value = $.trim($(this).find('.getValue').text());
                    let oldContent = $("#postTextarea").val();
                    let newContent = oldContent.replace(regex,"");
                    $("#postTextarea").val(newContent + value + ' ');
                    modalHash.style.display = "none";
                    $("#postTextarea").focus();
                    $("#count").text(max - content.length);
                })
            }
        })
    }else{
        modalHash.style.display = "none";
    }

    $("#count").text(max - content.length);
    if(content.length > max){
        $("#count").css("color","#f00");
    }else{
        $("#count").css("color","#000");
    }
})

</script>
