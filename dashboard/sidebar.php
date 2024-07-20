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

        *{
            font-family: "poppins";
            text-decoration: none;
        }
        .paling-luar {
            width: 100%;
            height: 100vh;
        }
        nav {
            position: fixed;
            
        }
        .kotaks:hover {
        background-color:#706C61;;
        color: white;
        }
        .menu {
            display: flex;
            flex-direction: column;
        }
        
        .container {
            width: calc(100% - 20%);
            /* display: flex; */
            margin-left: 25%;
            position:absolute;
        }
        .container h1{
            color:bold black;
        }
    
        
        .hapus{
            color:blue;
        }
        .tab{
            display:flex;
        }
        .kotaks {
            height: 3.5rem;
            margin: 1rem;
            display: flex;
            border-radius: 0.4rem;
            width: 16rem;
            cursor: pointer;
            align-items: center;
            padding-left: 0.5rem;
            font-size: 1.1rem;
        }
        hr {
            border: 0.5px solid rgb(115, 115, 115);
        background-color: red;
        }
        a{
            padding-left: 20px;
            color: black;
        }
        a:hover{
            color:white;
        }
        .maintext{
            display: flex;
        padding-left: 2rem;
        align-items: center;
        width: 18rem;
        font-size: 1.3rem;
        font-weight: 700;
        }
    </style>
  </head>
  <body>
    <div class="paling-luar">
        <nav>
            <div class="navbar">
                <div class="menu">
                    <div class="profiletext">
                        <p class="maintext text">Dashboard</p>
                      </div>
                    <div class="dashboard kotaks">
                    <i class="fa-solid fa-table-columns icons"></i>
                        <a class="navtext" href="dashboard.php">dashboard</a>
                    </div>
                    <div class="product kotaks">
                    <i class="fa-solid fa-cart-shopping icons"></i>
                    <a class="navtext" href="absensi.php">absensi</a>
                </div>
                <!-- <div class="category kotaks">
                    <i class="fa-solid fa-filter icons"></i>
                    <a class="navtek" href="category.php">category</a>
                </div> -->
                <div class="user kotaks">
                    <i class="fa-solid fa-user icons"></i>
                    <a class="navtek" href="user.php">user</a>
                </div>
                    <hr>
                    <div class="home kotaks">
                        <i class="fa-solid fa-house icons"></i>
                        <a class="navtek" href="../index.php">home</a>
                    </div>  
                      
                     <div class="keluar kotaks"> 
                        <i class="fa-solid fa-right-from-bracket icons"></i>
                        <a class="navtek" href="../logout.php">keluar</a>
                        </div>
                </div>
            </div>
        </nav>