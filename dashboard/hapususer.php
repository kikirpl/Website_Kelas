<?php
require '../functions.php';

$id = $_GET["id"];
if(hapususer($id) > 0 ){
    echo "
    <script>
       alert('data berhasil dihapus');
       document.location.href = 'user.php';
       </script>
    ";
} else{
    echo "
        <script>
           alert('data gagal dihapus');
           document.location.href = 'user.php';
           </script> ";
}
?>