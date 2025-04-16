<!DOCTYPE html> <!-- Menandakan bahwa ini adalah dokumen HTML5 -->
<html lang="id"> <!-- Bahasa utama halaman adalah Bahasa Indonesia -->
<head>
    <meta charset="UTF-8"> <!-- Mengatur karakter encoding menjadi UTF-8 agar karakter indo tampil dengan benar -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Membuat tampilan responsif di semua perangkat -->
    <title>Aplikasi Perhitungan Diskon</title> <!-- Judul halaman yang tampil di tab browser -->
    <link rel="stylesheet" href="style.css?v=1"> <!-- Menghubungkan ke file CSS  -->
</head>
<body>
    <div class="container"> <!-- Elemen pembungkus utama layout -->
        <div class="card"> <!-- Kartu sebagai tampilan utama aplikasi -->
            <div class="card-header"> <!--  untuk judul/logo -->
                <img src="images/logo.png" alt="Logo.png" width="30"> <!-- Menampilkan logo aplikasi -->
                <h3>Aplikasi Perhitungan Diskon</h3> <!-- Judul aplikasi -->
            </div>
            <div class="card-body"> <!-- Isi utama kartu -->
                <form method="post" action=""> <!-- Formulir penghitungan diskon, data dikirim ke halaman yang sama -->
                    <div class="form-group"> <!-- Grup input pertama -->
                        <label for="harga">Harga Barang (Rp)</label> <!-- Label input harga -->
                        <input type="text" name="harga" id="harga" class="form-input" required placeholder="Masukkan Harga"> <!-- Input harga -->
                    </div>
                    <div class="form-group"> <!-- Grup input kedua -->
                        <label for="diskon">Persentase Diskon (%)</label> <!-- Label input diskon -->
                        <input type="text" name="diskon" id="diskon" class="form-input" required placeholder="Masukkan Diskon"> <!-- Input diskon -->
                    </div>
                    <button type="submit" name="hitung" class="btn">Hitung Diskon</button> <!-- Tombol untuk menghitung -->
                    <button type="reset" class="btn btn-reset" onclick="window.location.href = window.location.href;">Reset</button> <!-- Tombol reset yang juga me-refresh halaman -->
                </form>

                <?php
                if (isset($_POST['hitung'])) { // Mengecek apakah tombol "hitung" ditekan

                    // Mengambil nilai input dan mengganti koma menjadi titik
                    $hargaInput = str_replace('.', '', $_POST['harga']);
                    $diskonInput = str_replace(',', '.', $_POST['diskon']);

                    // Menghapus titik dari harga agar tidak mengganggu konversi
                    $hargaInput = str_replace(',', '.', $hargaInput);

                    // Mengubah input menjadi angka float
                    $harga = floatval($hargaInput);
                    $diskon = floatval($diskonInput);

                    echo '<div class="alert">'; // Membuat kotak hasil output

                    // Validasi nilai harga dan diskon
                    if ($harga <= 0) {
                        echo "Harga harus lebih dari 0."; // Validasi jika harga 0 atau negatif
                    } elseif ($diskon < 0 || $diskon > 100) {
                        echo "Diskon harus antara 0 - 100%."; // Validasi jika diskon tidak dalam rentang 0–100
                    } else {
                        // Hitung nilai diskon dan total harga setelah diskon
                        $nilaiDiskon = $harga * ($diskon / 100);
                        $totalHarga = $harga - $nilaiDiskon;

                        // Tampilkan hasil dalam format rupiah
                        echo "<strong>Harga Awal:</strong> Rp " . number_format($harga, 2, ',', '.') . "<br>";
                        echo "<strong>Nilai Diskon:</strong> Rp " . number_format($nilaiDiskon, 2, ',', '.') . "<br>";
                        echo "<strong>Total Harga Setelah Diskon:</strong> Rp " . number_format($totalHarga, 2, ',', '.');
                    }

                    echo '</div>'; // Menutup kotak hasil
                }
                ?>

                <footer class="footer"> <!-- Bagian footer bawah halaman -->
                    <div class="footer-container">
                        <p>&copy; <?php echo date("Y"); ?> JANGAN TANYA BANYAK KAK,PAK SAYA JUGA MASIH PEMULA</p> <!-- Tahun otomatis dan teks tambahan -->
                        <nav>
                            <a href="index.php">Beranda</a> | <!-- Link ke halaman utama -->
                        </nav>
                        <div class="social-icons">
                            <a href="https://wa.me/085768382556" target="_blank">WhatsApp</a> <!-- Tombol menuju WhatsApp -->
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>
