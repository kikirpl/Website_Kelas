<?php  
$db = mysqli_connect("localhost", "root", "", "webkelas");



function query($query){
    global $db;
    $result = mysqli_query($db, $query);
    $rows = []; 
    while($row =mysqli_fetch_assoc($result)){
     $rows[] = $row;
    }
     return $rows;
 }

function hapususer($id){
    global $db;
  
    mysqli_query($db, "DELETE FROM user WHERE id = $id");
    return mysqli_affected_rows($db);
}
 
function registrasi($data){
    global $db;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($db, "SELECT username FROM user WHERE username = '$username'");
         
    if(mysqli_fetch_assoc($result)){
        echo 
        "<script> alert('username sudah terdaftar !') </script>";
        return false;
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
     mysqli_query($db, "INSERT INTO user (id, username, password, role) VALUES('', '$username', '$password','')");

     return mysqli_affected_rows($db);
}
function hadir($data) {
    global $db;

    // Memastikan input diproses dengan aman
    $nama = strtolower($data["nama"]);
    $nis = mysqli_real_escape_string($db, $data["nis"]);
    $kehadiran = strtolower($data["kehadiran"]);

    // Menyusun query dengan benar
    $queri = "INSERT INTO absensi (nama, nis, kehadiran) VALUES ('$nama', '$nis', '$kehadiran')";

    // Menjalankan query dan memeriksa hasilnya
    if (mysqli_query($db, $queri)) {
        return mysqli_affected_rows($db);
    } else {
        // Mengembalikan kesalahan jika query gagal
        return "Error: " . mysqli_error($db);
    }
}



// Koneksi ke database
$db = new mysqli('localhost', 'root', '', 'webkelas');

// Cek koneksi
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

function login($db, $username, $password)
{
    $stmt = $db->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row && password_verify($password, $row["password"])) {
        return $row["role"]; // Mengembalikan peran pengguna
    } else {
        return false; // Login gagal
    }
}






?> 