<?php
session_start();
require 'functions.php';

if(isset($_POST["register"])){
    if(registrasi($_POST) > 0 ){
        echo "<script> 
                alert('user baru di tambahkan') ;
                </script>";
    }else {
        mysqli_error($db);
    }
}
if(isset($_POST["absensi"])) {
  $result = hadir($_POST);
  if($result > 0) {
      echo "<script>alert('Anda sudah absen');</script>";
  } else {
      echo "<script>alert('Error: " . $result . "');</script>";
  }
}


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $role = login($db, $username, $password);

    if ($role !== false) {
        // Login berhasil
        $_SESSION["role"] = $role;
        if ($role === 1) {
            header("Location: ./dashboard/dashboard.php");
            exit();
        } elseif ($role === 0) {
            header("Location: ./index.php");
            exit();
        }
    } else {
        $error = true;
    }
}
  if(isset($error)):
    echo "<script> 
                alert('username atau password salah') ;
                </script>";
  endif; 
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    
    <link rel="stylesheet" href="style.css" />

    <title>RPL bos</title>
  </head>
  <body>
    <header class="container">
      <nav>
        <div class="logo">
          <img src="public/logo-white.png" alt="" />
        </div>

        <div class="right">
          <div class="nav__link">
            <li><a href="#home">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#galery">Galery</a></li>
            <li><a href=""> <?php if (!isset($_SESSION["role"]) || $_SESSION["role"] == 1) : ?>
            <a href="./dashboard/dashboard.php">Dashboard</a>
            <?php else : ?>
          <a href="logout.php">Logout</a>
        <?php endif; ?></a></li>
          </div>

          <div class="nav__btn">
            <button class="open-button">Registrasi</button>
          </div>

          <dialog class="modal" id="modal">
            <form method="post">
              <button
                formmethod="dialog"
                type="button"
                class="button close-button"
                href="#home"
              >
                <i class="bx bx-x"></i>
              </button>
              <h1>Registrasi</h1>
              <label for="username">Username:</label>
              <input type="text" name="username" />
              <label for="password">Password:</label>
              <input type="password" name="password" />
              <button type="submit" id="login-link" name="register">Registrasi</button>

              <span
                >Sudah memiliki akun? <a href="#" id="login-link">Login</a> di
                sini</span
              >
            </form>
          </dialog>

          <dialog class="modal" id="login-modal">
            <form method="post">
              <button
                formmethod="dialog"
                type="button"
                class="button close-button"
              >
                <i class="bx bx-x"></i>
              </button>
              <h1>Login</h1>
              <label for="username">Username:</label>
              <input type="text" name="username" />
              <label for="password">Password:</label>
              <input type="password" name="password" />
              <button type="submit" id="login-link" name="login">Login</button>

              <span
                >Belum memiliki akun?
                <a href="#" id="signup-link">Registrasi</a> di sini</span
              >
            </form>
          </dialog>
        </div>

        <div class="mobile-nav">
          <button id="mobile-nav-toggle">
            <img
              src="public/mobile-nav.png"
              alt="Mobile-icon"
              class="mobile-icon"
              id="Mobile-icon"
            />
          </button>

          <div class="mobile__content" id="mobile-content">
            <div class="bg-blur">
              <li><a href="#">Home</a></li>
              <li><a href="#">Galery</a></li>
              <li><a href="#">About</a></li>
            </div>
          </div>

          <div class="overlay" id="overlay"></div>
        </div>
      </nav>

      <div class="pd-x" id="home">
        <div class="hero">
          <img
            src="public/hero-banner-R.png"
            alt="Hero-Banner"
            class="left-bg"
          />
          <img
            src="public/hero-banner-C.png"
            alt="Hero-Banner"
            class="center-bg"
          />

          <div class="hero__text">
            <h1>Welcome</h1>
            <h4>to web class RPL</h4>
          </div>

          <img
            src="public/hero-banner-L.png"
            alt="Hero-Banner"
            class="right-bg"
          />

          <!-- MOBILE SIDE -->
          <div class="hero__text-mobile">
            <h1>Welcome to our class</h1>
            <h4>The first gen of RPL in SMKN 6 Jakarta Selatan ever!</h4>

            <div class="emoji">
              <span>😜☝</span>
              <span>😜😂😋😁☝🤞</span>
            </div>
          </div>

          <img
            src="public/hero-banner-mobile.png"
            alt="Mobile"
            class="hero-banner-mobile"
          />
        </div>
      </div>
    </header>

    <main id="galery">
      <h1 class="swiper-heading">Class Galery</h1>

      <section class="slide-container swiper">
        <div class="slide-content">
          <div class="card-wrapper swiper-wrapper">
            <div class="card swiper-slide">
              <div class="image-content">
                <div class="card-image">
                  <img src="public/slider-img.JPG" alt="" class="card-img" />
                </div>
              </div>
            </div>

            <div class="card swiper-slide">
              <div class="image-content">
                <div class="card-image">
                  <img src="public/slider-img-2.jpeg" alt="" class="card-img" />
                </div>
              </div>
            </div>

            <div class="card swiper-slide">
              <div class="image-content">
                <div class="card-image">
                  <img src="public/slider-img.JPG" alt="" class="card-img" />
                </div>
              </div>
            </div>

            <div class="card swiper-slide">
              <div class="image-content">
                <div class="card-image">
                  <img src="public/slider-img.JPG" alt="" class="card-img" />
                </div>
              </div>
            </div>

            <div class="card swiper-slide">
              <div class="image-content">
                <div class="card-image">
                  <img src="public/slider-img.JPG" alt="" class="card-img" />
                </div>
              </div>
            </div>

            <div class="card swiper-slide">
              <div class="image-content">
                <div class="card-image">
                  <img src="public/slider-img.JPG" alt="" class="card-img" />
                </div>
              </div>
            </div>

            <div class="card swiper-slide">
              <div class="image-content">
                <div class="card-image">
                  <img src="public/slider-img.JPG" alt="" class="card-img" />
                </div>
              </div>
            </div>

            <div class="card swiper-slide">
              <div class="image-content">
                <div class="card-image">
                  <img src="public/slider-img.JPG" alt="" class="card-img" />
                </div>
              </div>
            </div>

            <div class="card swiper-slide">
              <div class="image-content">
                <div class="card-image">
                  <img src="public/slider-img.JPG" alt="" class="card-img" />
                </div>
              </div>
            </div>

            <div class="card swiper-slide">
              <div class="image-content">
                <div class="card-image">
                  <img src="public/slider-img.JPG" alt="" class="card-img" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="swiper-pagination"></div>
      </section>

      <div class="about-span container">
        <div class="about__head">
          <div class="head__h1">
            <h1>About class</h1>
            <br />
            <h1>RPL!!!</h1>
            <span>RPL GENERASI 1</span>
          </div>
        </div>

        <div>
          <p>
            Kompetensi Keahlian Rekayasa Perangkat Lunak (RPL) di SMK Negeri 6
            Jakarta merupakan salah satu Kompetensi Keahlian terbaru yang dibuka
            pada tahun 2022 menggantikan Kompetensi Keahlian Bidang IT lainnya
            yang sudah ada di SMKN 6 Jakarta yaitu Multimedia.
          </p>
          <p>
            Angkatan pertama kelas RPL di SMK Negeri 6 Jakarta menerima 1 (satu)
            kelas yang terdiri dari 35 siswa dari berbagai SMP/MTs di Kota
            Jakarta maupun dari luar Kota Jakarta(Tangerang, Depok, dll).
          </p>
        </div>
      </div>

      <div class="btn-mobile container">
        <button id="btn-struktur" onclick="showStruktur()">Struktur</button>
        <div>|</div>
        <button id="btn-more" onclick="showMore()">More</button>
      </div>

      <section class="container pd-x grid">
        <div class="str-span" id="str-span">
          <div class="head__h1">
            <h1>Structure class</h1>
            <br />
            <h1>RPL!</h1>
          </div>

          <div class="str__content">
            <div class="top">
              <div class="member walas">
                <h3>Wali Kelas</h3>
                <div class="nama">
                  <h1>Anggrila</h1>
                </div>
              </div>

              <img src="public/vl-1.png" class="vl-1" />
            </div>

            <div class="mid">
              <div class="line-wrap">
                <i class="bx bxs-circle"></i>
                <div class="hl-1"></div>
                <i class="bx bxs-circle"></i>
              </div>

              <div class="member-wrap">
                <div class="member ketua">
                  <h3>Ketua Kelas</h3>
                  <div class="nama">
                    <h1>Rizky</h1>
                  </div>
                </div>

                <div class="hl-2"></div>

                <div class="member wakil">
                  <h3>Wakil Kelas</h3>
                  <div class="nama">
                    <h1>Dava</h1>
                  </div>
                </div>
              </div>
            </div>

            <div class="bottom">
              <img src="public/vl-2.png" class="vl-2" />

              <div class="member-wrap">
                <div class="member ketua">
                  <h3>Sekretaris</h3>
                  <div class="nama">
                    <h1>Zaim</h1>
                  </div>
                </div>

                <div class="line-wrap">
                  <i class="bx bxs-circle"></i>
                  <div class="hl-1"></div>
                  <i class="bx bxs-circle"></i>
                </div>

                <div class="member wakil">
                  <h3>Bendahara</h3>
                  <div class="nama">
                    <h1>Galuh</h1>
                  </div>
                </div>
              </div>

              <div class="member-wrap">
                <div class="member ketua">
                  <h3>Sekretaris</h3>
                  <div class="nama">
                    <h1>Nabilla</h1>
                  </div>
                </div>

                <div class="member bendahar">
                  <h3>Sekretaris</h3>
                  <div class="nama">
                    <h1>Rafi'i</h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="schedule" id="schedule">
          <div class="head__h1">
            <h1>Schedule class</h1>
            <br />
            <h1>RPL!</h1>
            <span id="day"></span>
          </div>

          <div class="schedule__content">
            <ul id="schedule__li"></ul>
          </div>
        </div>

        <div class="absen" id="absen">
          <div class="head__h1">
            <h1>Absen kelas</h1>
            <br />
            <h1>RPL!</h1>
          </div>

          <div class="form__wrap">
            <form method="post">
              <label for="username">Nama</label>
              <input type="text" id="username" name="nama" />

              <label for="username">NIS</label>
              <input type="text" id="username" name="nis" />

              <label for="username">Kehadiran</label>
              <select id="kehadiran">
                <option name="kehadiran" value="hadir" selected>Hadir</option>
                <option name="kehadiran" value="sakit">Sakit</option>
                <option name="kehadiran" value="Izin">Izin</option>
              </select>

              <div class="btn__abs" name="absensi">
                <button>Send Absen</button>
              </div>
            </form>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <div class="wrapper container">
        <div class="top">
          <img src="public/logo-dark.png" alt="Logo" class="logo-footer" />
          <div class="icon">
            <a href="#"><img src="public/footer-insta.png" alt="IG" /></a>
            <a href="#"><img src="public/footer-tiktok.png" alt="TIKTOK" /></a>
          </div>
        </div>
        <div class="bottom">
          <div class="copyright">
            © 2024 Kelas RPL | Di Kelola Oleh Siswa RPL | Created By Dava, Rizky
            & Xza
          </div>
        </div>
      </div>
    </footer>

    <!-- 
      '
     -->

    <script type="module" src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  </body>
</html>
