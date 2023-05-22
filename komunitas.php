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

$result = mysqli_query($conn,"SELECT username FROM 
admin WHERE username = '$username'");
if (mysqli_fetch_assoc($result)){
    
    $tabel="admin";

}
$result = mysqli_query($conn,"SELECT username FROM 
sales WHERE username = '$username'");
if (mysqli_fetch_assoc($result)){
    
    $tabel="sales";
}
$result = mysqli_query($conn,"SELECT username FROM 
petani WHERE username = '$username'");
if (mysqli_fetch_assoc($result)){
    
    $tabel="petani";
    
}
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
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/index.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- displays site properly based on user's device -->

  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">

  <title>Frontend Mentor | Article preview component</title>

  <!--
    - custom css link
  -->
  <!-- <link rel="stylesheet" href="styleartikel.css"> -->

  <!--
    - google font link
  -->
  <link href="https://fonts.googleapis.com/css?family=Manrope:200,300,regular,500,600,700,800" rel="stylesheet" />


    </head>
    
</style>
</head>




<body style="background-color: #F0F0F0;">
<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        
                        <a href="halamanutama<?= $tabel;?>.php"class="logo" style=" padding-top:1%;">
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
    <!-- ***** Header Area End ***** -->

<!-- navigasi jumlah halaman -->

<!-- komunitas -->
<div class="kontainer" style="display:flex; align-items:center; justify-content:center;max-width:auto;padding-top:140px ">
<div style="padding-top:140px;width:730px; align-items:center; justify-content:center;background-color:white;padding:40px;" >
<div style="text-align:center;justify-content:center;display:flex;"><h1 >KOMUNITAS</h1></div>
              <br>
              <br>

              <br>
			      	<div class="d-flex" style="text-align:center;">
			      		<div class="w-100">
			      			<h3 class="mb-4">Tambah Postingan</h3>
			      		</div>
								
			      	</div>
							<form action="" class="signin-form" method="post" enctype="multipart/form-data">
			      		<div class="form-group mb-3">
                            <?php foreach($tabel1 as $row3):?>
                                
			      			<input type="hidden" class="form-control" name="username" id="username" placeholder="Username" required value="<?=$row3["username"]?>">
                            <?php endforeach;?>
                        </div>
                    <div class="form-group mb-3">
			      			<label class="label" for="konten">Konten</label>
			      			<input type="text" class="form-control" name="konten" id="konten" placeholder="konten" >
			      		</div>
                    <div class="form-group mb-3">
                        <label for="gambar">gambar : </label><br>
                        <input type="file" name="gambar" id="gambar" >
                    </div>
                    
                        

		            <div class="form-group">
		            	<button type="submit" name="posting" class="form-control btn btn-primary rounded submit px-3" >Kirimkan</button>
                    
		            </div>
                </form >
				</div>

</div>



</div>




   
<br>
<div>
    <head>
        <link rel="stylesheet" href="styleartikel1.css">
    </head>
</div>

<section class="halamanpostingan" style="background-color:#F0F0F0;">
            <?php foreach($postingan as $row) :?>
            <?php	$periksa=gambarprofilkomunitas($row['username']);
                $usernamelist=$row['username'];
                $tabelumum=$periksa[1];
               

                $tabel2 = mysqli_query($conn,"SELECT * FROM $tabelumum WHERE username='$usernamelist'");

                $adm = mysqli_fetch_assoc($tabel2);


                // //var_dump($adm);
                $id=$row['id'];
                $jumlahkomen = mysqli_query($conn,"SELECT COUNT(*) FROM komentar WHERE id_postingan=$id");
                $jumlahkomentar2 = mysqli_fetch_assoc($jumlahkomen);
                $jumlahkomentar = $jumlahkomentar2["COUNT(*)"];
                
               
                ?>
<!-- dengan gambar -->
          <?php	if( $row["status"]==="tampil"|$row["status"]==="tersembunyi"&$tabel==="admin"):?>

            <?php	if( $row["gambar"]!="null"):?>
              
                
<div class="artikel">
<article class="article-card">



  <div class="article-contentnoimage"    >
      <div class="author">
          <img src="fotoprofil/<?=$adm["fotoprofil"];?>" alt="" class="author-avater" >

          <div class="author-info">
              <a href="#">
              <h4 class="author-name"><?=$adm["nama"];?></h4>
              </a>
              <div class="publish-date"><?=$row["tanggaldibuat"];?></div>
              
          </div>
          <div class="share" style="margin-right: 0px;">
      <?php if( $username===$row['username']):	?>
        <button class="share-button">
              <a href="hapuspostingan.php?id=<?=$row["id"];?>" style="color:gray;">
              <div class="material-icons">delete</div>
            </a>         
          </button>
          <button class="share-button" >
              <a href="ubahpostingan.php?id=<?=$row["id"];?>" style="color:gray;">
              <div class="material-icons">edit</div>
            </a>    
                    
          </button>

          
          <?php	endif;?>

          <?php	if( $tabel==="admin"):?>
            <button class="share-button" > 
            <a href="hidepostingan.php?id=<?=$row["id"];?>" style="color:gray;">
            <?php	if( $row["status"]==="tersembunyi"&$tabel==="admin"):?>
            <div class="material-icons" style="color:red;">visibility_off</div>

            <?php	else:?>
            <div class="material-icons">visibility_off</div>
          <?php	endif;?>
          <?php	endif;?>
            </a>
          </button>

        
      </div>
          </div>
    <a href="#">
      <h3 class="article-title"><?=$row["konten"];?></h3>
      
    </a>
   
    <div class="postgambar"><img src="gambarpostingan/<?=$row["gambar"];?>" alt="" class="article-banner">
</div>
    <div class="commentsection">
    <p ><?=	 $jumlahkomentar?></p>
             <button class="share-button" type="#">
              <a href="komentar.php?id=<?=$row["id"];?>" style="color:gray;">
              <div class="material-icons">chat_bubble</div>
            </a>    
            </button>
    </div>
    
    <!-- <p class="article-text">Ever been in a room and felt like something was missing? Perhaps
      it felt slightly bare and uninviting. I’ve got some simple tips
      to help you make any room feel complete.</p> -->
    <div class="acticle-content-footer">
    </div>
  </div>    
</div>
    

</article>
  


</div>
    <?php	else:?>
<!-- tanpa gambar -->
<div class="artikel">
<article class="article-card">

    <div class="article-contentnoimage">
        <div class="author">
            <img src="fotoprofil/<?=$adm["fotoprofil"];?>" alt="" class="author-avater" >

            <div class="author-info">
                <a href="#">
                <h4 class="author-name"><?=$adm["nama"];?></h4>
                </a>
                <div class="publish-date"><?=$row["tanggaldibuat"];?></div>
            </div>
            <div class="share" style="margin-right: 0px;">
      <?php if( $username===$row['username']):	?>
        <button class="share-button">
              <a href="hapuspostingan.php?id=<?=$row["id"];?>" style="color:gray;">
              <div class="material-icons">delete</div>
            </a>         
          </button>
          <button class="share-button" >
              <a href="ubahpostingan.php?id=<?=$row["id"];?>" style="color:gray;">
              <div class="material-icons">edit</div>
            </a>    
                    
          </button>

          
          <?php	endif;?>


          
          <?php	if( $tabel==="admin"):?>
            <?php	if( $row["status"]!="tersembunyi"):?>
          <button class="share-button" >
          <a href="hidepostingan.php?id=<?=$row["id"];?>" style="color:gray;">
          <?php	endif;?>
          <?php	if( $row["status"]==="tersembunyi"&$tabel==="admin"):?>
            <button class="share-button" > 
            <div class="material-icons" style="color:red;">visibility_off</div>

            <?php	else:?>
            <div class="material-icons">visibility_off</div>
          <?php	endif;?>
          <?php	endif;?>

        </a>         
            
          </button>

        
      </div>

            </div>
      <a href="#">
        <h3 class="article-title"><?=$row["konten"];?></h3>
      </a>
      
      <!-- <p class="article-text">Ever been in a room and felt like something was missing? Perhaps
        it felt slightly bare and uninviting. I’ve got some simple tips
        to help you make any room feel complete.</p> -->

      <div class="acticle-content-footer">
      <div class="commentsection">
        <p ><?= $jumlahkomentar?></p>
        <button class="share-button" >
                  <a href="komentar.php?id=<?=$row["id"];?>" style="color:gray;">
                  <div class="material-icons">chat_bubble</div>
                  </a>    
                </button>
        </div>
  
    </div>
   </div>
</div>
    
  </article>

</div>
<?php	endif;?>
<?php	endif;?>

<?php	endforeach;?>

</section>






  <script>

const shareOption = document.querySelector('.share-option');

document.querySelector('.share-button').addEventListener('click', function () {
  this.classList.toggle('active');
  shareOption.classList.toggle('active');
});

</script>

<!--
- ionicon link
-->

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>