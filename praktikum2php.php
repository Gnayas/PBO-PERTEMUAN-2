<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kasir & Penghitungan Diskon</title>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --bg-color: #f8fafc;
            --card-bg: #ffffff;
            --text-color: #1e293b;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 40px 20px;
        }
        .container {
            max-width: 650px;
            margin: 0 auto;
            background: var(--card-bg);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }
        h2 {
            color: var(--primary);
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 15px;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 14px;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px 12px;
            box-sizing: border-box;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.2s;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }
        .btn-submit {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            margin-top: 10px;
            transition: background-color 0.2s;
        }
        .btn-submit:hover {
            background-color: var(--primary-dark);
        }
        .result-box {
            margin-top: 35px;
            border-top: 2px dashed #cbd5e1;
            padding-top: 25px;
        }
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        .badge-vip { background-color: #fef3c7; color: #d97706; }
        .badge-regular { background-color: #f1f5f9; color: #64748b; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #e2e8f0;
            padding: 10px 12px;
            text-align: left;
        }
        th {
            background-color: #f8fafc;
            font-weight: 600;
        }
        .table-rincian {
            margin-top: 20px;
        }
        .table-rincian th {
            background-color: var(--primary);
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Program Penghitungan Diskon Toko</h2>

    <form action="" method="POST">
        <div class="form-group">
            <label>Nama Pembeli:</label>
            <input type="text" name="nama_pembeli" required placeholder="Contoh: Gnayas">
        </div>

        <div class="form-group">
            <label>Nama Produk / Barang:</label>
            <input type="text" name="nama_barang" required placeholder="Contoh: Sepatu Sneakers">
        </div>

        <div class="form-group">
            <label>Harga Satuan (Rp):</label>
            <input type="number" name="harga_satuan" min="1" required placeholder="Contoh: 250000">
        </div>

        <div class="form-group">
            <label>Jumlah Beli (Qty):</label>
            <input type="number" name="jumlah_beli" min="1" value="1" required>
        </div>

        <div class="form-group">
            <label>Status Keanggotaan:</label>
            <select name="status_vip">
                <option value="0">Reguler (Tanpa Diskon VIP)</option>
                <option value="1">Member VIP (Extra Diskon 5%)</option>
            </select>
        </div>

        <button type="submit" name="hitung" class="btn-submit">Proses Hitung Transaksi</button>
    </form>

    <?php
    if (isset($_POST['hitung'])) {
        // 1. Variabel dengan minimal 4 tipe data berbeda
        $nama_pembeli = (string) $_POST['nama_pembeli'];   // String
        $nama_barang  = (string) $_POST['nama_barang'];    // String
        $harga_satuan = (float) $_POST['harga_satuan'];    // Float / Double
        $jumlah_beli  = (int) $_POST['jumlah_beli'];       // Integer
        $status_vip   = (bool) $_POST['status_vip'];       // Boolean

        // Hitung total belanja kotor
        $total_kotor = $harga_satuan * $jumlah_beli;

        // 2. Fungsi buatan sendiri untuk kalkulasi diskon (menggunakan percabangan)
        function hitungDiskonBelanja($total, $is_vip) {
            $persen_diskon = 0;

            // Percabangan utama berdasarkan nominal total belanja
            if ($total >= 500000) {
                $persen_diskon = 0.15; // Diskon 15% untuk belanja >= 500rb
            } elseif ($total >= 200000) {
                $persen_diskon = 0.10; // Diskon 10% untuk belanja >= 200rb
            } else {
                $persen_diskon = 0.05; // Diskon 5% untuk belanja < 200rb
            }

            // Percabangan tambahan khusus member VIP
            if ($is_vip) {
                $persen_diskon += 0.05; // Tambahan diskon 5%
            }

            return [
                'persen' => $persen_diskon * 100,
                'jumlah' => $total * $persen_diskon
            ];
        }

        $hasil_diskon = hitungDiskonBelanja($total_kotor, $status_vip);
        $total_bayar  = $total_kotor - $hasil_diskon['jumlah'];
        ?>

        <div class="result-box">
            <h3>Struk Transaksi Pembelian</h3>
            <p><strong>Nama Pembeli:</strong> <?php echo htmlspecialchars($nama_pembeli); ?></p>
            <p><strong>Status Member:</strong> 
                <?php if($status_vip): ?>
                    <span class="badge badge-vip">Member VIP (Diskon Aktif)</span>
                <?php else: ?>
                    <span class="badge badge-regular">Reguler</span>
                <?php endif; ?>
            </p>

            <table class="table-rincian">
                <tr>
                    <th>Deskripsi Rincian</th>
                    <th>Jumlah (IDR)</th>
                </tr>
                <tr>
                    <td>Produk: <?php echo htmlspecialchars($nama_barang); ?> (<?php echo $jumlah_beli; ?>x @ Rp <?php echo number_format($harga_satuan, 0, ',', '.'); ?>)</td>
                    <td>Rp <?php echo number_format($total_kotor, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>Diskon yang Didapat (<?php echo $hasil_diskon['persen']; ?>%)</td>
                    <td>- Rp <?php echo number_format($hasil_diskon['jumlah'], 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td><strong>Total Akhir yang Dibayar</strong></td>
                    <td><strong>Rp <?php echo number_format($total_bayar, 0, ',', '.'); ?></strong></td>
                </tr>
            </table>

            <h4 style="margin-top: 20px;">Rincian Item Barang (Simulasi Perulangan)</h4>
            <table>
                <tr>
                    <th>No. Item</th>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                </tr>
                <?php
                // 3. Perulangan (Looping) untuk mencetak rincian satuan barang
                for ($i = 1; $i <= $jumlah_beli; $i++) {
                    echo "<tr>";
                    echo "<td>Item ke-$i</td>";
                    echo "<td>" . htmlspecialchars($nama_barang) . "</td>";
                    echo "<td>Rp " . number_format($harga_satuan, 0, ',', '.') . "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    <?php } ?>
</div>

</body>
</html>