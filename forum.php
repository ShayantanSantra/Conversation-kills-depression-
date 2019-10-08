<?php
    session_start();
    require('connect.php');
    
    if(@$_SESSION["username"]){
?>
<html>
<head>
    <style>
    h2{
        align:center;
        margin-right:100px;
    }
    </style>
    <title>Forum Page</title>
</head>
<link rel="stylesheet" type="text/css" href="css/style.css">
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


<h1 align="center" color="red" style="font-family:Times New Roman;">SOME MOTIVATIONAL QUOTES</h1>
<div style="border:10px solid pink;width:900px;margin-left:260px;padding:30px;border-radius:20px;font-family:cortana;">
<?php
$number = rand(1,8);

switch ($number) {
    case 1:
        echo '<h2 style="font-family:cortana;"><i>"You are not here merely to make a living.
         You are here in order to enable the world to live more amply,
          with greater vision, with a finer spirit of hope and achievement.
           You are here to enrich the world, and 
           you impoverish yourself if you forget the errand."</i></h2>
           <h3><b>~ Woodrow Wilson</b></h3>';
        break;
    case 2:
        echo '<h2 style="font-family:cortana;"><i>"Only I can change my life. No one can do it for me."</i></h2>

        <h3><b>~ Carol Burnett</b></h3>';
        break;
    case 3:
        echo '<h2 style="font-family:cortana;"><i>"Beginning today, treat everyone you meet as if they were going to
         be dead by midnight. Extend to them all the care, kindness and understanding you can
         muster, and do it with no thought of any reward. Your life will never be the same again."</i></h2>
         <h3><b>~ Og Mandino</b></h3>';
        break;
    case 4:
        echo '<h2 style="font-family:cortana;"><i>"Life is 10% what happens to you and 90% how you react to it."</i></h2>

        <h3><b>~ Charles R. Swindoll</b></h3>';
        break;
    case 5:
        echo '<h2 style="font-family:cortana;"><i>"Believe in yourself! Have faith in your abilities!
         Without a humble but reasonable confidence in your own powers
          you cannot be successful or happy."</i></h2>

        <h3><b>~ Norman Vincent Peale</b></h3>';
        break;
    case 6:
        echo '<h2 style="font-family:cortana;"><i>"Good, better, best. Never let it rest.
         Til your good is better and your better is best."</i></h2>

        <h3><b>~ St. Jerome</b></h3>';
        break;
    case 7:
        echo '<h2 style="font-family:cortana;"><i>"Optimism is the faith that leads to achievement. 
        Nothing can be done without hope and confidence."</i></h2>
        
        <h3><b>~ Hellen Keller</b></h3>';
        break;
    case 8:
        echo '<h2 style="font-family:cortana;"><i>"Infuse your life with action. Don\'t wait for it to happen. Make it happen.
         Make your own future. Make your own hope.
          Make your own love. And whatever your beliefs,
           honor your creator, not by passively waiting for grace 
           to come down from upon high, but by doing what you can to make
            grace happen... yourself, right now, right down here on Earth."</i></h2>

        <h3><b>~ Bradley Whitford</b></h3>';
        break;
    
}
?>
</div>
<div class="container">
 

<?php
$conn = mysqli_connect("localhost", "root", "", "social_site");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT `topic_id`, `topic_name`,`topic_creator`,`created` FROM `post`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) != 0) {
// output data of each row
echo "<br/>";
echo '<hr>'.'<i style="margin-left:500px;font-size:25px;font-family:Times New Roman;">'.'Recent posts'.'<i>'.'<hr>';
while($row = mysqli_fetch_assoc($result)) {
    $id=$row['topic_id'];
    echo '<div style="border:4px solid red;width:350px;margin-left:420px;margin-bottom:20px;padding:30px;border-radius:20px;font-family:cortana;height:150px">';
    echo "<h4><a href='topic.php?id=$id'>".$row['topic_name']."</a></h4>";
    echo "<b>".$row["topic_creator"]."</b>   " .$row["created"]."<br/><br/></div>";
}

} else { echo "0 results"; }
$conn->close();
?>

</body>
</html>
<?php
    if(@$_GET['action']=="logout"){
        session_destroy();
        header("Location: index.php");
    }
    }else{
        echo "You must logged in";
    }
    
?>
</div>