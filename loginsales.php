<?php	
session_start();	
require'functions.php';

// cek cookie
if (isset($_COOKIE['login']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    
    // ambil username berdasarkan id
    $result=mysqli_query($conn,"SELECT username FROM 
    admin1 WHERE id=$id");
    $row= mysqli_fetch_assoc($result);

    // cek coockie dan username
    if($key === hash('sha256',$row['username'])){
        $_SESSION['login'] = true;
    }
}


// cek session
if (isset($_SESSION["login"])){
    header("Location: indexsales.php");
    exit;
}

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"]; //inputan password
    
    $result = mysqli_query($conn,"SELECT *  FROM sales 
    WHERE username = '$username'");

    // cek username
    if(mysqli_num_rows($result) == 1){

        // cek password(bandingkan pass1 dan pass 2)
        $row = mysqli_fetch_assoc($result);
       if( password_verify($password,$row["password"])){
            // set session
            $_SESSION["login"]=true;
            // cek remember me
            if(isset($_POST['remember'])){
                // buat cookie beserta enkripsi
                
                setcookie('id',$row["id"],time()+60);
                setcookie('key',hash('sha256',  $row["username"],
                time()+60));

                
            }


            header("Location: indexsales.php");// masuk ke halaman index
            exit;
       } 
       
    }
    $error = true;

}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login sales</title>
    <link rel="stylesheet" href="main.css">
<style>
    
</style>
</head>
<body> 
<div class="parent clearfix">
    <div class="bg-illustration">
      <img src="https://i.ibb.co/Pcg0Pk1/logo.png" alt="logo">
  
      <div class="burger-btn">
        <span></span>
        <span></span>
        <span></span>
      </div>
  
    </div>
    
    <div class="login">
      <div class="container">
        <h1>Halaman Login Sales</h1>
    
        <div class="login-form">
        <?php	if (isset($error)):?>
        <p style="color:red;font-style:italic;align-items:center;">username/password salah</p>
         <?= "<script>
        alert('username/password salah');
        </script>";?>
        <?php	endif;?>
      
          <form action="" method="post">
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="password"name="password" id="password" placeholder="Password">
  
            <div class="remember-form">
              <input type="checkbox" name="remember" id="remember">
              <span>Remember me</span>

            </div>
            <div class="forget-pass">
              <a href="#">Forgot Password ?</a>
            </div>
  
            <button type="submit" name="login">LOG-IN</button>
            <a href="registrasi.php">registrasi Admin</a> 
              <br>
            <a href="login.php">Login sebagai Admin</a> 
          </form>
          
        </div>
    
      </div>
      </div>
  </div>
   
</body>
</html>