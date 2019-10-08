<?php
    session_start();
    //require('connect.php');
    
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

$result = mysqli_query($conn, "SELECT topic_id, topic_name,topic_creator,created FROM post where topic_id='".$id."'");
if (mysqli_num_rows($result) != 0) {
    $row = mysqli_fetch_assoc($result);
    // output data of each row
    echo "<br/>";
        echo '<h3 style="font-family:cortana;" align=center>Post Title : '.$row['topic_name'].'</h3>';
        echo '<b>'.$row["topic_creator"]."</b>   " .$row["created"]."<br/><br/>" ;
        echo $row['topic_content'];
        echo "<a href='topic.php?action=report'><button style='border-radius:20px;margin-left:50px;padding:10px;font-size:20px;width:100px;'>report</button></a>";
        echo "<form method='POST'>";
        echo "<textarea name='reply_b' placeholder='You can reply here....' style='margin-top:10px;resize: none; width: 400px; height:300px;margin-bottom:0px;border-radius:20px;margin-left:30px;'></textarea>";
        echo "<a href='topic.php?action=reply'><button style='border-radius:20px;margin-left:30px;margin-bottom:100px;padding:10px;font-size:20px;width:100px;'>reply</button></a>";
        echo "</form>";

    }
    
 else { echo "0 results"; }
    if(@$_POST("action")=='report'){
        $sql="update post set flag=1 where topic_id=$id";
        $result = mysqli_query($conn, $sql);
    }
    if($_POST("action")=='reply'){
        $content=$_POST['reply_b'];
        $date=date('y-m-d');
        $query = "INSERT INTO reply VALUES ('$id','','$content','$date');";
        $result = mysqli_query($conn, $query);
        echo "<h4>".$row['topic_creator']."</h4><br />";
        echo $content;

    $conn->close();
    }}
?>