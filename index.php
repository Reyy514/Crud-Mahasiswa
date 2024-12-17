<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold text-center mb-5">Data Mahasiswa</h1>
        <div class="mb-4">
            <a href="tambah.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Data Mahasiswa</a>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto border-collapse w-full border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2 text-gray-700">ID</th>
                        <th class="border border-gray-300 px-4 py-2 text-gray-700">Nama</th>
                        <th class="border border-gray-300 px-4 py-2 text-gray-700">NIM</th>
                        <th class="border border-gray-300 px-4 py-2 text-gray-700">Jurusan</th>
                        <th class="border border-gray-300 px-4 py-2 text-gray-700">Email</th>
                        <th class="border border-gray-300 px-4 py-2 text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($r = mysqli_fetch_assoc($data)): ?>
                    <tr class="hover:bg-gray-100 text-center">
                        <td class="border border-gray-300 px-4 py-2"><?php echo $r['id']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $r['nama']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $r['nim']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $r['jurusan']; ?></td>
                        <td class="border border-gray-300 px-4 py-2"><?php echo $r['email']; ?></td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex justify-center space-x-2">
                                <a href="edit.php?id=<?php echo $r['id']; ?>" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition duration-300">Edit</a>
                                <a href="hapus.php?id=<?php echo $r['id']; ?>" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-600 transiton duration-300">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php mysqli_close($conn);?>