<?php
    session_start();
?>
<html>
<head>
    <title>Forum Page</title>
    <style>
        #myVideo {
    position: fixed;
    right: 0;
    bottom: 0;
    min-width: 100%; 
    min-height: 100%;
  }
  input[type=text] {
  border: 4px solid #999;
  border-radius: 16px;
  -webkit-appearance: none; 
  appearance: none;
}
textarea{
    border: 4px solid #999;
  border-radius: 16px;
  -webkit-appearance: none; 
  appearance: none;
}

        </style>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <body>
  
  <nav class="navbar navbar-expand-sm bg-warning navbar-dark">
  
  <ul class="navbar-nav">
    <li class="nav-item active">
    <a href="forum.php" class="nav-link" style="color:black;font-size:20px;font-family:cortana;">Home Page</a> 
    </li>
    <li class="nav-item">
    <a href="account.php" class="nav-link" style="color:black;font-size:20px;font-family:cortana;">My Account</a>
    </li>
    <li class="nav-item">
    <a href="members.php" class="nav-link" style="color:black;font-size:20px;font-family:cortana;">Member</a>
    </li>
    <li class="nav-item">
    <a href="forum.php?action=logout" class="nav-link" style="color:black;font-size:20px;font-family:cortana;">Log Out</a>
    </li>
    
  </ul>
</nav>

<form action="post.php" method="POST" autocomplete="ofF">

<center><br/>
<p style="font-size:25px;font-family:Times New Roman;"/>Topic Name:<br/><input type="text" placeholder="Enter topic name" name="topic_name" style="width: 400px"><br/><br/>
Content: <br/><textarea name="con" placeholder="Enter your problem here" style="resize: none; width: 400px; height:300px;margin-bottom:0px;"></textarea><br/><br/>
<input type="submit" name="submit" value="Post" style="width: 200px;border-radius:20px;background-color:orange;">
</center>

</form>
</body>
</html>
<?php

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "social_site");
$db = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
$no=rand(1,100);
    $t_name=$_POST['topic_name'];
    $content=$_POST['con'];
    $creator=$_SESSION["username"];
    $date1=date(DATE_RFC822);
    $query = "SELECT email from signup where username='$creator'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        $row = mysqli_fetch_assoc($results);
        $email=$row["email"];
    }
    $date=substr($date1,0,11);
    if(isset($_POST['submit'])){
        if($t_name && $content){
            if(strlen($t_name)>=10 && strlen($t_name)<=70){
                
                if (preg_match('%\b(idiot|moron|dumb)\b%i', $content) > 0) {
                    echo "<script>alert('Check the messsage before posting')</script>"; }      
                else if(preg_match('%\b(idiot|moron|dumb)\b%i', $content) == 0){
                    $query = "INSERT INTO post VALUES ('$no','$t_name','$content','$creator','$date',0);";
            mysqli_query($db, $query);   
                           
                    echo '<script>alert("message successfully sent");</script>'; 
                 }
                else{
                    echo '<script>alert(" A Failure occured");</script>';
                }
    }}}
?>