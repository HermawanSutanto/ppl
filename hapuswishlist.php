<?php	
require'..\ppl\config\functions.php';

session_start();	
// cek session
if (!isset($_SESSION["login"])){
    header("Location: login.php");
}
$username=$_SESSION["username"];
$tabel=$_SESSION["tabel"];


$id = $_GET["id"];
$wishlist = query("SELECT * FROM 
    wishlistpetani WHERE id_wishlist = '$id'")[0];
$id_produk=$wishlist['id_produk'];
    if ( hapuswishlist($id)>0){
        echo" <script>  
         alert('berhasil dihapus dari wishlist!');
        document.location.href = 'produk.php?id=$id_produk;'
        </script>
         ";

        }else{
        echo" <script>
        alert('gagal dihapus dari wishlist!');
        document.location.href = 'produk.php?id=$id_produk;'
        </script>
        ";
}

?>