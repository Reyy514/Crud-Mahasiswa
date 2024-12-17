<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];

    $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$nim', '$jurusan', '$email')";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold text-center mb-5">Tambah Data Mahasiswa</h1>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nama" class="block text-gray-700 font-bold mb-2">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Nama Mahasiswa" required class="block p-2 w-full border rounded">
            </div>
            <div class="mb-3">
                <label for="nim" class="block text-gray-700 font-bold mb-2">NIM</label>
                <input type="text" name="nim" id="nim" placeholder="NIM" required class="block p-2 w-full border rounded">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="block text-gray-700 font-bold mb-2">Jurusan</label>
                <select name="jurusan" id="jurusan" required class="block p-2 w-full border rounded">
                    <option value="" disabled selected>Pilih Jurusan</option>
                    <option value="Teknik Mesin">(S1) Teknik Mesin</option>
                    <option value="Teknik Informatika">(S1) Teknik Informatika</option>
                    <option value="Teknik Industri">(S1) Teknik Industri</option>
                    <option value="Teknik Tekstil">(D3) Teknik Tekstil</option>
                    <option value="Manajemen Industri">(D3) Manajemen Industri</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="text" name="email" id="email" placeholder="Email" required class="block p-2 w-full border rounded">
            </div>
            <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Tambah</button>
            <a href="index.php" class="ml-3 text-gray-600">Kembali</a>
        </form>
    </div>
</body>
</html>