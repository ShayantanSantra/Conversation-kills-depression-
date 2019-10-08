<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Welcome Admin</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/loginadmin.css">
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
   <li><div style="color:white;margin-right:100px;"><h3 style="font-family:cursive;font-size:25px;">Welcome Admin!</h3></div>
  </div>
</nav>
<table style="margin-left:50px;margin-top:50px;" border="5px" cellspacing="2px" cellpadding="2px">
<tr>
<th>Topic Id</th>
<th>Topic Name</th>
<th>Topic Content</th>
<th>Topic Creator</th>
<th>Date created</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "social_site");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT topic_id, topic_name,topic_content,topic_creator,created FROM post";
$result = mysqli_query($conn, $sql);
$resultcheck=mysqli_num_rows($result);
  	if ($resultcheck > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
echo "<tr><td>" . $row["topic_id"]. "</td><td>" . $row["topic_name"] . "</td><td>". $row["topic_content"] . "</td><td>". $row["topic_creator"] . "</td><td>". $row["created"] ."</td>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
    </body>
</html>