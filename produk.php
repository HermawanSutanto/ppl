<?php
require '..\ppl\config\functions.php';

session_start();
// cek session
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}
$username = $_SESSION["username"];
$tabel = $_SESSION["tabel"];

$id = $_GET["id"];;
if ($tabel == 'petani') :
    $petani = query("SELECT * FROM 
petani WHERE username = '$username'")[0];
    $idpetani = $petani['id'];
    $wishlist = mysqli_query($conn, "SELECT * FROM 
wishlistpetani WHERE id_petani = '$idpetani'");
    $wishlist = mysqli_fetch_assoc($wishlist);

endif;


$result = mysqli_query($conn, "SELECT * FROM 
produk WHERE id_produk = '$id'");
if (isset($_POST["wishlist"])) {

    // cek apakah data berhasil ditambahkan atau tidak
    // //var_dump(mysqli_affected_rows($conn));
    if (tambahwishlist($_POST) > 0) {
        echo " <script>
                alert('Berhasil menambah wishlist!');
                document.location.href = 'produk.php?id=$id'
            </script>
            ";
    } else {

        echo " <script>
            alert('gagal menambah wishlist!');
            document.location.href = 'produk.php?id=$id'
            </script>
            ";
    }
}
$result2 = mysqli_fetch_assoc($result);
$username2 = $result2['username'];
$sales = query("SELECT * FROM 
sales WHERE username = '$username2'")[0];


?>

<!DOCTYPE html>
<html>

<head>
    <title>Halaman Data Sales</title>
    <link rel="stylesheet" href="design/styleindex.css">


    <style>

    </style>
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
        <link rel="stylesheet" href="halamanproduk.css">

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

                        <a href="index<?= $tabel; ?>.php" class="logo">
                            <img src="assets/images/simtanilogo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">




                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="katalogproduk.php">Kembali</a></li>
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
    <?php foreach ($result as $row) :
    ?>

    <?php endforeach; ?>
    </div>
    <br>
    <br>
    <br>
    <main class="container2">

        <!-- Left Column / Headphones Image -->
        <div class="left-column">
            <img data-image="black" src="produk\gambar\<?= $row["gambar"]; ?>" alt="">

        </div>


        <!-- Right Column -->
        <div class="right-column">

            <!-- Product Description -->
            <div class="product-description">
                <span>Produk</span>
                <h1><?= $row["nama_produk"]; ?></h1>
                <p><?= $row["deskripsi"]; ?></p>
            </div>

            <!-- Product Configuration -->
            <div class="product-configuration">

                <!-- Product Color -->
                <div class="product-color">
                </div>
                <!-- Cable Configuration -->
                <div class="cable-config">

                    <a href="#">Masukkan kedalam wishlist jika anda suka!</a>
                </div>
            </div>

            <!-- Product Pricing -->
            <div class="product-price">
                <span>stok :<?= $row["jumlah_stok"]; ?> </span>
                <?php if ($tabel == 'petani') : ?>
                    <?php



                    $result3 = mysqli_query($conn, "SELECT * FROM 
        wishlistpetani WHERE id_petani=$idpetani AND id_produk = '$id'");;

                    // if ($row["id_produk"]!=$idproduk):
                    if (mysqli_fetch_assoc($result3)) : ?>

                        <button class="cart-btn" onclick="window.location.href='hapuswishlist.php?id=<?= $wishlist['id_wishlist']; ?>&idpetani=<?= $idpetani ?>'">hapus dari wishlist</button>

                    <?php else : ?>
                        <form action="" method="post">
                            <input type="hidden" name="id_produk" value="<?= $row["id_produk"]; ?>">
                            <input type="hidden" name="id_petani" value="<?= $petani["id"]; ?>">
                            <input type="hidden" name="id_sales" value="<?= $sales["id"]; ?>">
                            <button class="cart-btn" type="submit" name="wishlist"> masukkan wishlist</button>
                        </form>



                    <?php endif; ?>
                <?php endif; ?>

            </div>
        </div>
    </main>


    <script src="script.js"></script>






</body>

</html>