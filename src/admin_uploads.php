<?php 
    session_start();
    $conn=mysqli_connect('localhost','root','','se');
    if(isset($_POST['submit'])){
        $link=$_POST['link'];
        $sub=$_POST['sub'];
        $subtopic=$_POST['subtopic'];
        $new_link=str_replace("view","preview",$link);
        $user=$_SESSION['username'];
        $digits = 3;
        $uid= rand(pow(10, $digits-1), pow(10, $digits)-1);

        $upload_query="INSERT INTO `notes` Values('$subtopic','$link','$user','$uid')";
        mysqli_query($conn,$upload_query);
    }

    if(isset($_POST['Accept'])){
        $req_uid=$_POST['uid'];
        mysqli_query($conn,"DELETE FROM `request` WHERE uid='$req_uid'");
        $TOPIC=$_POST['topic'];
        $_link=$_POST['links'];
        $name=$_POST['name'];
        if(mysqli_query($conn,"INSERT INTO `notes` VALUES('$TOPIC','$_link','$name','$req_uid')")){
            // echo "Done";
        }
        else{
            echo mysqli_error($conn);   
        }
    }
    if(isset($_POST['reject'])){
        $req_uid=$_POST['uid'];
        mysqli_query($conn,"DELETE FROM `request` WHERE uid='$req_uid'");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploads</title>
    <link rel="stylesheet" href="../static/css/uploads.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<style>
    .Accept{
        background-color:green;
        color:white;
        height:20px;
        width:5rem;
        position:relative;
        bottom:20px;
        left: 170px;
        cursor:pointer;
    }
    .Reject{
        background-color:red;
        color:white;
        height:20px;
        width:5rem;
        position:relative;
        bottom:20px;
        left: 170px;
        cursor:pointer;
    }
</style>
<body>
    <div class="sidenav">
        <h1 class="heading">Kitaab</h1>
        <div class="userimg"> <img src="../static/images/kitaab.svg" alt="" class=""></div>   
        <h4 class="fields"><i class="far fa-user"></i><?php echo $_SESSION['username'];?></h4>
        <h4 class="fields" onclick="red()"><i class="far fa-bookmark"></i>Bookmarks</h4>
        <h4 class="fields" onclick="up()"><i class="fas fa-upload"></i>My Uploads</h4>        
        <h4 class="fields logout"><i class="fas fa-sign-out-alt"></i>Logout</h4>
    </div>

   

    <div class="content">
        <h4 class="silverline">Home>Uploads </h4>
        <button class="button" onclick="upload()">Upload</button>

        <form  method="POST">
           <label for="">Add link</label> <input type="text" name="link" style="width:40rem; height:30px;margin-left:2rem">
           <br>
           <br>
            <select name="sub" style="height:25px;margin-left:6rem" onchange="get(this.value)">
                <option value="os">Operating Systems</option>
                <option value="se">Software Engineering</option>
                <option value="ds">Data Strucutres</option>
                <option value="cn">Computer Network</option>
                <option value="dbms">Database Management System</option>
            </select>

            <select name="subtopic" id="subtopic" style="height:25px">
                <option value="">Select subtopic</option>
            </select>
            <input type="submit" name="submit" id="submit" style="display:none">
        </form>


        <div class="line"></div>

        <?php 
            $user=$_SESSION['username'];
            $getquery="SELECT * FROM `request`";
            $get=mysqli_fetch_all(mysqli_query($conn,$getquery),MYSQLI_ASSOC);
        ?>

        <div class="contentt">
            <div class="notes">
                <?php foreach($get as $req) {?>
                <div class="content-box">
                <iframe src="<?php  echo $req['link'];?>" width="350" height="200" allow="autoplay"></iframe>
                <?php echo $req['Username'];?>
                <form method="POST">
                <input type="text" value="<?php echo $req['link'];?>" name="links" style="display:none">
                <input type="text" value="<?php echo $req['Username'];?>" name="name" style="display:none">
                <input type="text" value="<?php echo $req['uid'];?>" name="uid" style="display:none">
                <input type="text" value="<?php echo $req['subtopic'];?>" name="topic" style="display:none">
                <button type="submit" class="Accept" name="Accept">Accept</button>
                <button type="submit" class="Reject" name="reject">Reject</button>
                </form>
                </div>
                <?php }?>
            </div>
        </div>

        
    
   
    <script>
        function get(data){
            xhttp=new XMLHttpRequest();
            xhttp.open('GET','get.php?datavalue='+data,true)
            xhttp.send();
            xhttp.onreadystatechange=function(){
                if(xhttp.readyState==4 && xhttp.status==200){
                    document.getElementById('subtopic').innerHTML=xhttp.responseText
                }
            }
        }

        function upload(){
            document.querySelector("#submit").click();
        }
       
    </script>
</body>
</html>