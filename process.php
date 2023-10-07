<?php
// Konfigurasi Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Menghindari SQL Injection
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Mencocokkan data login dengan database
$query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    // Login berhasil
    echo "Login berhasil. Selamat datang, " . $username . "!";
} else {
    // Login gagal
    echo "Login gagal. Silakan coba lagi.";
}

// Menutup koneksi database
$conn->close();
?>



<?php
// Konfigurasi Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Membuat prepared statement
$stmt = $conn->prepare("SELECT * FROM login WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);

// Menjalankan prepared statement
$stmt->execute();

// Mengambil hasil
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    // Login berhasil
    echo "Login berhasil. Selamat datang, " . $username . "!";
} else {
    // Login gagal
    echo "Login gagal. Silakan coba lagi.";
}

// Menutup prepared statement
$stmt->close();

// Menutup koneksi database
$conn->close();
?>
