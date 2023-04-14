<?php
session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}

require'functions.php';
$id=$_GET["id"];

$result = mysqli_query($conn,"SELECT * FROM 
modul WHERE id = '$id'");


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

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

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
                        
                        <a href="modul.php"class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="modul.php" class="">Halaman modul</a></li>
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="logout.php">logout</a></li> 
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="modul.php">list modul</a></li> 
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
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>About Us</h6>
                            <h2>Data modul</h2>
                            

                        </div>
                        <div style="font-family: arial;
                        display:grid;
                                font-size: 24px;
                                margin: 25px;
                                width: 350px;
                                height: 200px;
                               ">
                            
                            <?php foreach($result as $row) :?>
                            <div style=" border: 3px solid #fff;padding: 20px;">
                            <div class="col-4" style="width: 50%;
                                float: left;
                                padding: 20px;
                                border: 2px solid red;">
                                <img src="modul/sampul/<?= $row["gambarsampul"];?>" alt=""></div>
                            
                            <div style="width: 50%;
                                float: left;
                                padding: 20px;
                                border: 2px solid red;">
                            <iframe class="fa fa-play" src="<?= $row["video"];?>" frameborder="0" width="400px" height="225px"></iframe>
                            </div>
                            </div>
                            
                            <div>
                            <ul>
                                <?php foreach($row as $satuan) :?>
                                <!-- memeriksa apakah key berupa id/password -->
                                <?php	if(array_search($satuan, $row)=="video"| array_search($satuan, $row)=="id"| array_search($satuan, $row)=="modul"| array_search($satuan, $row)=="gambarsampul"):?>
                                    <?php	else:?>
                                        <li><?php echo array_search($satuan, $row);?> :  <?= $satuan;?></li>
                                    <?php	endif;?>
                                <?php	endforeach;?>
                                <a href="ubah<?=$tabel;?>.php?id=<?= $row["id"];	
                                ?>">ubah</a>
                            <!-- <a href="hapus<?=$tabel;?>.php?id=<?= $row["id"];	
                                ?>">hapus</a></div> -->
                            <?php	endforeach;?>
                            </div>

                            <div style="width:40rem;height:40rem;
                            background-color: red;
                            /* Center horizontally*/
                            margin: 0 auto;">
                            
                            <embed src="modul\pdf\<?= $row["modul"];?>#toolbar=0" type="" style="width:40rem;height:40rem;">
                            </div>
                            
                            </ul>
                            
                        </div>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="right-content">
                        <div class="thumb">
                            
                           
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