<?php 
  include ('conn.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>TABEL DRIVER</title>
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
                <li class="navi"><a href="<?php echo "gaji1.php"; ?>">Tabel Gaji Driver</a></li>
                <li class="navi"><a href="<?php echo "add1.php"; ?>">Tambah Data</a></li>
          </ul>
        </nav>

        <main role="main">
          <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Driver berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Driver gagal di-update</div>';
              }

            }
           ?>

          <h2 align="center">DRIVER</h2>
          <div>
            <table border="1" align="center">
              <thead>
                <tr>
                  <th>ID Driver</th>
                  <th>Nama</th>
                  <th>No SIM</th>
                  <th>Alamat</th>
                  <th>Akses</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  $query = "SELECT * FROM driver";
                  $result = mysqli_query(connection(),$query);
                 ?>
                
                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['no_sim'];  ?></td>
                    <td><?php echo $data['alamat'];  ?></td>
                    <td>
                      <a href="<?php echo "update1.php?id_driver=".$data['id_driver']; ?>" class="btn btn-outline-warning btn-sm"> Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "delete1.php?id_driver=".$data['id_driver']; ?>" class="btn btn-outline-danger btn-sm"> Delete</a>
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
