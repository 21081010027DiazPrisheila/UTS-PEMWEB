<?php
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gaji</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <ul class="pemweb">
            <li class="navi"><a href="<?php echo "bus.php"; ?>">Tabel Bus</a></li>
            <li class="navi"><a href="<?php echo "driver.php"; ?>">Tabel Driver</a></li>
            <li class="navi"><a href="<?php echo "kondektur.php"; ?>">Tabel Kondektur</a></li>
            <li class="navi"><a href="<?php echo "trans.php"; ?>">Tabel Trans Upn</a></li>
            <li class="navi"><a href="<?php echo "gaji2.php"; ?>">Tabel Gaji Kondektur</a></li>
            <li class="navi"><a href="<?php echo "add2.php"; ?>">Tambah Data</a></li>
        </ul>
    </nav>

    <table border="1" align="center">
        <thead>
            <tr>
                <th>ID Kondektur</th>
                <th>Nama</th>
                <th>Jumlah KM</th>
                <th>Gaji</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($_POST['bulan'])) {
                $bulan = $_POST['bulan'];
                //...
            } else {
                $bulan = "01";
            }

            ?>

            <h2 align="center">GAJI KONDEKTUR BULAN KE-
                <?php echo $bulan ?>
            </h2>

            <form action="" method="post">
                <label for="bulan">Pilih Bulan:</label>
                <select name="bulan" id="bulan">
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <button type="submit">Tampilkan</button>
            </form>

            <?php
            $query = "SELECT kondektur.id_kondektur, kondektur.nama, SUM(trans_upn.jumlah_km) as total_km
                FROM kondektur
                JOIN trans_upn ON kondektur.id_kondektur = trans_upn.id_kondektur
                WHERE MONTH(trans_upn.tanggal) = '$bulan' AND YEAR(trans_upn.tanggal) = YEAR(CURRENT_DATE())
                GROUP BY kondektur.id_kondektur";

            $result = mysqli_query(connection(), $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['id_kondektur']; ?>
                        </td>
                        <td>
                            <?php echo $row['nama']; ?>
                        </td>
                        <td>
                            <?php echo $row['total_km']; ?>
                        </td>
                        <td>
                            <?php echo "Rp." . $row['total_km'] * 1500; ?>
                        </td>
                    </tr>
                    <?php
                }
                mysqli_free_result($result);
                ?>
            </tbody>
        </table>
    <?php
            } else {
                echo "<br>Tidak ada data.";
            }
            mysqli_close(connection());
            ?>
</body>
</html>