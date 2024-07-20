<?php 
require '../functions.php';
session_start ();
if( !isset($_SESSION["row"]) == 0){
    header("Location: ../index.php");
    exit;
  } 
$product = query("SELECT * FROM absensi");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />
<style>
        
        .container {
            width: calc(100% - 20%);
            /* display: flex; */
            margin-left: 25%;
        }
        .container a{
            margin-bottom:15px;
        }
        .hapus{
            color:blue;
        }
        .tab{
            display:flex;
        }
      
    </style>
  </head>
  <body>
    <?php require_once("./sidebar.php");?>
        <div class="container">
            <h1>Welcome to product page ! admin</h1>
            <a href="tambah-data.php">
                <button>tambah data</button>
            </a>
         <br>
        <div class="tab">
        <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>nama</th>
            <th>nis</th>
            <th>kehadiran</th>
        </tr>
        <?php $i=1;?> 
        <?php foreach($product as $row): ?>    

        <tr>
            <td><?= $i;?></td>
                <td><a href="ubah.php?id=<?=$row['id']; ?>">Ubah</a> 
                <a href="hapusproduct.php?id=<?= $row["id"]; ?>"onclick="
                return confirm('yakin?');" class="hapus">Hapus</a></td>
            <td><img src="../<?= $row["gambar"]?>" alt="" width=100px></td>
            <td><?= $row["nama"]?></td>
            <td><?= $row["nis"]; ?></td>
            <td><?= $row["kehadiran"]; ?></td>
        </tr>     
        <?php $i++; ?>
        <?php endforeach;?>

            </table>
                    </div>
                </div>
            </div>
            </div>
  </body>
</html>
