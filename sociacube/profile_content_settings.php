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

<div style="min-height:400px;width:100%;background-color:white;text-align:center;position: relative;top:20px;border-radius:10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  <div style="padding:20px;max-width:450px;display:inline-block;">
    <form method="post" enctype="multipart/form-data">

      <?php

          $settings_class = new Settings();

          $settings = $settings_class->get_settings($_SESSION['mybook_userid']);

          if(is_array($settings)){

            echo "<p style='font-size:11px;color:grey;float:left;margin:-20px;padding:30px;'>First Name</p>";
            echo "<input type='text' id='textbox' name='first_name' value='".htmlspecialchars($settings['first_name'])."' placeholder='First Name'/>";

					  echo "<p style='font-size:11px;color:grey;float:left;margin:-20px;padding:30px;'>Last Name</p>";
            echo "<input type='text' id='textbox' name='last_name' value='".htmlspecialchars($settings['last_name'])."' placeholder='Last Name'/>";

					  echo "<p style='font-size:11px;color:grey;float:left;margin:-20px;padding:30px;'>Email</p>";
            echo "<input type='email' id='textbox' name='email' value='".htmlspecialchars($settings['email'])."' placeholder='Email'/>";

					  echo "<p style='font-size:11px;color:grey;float:left;margin:-20px;padding:30px;'>New Password</p>";
            echo "<input type='password' id='textbox' name='password' placeholder='Password'/>";

					  echo "<p style='font-size:11px;color:grey;float:left;margin:-20px;padding:30px;'>Retype New Password</p>";
            echo "<input type='password' id='textbox' name='password2' placeholder='Password'/>";
            echo "<br>";

					  echo "<br>About Me:<br>
              <textarea id='textbox' style='height:200px;' name='about' placeholder='Tell us a bit about yourself...'>".htmlspecialchars($settings['about'])."</textarea>
            ";

            echo '<input style="position:relative;left:20px;" id="post_button" type="submit" value="Save">';
        }

      ?>
    </form>
  </div>
</div>
<br><br>
