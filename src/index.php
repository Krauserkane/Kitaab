<?php 
    $err="";
    if(isset($_POST['submit'])){
        session_start();
        
        $name=$_POST['user'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $conn=mysqli_connect('localhost','root','','se');
        $query="SELECT Username FROM `users` WHERE Username='$name' and Password='$password' and Email='$email'";
        $result=mysqli_query($conn,$query);
        $count=mysqli_num_rows($result);
        if($count>0){
            $_SESSION['username']=$name;
            if($_SESSION['username']=="admin" && $password=="admin"){
                header('Location:admin.php');
            }
            else{
                header('Location:home.php');
            }
            
        }
        else{
          
            echo mysqli_error($conn);
        }
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="img"><img src="../static/images/login.svg" alt=""></div>
        
        <div class="form">
            <h2>Login</h2>
            <form method="POST">
                <i class="fa fa-user" aria-hidden="true"></i>
<input type="text" placeholder="Username" class="take" name="user" required><br>
<i class="fa fa-envelope" aria-hidden="true"></i>
<input type="text" placeholder="Email" class="take" name="email" required><br>
<i class="fa fa-key-modern" aria-hidden="true"></i>
<input type="password" placeholder="Password" class="take" name="password" required><br>


<input class="submit" type="submit" name="submit" >
            </form>
        </div>
    </div>
</body>
<script>
    
</script>
</html>