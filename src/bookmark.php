<?php 
$uid=$_REQUEST['uid'];
$user=$_REQUEST['user'];
$conn=mysqli_connect('localhost','root','','se');
if($conn){
   $query="SELECT * FROM `likes` WHERE Username='$user' and uid='$uid'";
   $result=mysqli_query($conn,$query);
   $count = mysqli_num_rows($result);
   if($count==0){
    echo "add";
    $insert_query="INSERT INTO `likes` VALUES('$user','$uid')";
    mysqli_query($conn,$insert_query);
   }
   else{
    mysqli_query($conn,"DELETE FROM `likes`   WHERE Username='$user' and uid='$uid' ");
    echo "remove";
   }
}
?>