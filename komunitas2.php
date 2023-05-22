<?php
require'..\ppl\config\functions.php';

session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}


$username=$_SESSION["username"];
$tabel=$_SESSION["tabel"];
$aktor=profil($username);

$gambarprofil=query("SELECT * FROM $tabel WHERE username='$username'")[0];

$tabel1 = mysqli_query($conn,"SELECT * FROM $tabel WHERE username='$username'");
$postingan = mysqli_query($conn,"SELECT * FROM postingan ORDER BY id DESC; ");
$komentar = mysqli_query($conn,"SELECT * FROM komentar ");

// tambah postingan

if(isset($_POST["posting"])){

    if (tambahpostingan($_POST)>0){
        echo "<script>
        alert('postingan baru berhasil ditambahkan!');
        document.location.href = 'komunitas.php'
        </script>";
    }else{
        echo mysqli_error($conn);

    }

}
if(isset($_POST["komentar"])){

    if (tambahkomentar($_POST,$username)>0){
        echo "<script>
        alert('Komentar baru berhasil ditambahkan!');
        </script>";
    }else{
        echo mysqli_error($conn);

    }

}


?>


<!DOCTYPE html>
<html lang="en">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/index.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">



  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">



  <link href="https://fonts.googleapis.com/css?family=Manrope:200,300,regular,500,600,700,800" rel="stylesheet" />


    <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content=" IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1-0">
    <title>Twitter Wawan</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="styletwitter.css">
    <style>
       
        </style>
</head>
<body>

<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        
                        <a href="halamanutama<?= $tabel;?>.php"class="logo" style=" padding-top: 1%;">
                            <img src="assets/images/simtanilogo.png" align="klassy cafe html template">
                        </a>

                        <ul class="nav">
                            <li class="scroll-to-section"><a href="komunitas2.php">komunitas2</a></li> 
                            <li class="scroll-to-section"><a href="halamanutama<?= $tabel;?>.php">Kembali</a></li> 
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
<!-- sidebar start -->
    <div class="sidebar">
    </div>
<!-- sidebar end -->
<!-- feed start -->
<div class="feed">
    <div class="mainfeedheader">
        <div class="feed_header">
            <h2>Komunitas</h2>
            <div class="feed_headerbot">
                <div class="submenufeed"><h2>Untuk Anda</h2></div>
                <div class="submenufeed"><h2>Mengikuti</h2></div>
            
            
            </div>
        </div>
       
        <!-- tweetbox start -->
        <div class="tweetbox">
        <form action="" class="" method="post" enctype="multipart/form-data">
            <div class="tweetbox_input">
                <img src="fotoprofil/<?=$gambarprofil["fotoprofil"];?>" 
                alt="">
                <div class="isian">
                    <?php foreach($tabel1 as $row3):?>
                    <input type="hidden" class="form-control" name="username" id="username" placeholder="Username" required value="<?=$row3["username"]?>">
                    <?php endforeach;?>
                    <input type="text"  name="konten" id="konten" placeholder="Apa yang sedang terjadi?" required>
                    <div class="upload-btn-wrapper">
                    
                        <button class="btn"><span class="material-icons">image</span>
                        </button>
                        <input type="file" name="gambar" id="gambar" />
                    </div>
                </div>
            </div>
            <button class="tweetbox_tweetbutton"name="posting">Kirim</button>

           
        
        </form>
        </div>

        <!-- tweetbox end -->
        
        <!-- post start -->
<?php foreach($postingan as $row) :?>
            <?php	$periksa=gambarprofilkomunitas($row['username']);
                $usernamelist=$row['username'];
                $tabelumum=$periksa[1];
                $tabel2 = mysqli_query($conn,"SELECT * FROM $tabelumum WHERE username='$usernamelist'");
                $adm = mysqli_fetch_assoc($tabel2);
                // //var_dump($adm);
                $id=$row['id'];
                ?>
<!-- dengan gambar -->
          <?php	if( $row["status"]==="tampil"|$row["status"]==="tersembunyi"&$tabel==="admin"):?>
            <?php	if( $row["gambar"]!="null"):?>
        <div class="post">
            <div class="post_avatar">
                <img src="fotoprofil/<?=$adm["fotoprofil"];?>" alt="">
            </div>
            <div class="post_body">
                <div class="post_header">
                    <div class="post_headertext">
                        <h3><?=$adm["nama"];?>
                            <span class="post_headerspecial">
                                <span class="material-icons">
                                agriculture
                                </span><div class="publish-date"><?=$row["tanggaldibuat"];?></div>
                            </span>
                        </h3>
                    </div>
                    <div class="post_headerdescription">
                        <p><?=$row["konten"];?>
                        </p>
                    </div>
                </div>
                <img src="gambarpostingan/<?=$row["gambar"];?>" alt="">
                <div class="post_footer">
                    
                    <div class="footer_icon" ><div class="material-icons">chat_bubble_outline</div>
                    <p>100</p>
                    </div>
                    <?php if( $username===$row['username']):?>

                    <div class="footer_icon"><a href="ubahpostingan.php?id=<?=$row["id"];?>">
                    <div class="material-icons">edit</div></div></a>
                        
                    <div class="footer_icon"><a href="hapuspostingan.php?id=<?=$row["id"];?>">
                    <div class="material-icons">delete</div></div></a></div>
                    <?php	endif;?>
                    <?php	if( $row["status"]==="tersembunyi"&$tabel==="admin"):?>
                    <div class="footer_icon"><div class="material-icons" style="color:red;">visibility_off</div></div>
                    <?php	endif;?>
                </div>
            </div> 
        </div>
        <!-- post end -->

        <!-- post start -->
                <?php	else:?>
<!-- tanpa gambar -->
        <div class="post">
            <div class="post_avatar">
                <img src="fotoprofil/<?=$adm["fotoprofil"];?>" alt="" style="">
            </div>
            <div class="post_body">
                <div class="post_header">
                    <div class="post_headertext">
                        <h3><?=$adm["nama"];?>
                            <span class="post_headerspecial">
                                <span class="material-icons">
                                agriculture
                                </span><div class="publish-date"><?=$row["tanggaldibuat"];?></div>
                            </span>
                            
                        </h3>
                    </div>
                    <div class="post_headerdescription" style="padding-bottom: 50px;">
                        <p><?=$row["konten"];?>
                        </p>
                    </div>
                </div>
                <div class="post_footer">
                    
                    <div class="footer_icon" ><div class="material-icons">chat_bubble_outline</div>
                    <p>100</p>
                    </div>
                    <?php if( $username===$row['username']):?>
                        <div class="footer_icon"><a href="ubahpostingan.php?id=<?=$row["id"];?>">
                    <div class="material-icons">edit</div></div></a>
                        
                    <div class="footer_icon"><a href="hapuspostingan.php?id=<?=$row["id"];?>">
                    <div class="material-icons">delete</div></div></a></div>
                    <?php	endif;?>
                    <?php	if( $row["status"]==="tersembunyi"&$tabel==="admin"):?>
                    <div class="footer_icon"><div class="material-icons" style="color:red;">visibility_off</div></div>
                    <?php	endif;?>
                </div>
            </div> 
        </div>
                <?php	endif;?>
        <?php	endif;?>
        <?php	endforeach;?>
        <!-- post end -->
    </div>  
</div>
<!-- feedend -->
<!-- widget start -->
<div class="widgets">
 
</div>
<!-- widget end -->
</body>
</html>