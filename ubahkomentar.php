<?php	
require'..\ppl\config\functions.php';

session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}


$username=$_SESSION["username"];
$tabel=$_SESSION["tabel"];

// koneksi ke dbms


// ambil data di url
$id=$_GET["id"];
// querry data modul berdasar id
$adm = query("SELECT * FROM komentar WHERE id_komentar='$id'")[0];

var_dump($adm);

// cek apakah submit telah ditekan
if(isset($_POST["komentar"])){

// cek apakah data berhasil ditambahkan atau tidak
    // var_dump(mysqli_affected_rows($conn));
    if (ubahkomentar($_POST,$username)>0){
        echo" <script>
            alert('komentar berhasil diubah!');
            document.location.href = 'komunitas.php'
        </script>
        ";

    }else{
        echo" <script>
        alert('komentar gagal diubah!');
        document.location.href = 'komunitas.php'
        </script>
        ";
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

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    meta charset="UTF-8">
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




<body>
<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        
                        <a href="index<?= $tabel;?>.php"class="logo">
                            <img src="assets/images/simtanilogo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                         
                        
                           	
                       
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="komunitas.php">Kembali</a></li> 
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

<!-- navigasi jumlah halaman -->

<!-- komunitas -->


<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(assets/images/pexels-tomas-anunziata-3876417.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
       
			      			<h3 class="mb-4">Ubah Postingan</h3>
			      		</div>
								
			      	</div>
                    
							<form action="" class="signin-form" method="post" enctype="multipart/form-data">
			      		<div class="form-group mb-3">
                            <input type="hidden" class="form-control" name="id_komentar" id="id_komentar" placeholder="Username" required value="<?=$adm["id_komentar"]?>">
			      			<input type="hidden" class="form-control" name="username" id="username" placeholder="Username" required value="<?=$adm["username"]?>">
                        </div>
                    <div class="form-group mb-3">
			      			<label class="label" for="konten">Konten</label>
			      			<input type="text" class="form-control" name="konten" id="konten" placeholder="konten" required value="<?=$adm["konten"]?>">
			      		</div>
                    <div class="form-group mb-3">
                        


                    </div>
                    

		            <div class="form-group">
		            	<button type="submit" name="komentar" class="form-control btn btn-primary rounded submit px-3" >Kirimkan</button>
                    
		            </div>

                   

		            	
                    
		            </div>
				</div>
		        </form>
                <div >
				</div>
		        </form>

		        
		      </div>
				</div>
			</div>
		</div>
</section>


</body>
</html>