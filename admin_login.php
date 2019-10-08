<!doctype html>

<html>
	<head>
		
		<title>Admin Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/loginadmin.css">
		<!--<link rel="stylesheet" href="css/loginadmin.css" type="text/css" >-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> 
            <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Add icon library -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
	<script type="text/javascript">
	function myFunction() {
  var x = document.getElementById("psw");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
 </script>
	<body>
    <video autoplay muted loop id="myVideo">
  <source src="vids/adminlogin.mp4" type="video/mp4">

</video>
	<div class="loginBox">	
		<img src="images/a_icon.png" class="user">
		<h2 style="font-family:cursive;font-size:25px;background: -webkit-linear-gradient(lightgreen,green);margin-left:60px;-webkit-background-clip: text;-webkit-text-fill-color: transparent;">Admin LogIn</h2>
		<form autocomplete="off" method="POST" action="http://localhost/social-website-for-help/server.php">
		<i class="fa fa-user icon"></i>	
		<input type="text" name = "username" placeholder="Enter Username">
		<i class="fa fa-key icon"></i>
			<input type="password" name = "adminpsw" placeholder="Enter Password" id="psw">
			<table>
				<tr>
				   <td><div> <p style="margin-bottom:20px;font-size:18px;color:black;">Check password</p> </div></td>
				   <td><div> <input type="checkbox" style="margin-left:10px;" class='chkbox' onclick="myFunction()"></div></td>
				</tr>
        </table>
        <input type="submit" name = "submitadmin" style="font-family:courier header;" value="Sign In As Admin">	
		</form>
	</div>
    </body>
    </html>