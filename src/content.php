<?php 
     $conn=mysqli_connect('localhost','root','','se');
    if($conn){
        session_start();
        $subject=$_SESSION['subject'];
        $subject=$subject."topics";
        $query_topic="SELECT Topics FROM `$subject` ";
        $topicname=mysqli_fetch_all(mysqli_query($conn,$query_topic),MYSQLI_ASSOC);
    }
    else{
        
    }
    if(isset($_POST['submit'])){
        $_SESSION['topic']=$_POST['submit'];
        header('Location:notes.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/content.css">
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
        <h4 class="silverline">Home>Operating System</h4>
        <div class="topics">
            <?php foreach($topicname as $topic) {?>
            <div class="box" onclick="call('<?php echo $topic['Topics']?>')">
                <img src="../static/images/notebook.png" alt="" class="topic_image">
                <h3><?php echo $topic['Topics'];?></h3>
            </div>
            <?php }?>
        </div>
        </div>
    </div>
    <form method="POST"><input type="submit" name="submit" class="myForm" value="ss"></form>
    <script>
        function call(e){
            document.querySelector('.myForm').value=e;
            document.querySelector('.myForm').click();
        }
    </script>
</body>
</html>