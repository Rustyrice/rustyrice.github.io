<?php

session_start();

    include("classes/connect.php");
    include("classes/login.php");

    $email = "";
    $password = "";


    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        $login = new Login();
        $result = $login->evaluate($_POST);

        if($result != "")
        {

          echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
          echo "The following errors occured:<br><br>";
          echo $result;
          echo "</div>";
        }else
        {

            header("Location:" . ROOT . "profile");
            die;
        }


        $email = $_POST['email'];
        $password = $_POST['password'];


    }


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Log In | Sociacube</title>
 		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
   </head>

   <style media="screen">
    <?php include 'css/main.css'; ?>
    <?php include 'css/responsive.css'; ?>
  </style>

  <body style="font-family: tahoma;background-color: #e9ebee;">

    <div id="bar" style="height:60px;">

        <div id="title" style="font-size:40px;text-align:center;cursor:default;">Sociacube</div>

    </div>

    <div id="bar2">

    <form method="post">
      Log in to Sociacube<br><br>

      <input name="email"value="<?php echo $email ?>" type="email" id="text" placeholder="Email"><br><br>
      <input name="password" value="<?php echo $password ?>" type="password" id="text" placeholder="Password"><br><br>

      <input type="submit" id="button" value="Log In"><br><br><br>

    </form>

    <a href="<?=ROOT?>signup" id="signup_link">
      Don't have an Account? Signup here.
    </a><br><br>
  </body>
</html>
