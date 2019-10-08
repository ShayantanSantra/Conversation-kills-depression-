<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>HomePage</title>
  <meta charset="utf-8">
  <script src="http://localhost/social-website-for-help/js/include.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
<body>
<nav class="navbar navbar-default" style="background-color:black;height:60px;width:100%;">
  <div class="container-fluid">
    <div class="navbar-header">
    <!--  <a class="navbar-brand" href="#">WebSiteName</a>-->
	<a href="http://localhost/social-website-for-help/index.php" class="login" title="Homepage"><img src="images/download.png" style="width:45px;border-radius:30px;height:45px;"/></a>
</div>
   <ul class="nav navbar-nav" style="float:right;">
   <li><div style="color:white;margin-right:200px;"><h3 style="font-family:cursive;font-size:25px;">Welcome, We are here to help you!</h3></div>
      <li><div id="signup" ><a href="#?Singup" onclick="signup()">Create an account </a></div>
   <li><div id="login" ><a href="#?login" onclick="login()">Log In</a></div>
      <li><form>
	<input type="search" placeholder="Search" style="margin-top:5px;right:10%;">
</form></li>
    </ul>
  </div>
</nav>
</div>
<div id="login-form" class="animate" align="center">
  <div class="container-login100">
  <span onclick="document.getElementById('login-form').style.display='none'" style="margin-left:350px;margin-bottom:10px;width:20px;opacity:1;height:20px;" class="close" title="Close PopUp">&times;</span>
			<div class="wrap-login100">
				
				<div class="login100-form-title" style="background-image: url(images/scene.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

				<form class="login100-form validate-form" autocomplete="off" action="index.php" method="post">
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter Username" style="margin-right:200px;">
						
					</div>

					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter Password">
					
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login_user" type="submit">
							Login
						</button>
						<div style="margin-top:10px;font-size:14px;">
							<a href="#" class="txt1" style="color:black;margin-left:80px;">
								Forgot Password?
							</a>
						</div>
						<div style="margin-top:10px;font-size:14px;">
							Don't have an account <a href="#" onclick="signup()" class="txt1" style="color:black;margin-left:5px;margin-top:10px;">Sign up</a>
						</div>
					</div>
				</form>
			</div>
		</div>
  </div>
  <div id="signup-form" class="animate" align="center">
  <div class="container-login100">
  <span onclick="document.getElementById('signup-form').style.display='none'" style="margin-left:350px;margin-bottom:10px;width:20px;opacity:1;height:20px;" class="close" title="Close PopUp">&times;</span>

			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg1.jpg);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
				</div>

				<form class="login100-form validate-form" action="index.php" autocomplete="off" method="post">
						<?php include('errors.php'); ?>
					<div class="wrap-input100 validate-input m-b-26">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter a unique Username" value="<?php echo $username; ?>" style="margin-right:200px;">
						
					</div>
					<div class="wrap-input100">
						<span class="label-input100">E-mail</span>
						<input class="input100" type="email" name="email" placeholder="Enter E-mail" value="<?php echo $email; ?>" style="margin-right:200px;">
						
					</div>

					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter Password">
				
					</div>
					<div class="wrap-input100 validate-input m-b-18">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="conpass"  placeholder="confirm Password">
				
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="reg_user" type="submit">
							Sign Up
						</button>
						
						<div style="margin-top:10px;font-size:14px;">
							Already have an account<a href="#" onclick="login()" class="txt1" style="color:black;margin-left:5px;margin-top:10px;">Log In</a>
						</div>
					</div>
				</form>
			</div>
		</div>
  </div>
<video loop id="myVideo1" class="thevideo" src="vids/vid1.mp4" type="video/mp4" onmouseover="play()" onmouseout="pause()"></video>  
<video loop id="myVideo2" class="thevideo" src="vids/vid2.mp4" type="video/mp4" onmouseover="play()" onmouseout="pause()"></video>
<video loop id="myVideo3" class="thevideo" src="vids/vid3.mp4" style="margin-bottom:0px;" type="video/mp4" onmouseover="play()" onmouseout="pause()"></video>
  
</body>
</html>
