<?php 
    session_start();
    $conn=mysqli_connect('localhost','root','','se');
    if($conn){
        $topic=$_SESSION['topic'];
        $query="SELECT Link,Author,uid FROM `notes` WHERE Topic='$topic'";
        $notes=mysqli_fetch_all(mysqli_query($conn,$query),MYSQLI_ASSOC);
        $user=$_SESSION['username'];
        $likequery="SELECT uid FROM `likes` WHERE Username='$user'";
        $like=mysqli_fetch_all(mysqli_query($conn,$likequery),MYSQLI_ASSOC);
        $userlikes=array();
        foreach($like as $l)array_push($userlikes,$l['uid']);
    }
    else{
        echo "Eror";
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
        <h4 class="silverline">Home>Operating System>Inroduction to OS</h4>
        <div class="notes">
        <?php foreach($notes as $note){ $link=$note['Link']; $class=""; if(in_array($note['uid'],$userlikes))$class="added";?>
            <div class="content-box">
            <iframe src="<?php  echo $link;?>" width="350" height="200" allow="autoplay"></iframe>
            <h4 class="mininav">By:- <?php echo $note['Author']?></h4>
            <i class="fas fa-star star <?php echo $note['uid'];?> <?php echo $class;?>"  onclick="toggle(<?php echo $note['uid'];?>,'<?php echo $_SESSION['username'];?>')"></i>
            </div>
            <?php }?>

           
        </div>
        
        
    </div>

</body>
<script>
function toggle(id,username){
    
    xhttp=new XMLHttpRequest()
    xhttp.open('GET','bookmark.php?uid='+id+'&user='+username,true);
    xhttp.send()
    xhttp.onreadystatechange=function(){
                // console.log(data)
                if(xhttp.readyState==4 && xhttp.status==200){
                    response=(xhttp.responseText)
                    if(response=="add"){
                       // console.log(document.getElementsByClassName(id)[0].classList)
                       document.getElementsByClassName(id)[0].classList.add('added');
                         console.log(1);
                    }
                    else{
                        document.getElementsByClassName(id)[0].classList.remove('added');
                     console.log(2);
                    }
                }
    }
}
</script>
</html>