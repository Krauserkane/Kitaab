<?php
    session_start();
    if(isset($_POST['osform'])){
        $_SESSION['subject']= $_POST['osform'];
        header('Location:content.php');
    }
    if(isset($_POST['dbmsform'])){
        $_SESSION['subject']= $_POST['dbmsform'];
        header('Location:content.php');
    }
    if(isset($_POST['seform'])){
        $_SESSION['subject']= $_POST['seform'];
        header('Location:content.php');
    }
    if(isset($_POST['cnform'])){
        $_SESSION['subject']= $_POST['cnform'];
        header('Location:content.php');
    }
    if(isset($_POST['dsform'])){
        $_SESSION['subject']= $_POST['dsform'];
        header('Location:content.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Notes Management</title>
</head>
<body>  
    <div class="sidenav">
        <h1 class="heading">Kitaab</h1>
        <div class="userimg"> <img src="../static/images/kitaab.svg" alt="" class=""></div>
       
        <h4 class="fields"><i class="far fa-user"></i><?php echo $_SESSION['username'];?></h4>
        <h4 class="fields" onclick="red()"><i class="far fa-bookmark"></i>Bookmarks</h4>
        <h4 class="fields" onclick="up()"><i class="fas fa-upload"></i>Upload Requests</h4>
        
        <h4 class="fields logout"><i class="fas fa-sign-out-alt"></i>Logout</h4>
    </div>
    <form action="show_bookmark.php">
        <input type="submit" id="bk" styles="display:hidden;">
    </form>
    <form action="admin_uploads.php">
        <input type="submit" id="up" styles="display:hidden">
    </form>
    <div class="subjects">
        <div class="os box">
            <img src="../static/images/os.svg" alt="" class="subject_image">
            <form method="POST"><input type="submit" name="osform" value="os" class="osform" style="display:none">
            </form>
            <h3>Operaing Systems</h3>
        </div>
        <div class="dbms box">
            <img src="../static/images/dbms.png" alt="" class="subject_image dbimage">
            <form method="POST"><input type="submit" name="dbmsform" value="dbms" class="dbmsform" style="display:none"></form>
            <h3>Databse Management Systems</h3>
        </div>
        <div class="se box">
            <img src="../static/images/se.png" alt="" class="subject_image dbimage">
            <form method="POST"><input type="submit" name="seform" value="se" class="seform" style="display:none"></form>
            <h3>Software Engineering</h3>
        </div>
        <div class="cn box">
            <img src="../static/images/cn.png" alt="" class="subject_image dbimage">
            <form method="POST"><input type="submit" value="cn" name="cnform" class="cnform" style="display:none"></form>
            <h3>Computer Networks</h3>
        </div>
        <div class="ds box">
            <img src="../static/images/ds.png" alt="" class="subject_image dbimage">
            <form method="POST"><input type="submit" value="ds" name="dsform" class="dsform" style="display:none"></form>
            <h3>Data Structures</h3>
        </div>
       
       
    </div>
    <script>
        document.querySelector(".os").addEventListener('click',()=>{
            document.querySelector(".osform").click()
        })
        document.querySelector(".dbms").addEventListener('click',()=>{
            document.querySelector(".dbmsform").click()
        })
        document.querySelector(".se").addEventListener('click',()=>{
            document.querySelector(".seform").click()
        })
        document.querySelector(".cn").addEventListener('click',()=>{
            document.querySelector(".cnform").click()
        })
        document.querySelector(".ds").addEventListener('click',()=>{
            document.querySelector(".dsform").click()
        })


        function red(){
            document.getElementById('bk').click();
        }
        function up(){
            document.getElementById('up').click();
        }
    </script>
</body>
</html>