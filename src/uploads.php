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

        $upload_query="INSERT INTO `request` Values('$user','$new_link','$uid','$sub','$subtopic')";
        mysqli_query($conn,$upload_query);
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
            <option value="">Select</option>
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
            $uploadquery="SELECT uid FROM `uploads` WHERE username='$user'";
            $upload=mysqli_fetch_all(mysqli_query($conn,$uploadquery),MYSQLI_ASSOC);
            $uploads=array();
            foreach($upload as $l)array_push($uploads,$l['uid']);

            $links=array();
            foreach($uploads as $uno){
                $upq="SELECT Link FROM `notes` WHERE uid='$uno'";
                $upqs=mysqli_fetch_all(mysqli_query($conn,$upq),MYSQLI_ASSOC);
                foreach($upqs as $u)array_push($links,$u['Link']);
            }
        ?>

        
    <div class="contentt">
        <div class="notes">
            <?php foreach($links as $link) { ?>
                <div class="content-box">
                <iframe src="<?php  echo $link;?>" width="350" height="200" allow="autoplay"></iframe>
                </div>
            <?php } ?>
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