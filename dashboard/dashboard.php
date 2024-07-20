<?php 
require '../functions.php';
session_start ();
// if( !isset($_SESSION["role"]) == 0){
//     header("Location: ../index.php");
//     exit;
//   } 
$user = query("SELECT * FROM user");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
     <style>
        .boxes{
            display:flex;
            align-items:center:
            justify-content: center;
            flex-wrap:wrap;
        }
        .boxes .box1{
            display:flex;
            flex-direction:column;
            align-items:center;
            border-radius:12px;
            width:calc(100% / 3 - 15px);
            padding:15px 20px;
            background-color:#706C61;
            transition:all 0.3s ease;
        }
        .boxes .box2{
            display:flex;
            flex-direction:column;
            align-items:center;
            border-radius:12px;
            width:calc(100% / 3 - 15px);
            padding: 75px 20px;
            background-color:#706C61;
            transition:all 0.3s ease;
        }
        .boxes .text, .number{
            font-size:22px;
            font-family:"Poppins";
            color:white;
        }
        .boxes .box i{
            color:white;
        }
    </style>
  </head>
  <body>
    <?php require_once("./sidebar.php")?>
<div class="container">
            <h1>Welcome to dashboard ! admin</h1>
    <div class="boxes">
            <div class="box box1">
                    <i class="fa-solid fa-user"></i>
                    <span class="text">Total user</span>
                    <span class="number"><?= count($user)?></span>
            </div>
        </div>    
     <div class="box box2">
            <i class="fa-solid fa-box-open"></i>
            <span class="text">Total produk</span>
            <span class="number"><?= count($product)?></span>
     </div>   
 </div>

  </body>
</html>