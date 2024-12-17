<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];

    $update_query = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', jurusan = '$jurusan', email = '$email' WHERE id = '$id'";
    if (mysqli_query($conn, $update_query)) {
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
    <title>Edit Data Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-5">Edit Data Mahasiswa</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama" class="block text-gray-700 font-bold mb-2">Nama</label>
                <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($data['nama']); ?>" required class="block p-2 w-full border rounded">
            </div>
            <div class="mb-3">
                <label for="nim" class="block text-gray-700 font-bold mb-2">NIM</label>
                <input type="text" name="nim" id="nim" value="<?php echo htmlspecialchars($data['nim']); ?>" required class="block p-2 w-full border rounded">
            </div>
            <div class="mb-3">
                <label for="jurusan" class="block text-gray-700 font-bold mb-2">Jurusan</label>
                <select name="jurusan" id="jurusan" required class="block p-2 w-full border rounded">
                    <option value="" disabled>Pilih Jurusan</option>
                    <option value="Teknik Mesin" <?php if($data['jurusan'] == 'Teknik Mesin') echo 'selected'; ?>>(S1) Teknik Mesin</option>
                    <option value="Teknik Informatika" <?php if($data['jurusan'] == 'Teknik Informatika') echo 'selected'; ?>>(S1) Teknik Informatika</option>
                    <option value="Teknik Industri" <?php if($data['jurusan'] == 'Teknik Industri') echo 'selected'; ?>>(S1) Teknik Industri</option>
                    <option value="Teknik Tekstil" <?php if($data['jurusan'] == 'Teknik Tekstil') echo 'selected'; ?>>(D3) Teknik Tekstil</option>
                    <option value="Manajemen Industri" <?php if($data['jurusan'] == 'Manajemen Industri') echo 'selected'; ?>>(D3) Manajemen Industri</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($data['email']); ?>" required class="block p-2 w-full border rounded">
            </div>
            <button type="submit" name="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Simpan Perubahan</button>
            <a href="index.php" class="ml-3 text-gray-600">Batal</a>
        </form>
    </div>
</body>
</html>