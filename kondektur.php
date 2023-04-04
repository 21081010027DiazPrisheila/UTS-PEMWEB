<?php 
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TABEL KONDEKTUR</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>

    <div>
      <div>
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

        <main role="main">
          <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Kondektur berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Kondektur gagal di-update</div>';
              }

            }
           ?>

          <h2 align="center">KONDEKTUR</h2>
          <div>
            <table border="1" align="center">
              <thead>
                <tr>
                  <th>ID Kondektur</th>
                  <th>Nama</th>
                  <th>Akses</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM kondektur";
                  $result = mysqli_query(connection(),$query);
                 ?>
                
                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td>
                      <a href="<?php echo "update2.php?id_kondektur=".$data['id_kondektur']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "delete2.php?id_kondektur=".$data['id_kondektur']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
