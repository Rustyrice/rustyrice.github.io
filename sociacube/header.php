<!--top bar--->
<?php

  $corner_image = "images/user_male.jpg";
  if(isset($USER)){

    if(file_exists($USER['profile_image']))
    {
      $image_class = new Image();
      $corner_image = $image_class->get_thumb_profile($USER['profile_image']);
    }else{

      if($USER['gender'] == "Female"){

        $corner_image = "images/user_female.jpg";
      }
    }
  }

?>

<div class="sticky" id="blue_bar">
  <form method="get" action="<?=ROOT?>search">
    <div style="width: 800px;margin: auto;font-size: 28px;">

      <a href="<?=ROOT?>home" id="title" style="color:white;text-decoration:none;">Sociacube</a>
        &nbsp &nbsp <input id="search_box" type="text" name="find" placeholder="Search Sociacube"></a>


      <?php if(isset($USER)): ?>
        <a id="corner_image" href="<?=ROOT?>profile">
          <img src="<?php echo ROOT .  $corner_image ?>" style="width:50px;float:right;">
        </a>

        <a href="<?=ROOT?>logout">
          <span style="font-size:11px;float:right;margin:10px;color:white;">Logout</span>
        </a>

        <a href="<?=ROOT?>notifications" style="text-decoration:none;margin:30px 20px 10px 10px;position:relative;top:10px;">
          <span style="display:inline-block;position:relative;">
            <svg id="notification_icon" width="22" height="22" viewBox="0 0 24 24"><path d="M15.137 3.945c-.644-.374-1.042-1.07-1.041-1.82v-.003c.001-1.172-.938-2.122-2.096-2.122s-2.097.95-2.097 2.122v.003c.001.751-.396 1.446-1.041 1.82-4.667 2.712-1.985 11.715-6.862 13.306v1.749h20v-1.749c-4.877-1.591-2.195-10.594-6.863-13.306zm-3.137-2.945c.552 0 1 .449 1 1 0 .552-.448 1-1 1s-1-.448-1-1c0-.551.448-1 1-1zm3 20c0 1.598-1.392 3-2.971 3s-3.029-1.402-3.029-3h6z"/></svg>
            <?php
              $notif = check_notifications();
             ?>
            <?php if($notif > 0): ?>
              <div style="background-color:red;color:white;position:absolute;right:-3px;width:10px;height:10px;border-radius:50%;padding:3px;text-align:center;font-size:8px;margin-top:-42px;"><?php echo $notif ?></div>
            <?php endif; ?>
          </span>
        </a>

        <a href="<?=ROOT?>messages">
          <span style="display:inline-block;position:relative;top:10px;">
            <svg id="messages_icon" width="22" height="22" viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.97l-11.985 9.713zm0 2.574l-12-9.725v15.438h24v-15.438l-12 9.725z"/></svg>
            <?php
              $notif = check_messages();
             ?>
            <?php if($notif > 0): ?>
              <div style="background-color:red;color:white;position:absolute;right:-5px;width:10px;height:10px;border-radius:50%;padding:3px;text-align:center;font-size:8px;margin-top:-42px;"><?php echo $notif ?></div>
            <?php endif; ?>
          </span>
        </a>

      <?php else: ?>
        <a href="<?=ROOT?>login">
          <span style="font-size:11px;float:right;margin:10px;color:white;">Login</span>
        </a>
      <?php endif; ?>
    </div>
  </form>
</div>
