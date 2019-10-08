<?php
    session_start();
    require('connect.php');
    
    if(@$_SESSION["username"]){
?>
<html>
<head>
    
    <title>Forum Page</title>
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
    <li class="nav-item" style="margin-top:10px;margin-left:800px;">
    <a href="post.php"><button style="padding:5px;background-color:cyan;color:black;font-family:cortana;">Share Here</button></a>
    </li>
  </ul>
</nav>


</body>
</html>

<?php
$conn = mysqli_connect("localhost", "root", "", "social_site");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$id=$_GET['id'];

$result = mysqli_query($conn, "SELECT username, email FROM signup where id='".$id."'");
if (mysqli_num_rows($result) != 0) {
    // output data of each row
    echo "<br/>";
    
    while($row = mysqli_fetch_assoc($result)) {
        echo $row['username'];
        
        echo "<b>".$row["email"]."</b>" ;

    }
    
    } else { echo "0 results"; }
    $conn->close();

    
?>