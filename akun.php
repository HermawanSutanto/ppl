<?php
session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}

require'D:\XAMPP\htdocs\phpdasar\ppl\config\functions.php';
$username=$_SESSION["username"];
$tabel=$_SESSION["tabel"];
$aktor=akun($username);

$result = mysqli_query($conn,"SELECT username FROM 
admin1 WHERE username = '$username'");
if (mysqli_fetch_assoc($result)){
    
    $tabel="admin1";

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

$tabel1 = query("SELECT * FROM $tabel WHERE username='$username'");

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
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
    

    </head>
    
<style>
    .button {
  background-color: #e3b04b; /* Green */
  border: none;
  color: white;
  padding: 8px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 50px;
  
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #e3b04b;
}

.button1:hover {
  background-color: #e3b04b;
  color: white;
}
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
                            <li class="scroll-to-section"><a href="index<?= $tabel;?>.php">Kembali</a></li> 
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
<section class="section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12" >
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h2>Data Diri</h2>
                        </div>
                        <div><ul style="margin-bottom:60px;">   
                            <?php foreach($tabel1 as $row) :?>
                            <?php foreach($row as $satuan) :?>
                                <!-- memeriksa apakah key berupa id/password -->
                                <table style="margin-top:-10px;width:600px;">
                                <?php	if(array_search($satuan, $row)=="password"| array_search($satuan, $row)=="id"| array_search($satuan, $row)=="fotoprofil"):?>
                                    <?php	else:?>
                                        <tr >
                                            <td style="width:200px;"><?php echo array_search($satuan, $row);?></td>
                                            <td style="width:20px;">:</td>
                                            <td <?php	if($satuan==='Aktif'):?> style="background-color:red;"<?php endif;?>><?= $satuan;?></td>
                                        </tr>
                                        <br>
                                    <?php	endif;?>
                                <?php	endforeach;?>
                                </table>

                            <?php	endforeach;?>
                            </ul>
                            <a href="ubah<?=$tabel;?>.php?id=<?= $row["id"];	
                                ?>&username=<?= $username?>&tabel=<?= $tabel?>"></a></div>
                            <!-- <a href="hapus<?=$tabel;?>.php?id=<?= $row["id"];	
                                ?>">hapus</a></div> -->
                            <div class="tombol"></div>
                            <div class="button button1" onclick="window.location.href='ubah<?=$tabel;?>.php?id=<?= $row['id'];?>'" >Ubah
                            </div>

                        <div class="row">
                           
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb" style="margin-left:70px;margin-right:70px;margin-top:90px" >
                            
                            <img src="fotoprofil/<?= $row['fotoprofil']?>" alt="" style="width:300px;height:300px; object-fit:cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<div>

</div>
     
   


<br>


</body>
</html>