<?php 
    session_start();
    $conn=mysqli_connect('localhost','root','','se');
    if($conn){
        $user=$_SESSION['username'];
        $query="SELECT uid FROM `likes` WHERE Username='$user'";
        $likes=mysqli_fetch_all(mysqli_query($conn,$query),MYSQLI_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/notes.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="sidenav">
        <h1 class="heading">Kitaab</h1>
        <div class="userimg"> <img src="../static/images/kitaab.svg" alt="" class=""></div>
       
        <h4 class="fields"><i class="far fa-user"></i>Kushal Jha</h4>
        <h4 class="fields"><i class="far fa-bookmark"></i>Bookmarks</h4>
        <h4 class="fields"><i class="fas fa-upload"></i>My Uploads</h4>
        <h4 class="fields logout"><i class="fas fa-sign-out-alt"></i>Logout</h4>
    </div>



        <div class="content">
            <h4 class="silverline">Home>Bookmarks</h4>
            <div class="notes">
                <?php 
                    foreach($likes as $l){

                    $uid=$l['uid'];
                    $notes=mysqli_fetch_all(mysqli_query($conn,"SELECT Link,Author FROM `notes` WHERE uid='$uid'"),MYSQLI_ASSOC);
                    foreach($notes as $note){ $link=$note['Link'];
                ?>

                        <div class="content-box">
                        <iframe src="<?php  echo $link;?>" width="350" height="200" allow="autoplay"></iframe>
                        <h4 class="mininav">By:- <?php echo $note['Author']?></h4>
                        </div>

                <?php }}?>
            </div>
            
        </div>
        
    </div>

</body>