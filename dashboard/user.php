<?php 
require '../functions.php';
session_start ();
if( !isset($_SESSION["row"]) == 0){
    header("Location: ../index.php");
    exit;
  } 
$user = query("SELECT * FROM user ");

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
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Roboto:wght@300;400&family=Sansita+Swashed:wght@300&display=swap");
        .container {
            width: calc(100% - 20%);
            /* display: flex; */
            margin-left: 25%;
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
    <?php require_once("./sidebar.php")?>

        <div class="container">
            <h1>Welcome to user page ! admin</h1>

        <div class="tab">
        <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>username</th>
            <th>password</th>
            <th>role</th>
        </tr>
        <?php $i=1;?> 
        <?php foreach($user as $row): ?>    

        <tr>
            <td><?= $i;?></td>
                <td><a href="ubah.php?id=<?=$row['id']; ?>">Ubah</a> 
                <a href="hapususer.php?id=<?= $row["id"]; ?>"onclick="
                return confirm('yakin?');" class="hapus">Hapus</a></td>
            <td><?= $row["username"]; ?></td>
            <td><?= $row["password"]?></td>
            <td><?= $row["role"]?></td>
        <?php $i++; ?>
        <?php endforeach;?>
        </tr>
            </table>
                    </div>
                </div>
            </div>
            </div>
  </body>
</html>
