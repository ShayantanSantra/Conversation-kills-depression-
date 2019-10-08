<?php
    session_start();
    require('connect.php');
    
    if(@$_SESSION["username"]){
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Forum Page</title>
</head>
<?php
echo "<center><h1>Members</h1>";
@$check = mysqli_query("select * from signup");
@$rows = mysqli_num_rows($check);

while(@$row=mysqli_fetch_assoc($check)){
    $id = $row['id'];
    
    echo "<a href='profile.php?id=$id'".row['username']."</a><br/>";

}
echo "</center>";
?>
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
    <li class="nav-item" style="margin-top:10px;margin-left:800px;">
    <a href="post.php"><button>New Topic</button></a>
    </li>
  </ul>
</nav>
    
</body>
</html>
<?php
    if(@$_GET['action']=="logout"){
        session_destroy();
        header("Location: /index.php");

    }
    }else{
        echo "You must logged in";

    }
    
?>