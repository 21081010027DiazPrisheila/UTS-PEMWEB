<?php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_driver'])) {
          //query SQL
          $id_driver_upd = $_GET['id_driver'];
          $query = "SELECT * FROM driver WHERE id_driver = '$id_driver_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_driver = $_POST['id_driver'];
        $nama = $_POST['nama'];
        $no_sim = $_POST['no_sim'];
        $alamat = $_POST['alamat'];
    //query SQL
    $sql = "UPDATE driver SET nama='$nama', no_sim='$no_sim', alamat='$alamat' WHERE id_driver='$id_driver'"; 
    
      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: driver.php?status='.$status);
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>UPDATE</title>
  </head>

  <body>

    <div>
      <div>
        <nav>
            <ul>
              <li>
                <a href="<?php echo "driver.php"; ?>">Tabel Driver</a>
              </li>
              <li>
                <a href="<?php echo "add1.php"; ?>">Tambah Data Driver</a>
              </li>
            </ul>
        </nav>

        <main role="main" >


          <h3>Update Data Driver</h3>
          <form action="update1.php" method="POST">
          <?php while($data = mysqli_fetch_array($result)): ?>

            <div>
              <label>ID DRIVER</label>
              <input type="text" placeholder="id_driver" name="id_driver" value="<?php echo $data['id_driver'];  ?>" required="required" readonly>
            </div>
            <div>
              <label>NAMA</label>
              <input type="text" placeholder="nama" name="nama" value="<?php echo $data['nama'];  ?>" required="required">
            </div>
            <div>
              <label>NO SIMPAN</label>
              <input type="text" placeholder="no_sim" name="no_sim" value="<?php echo $data['no_sim'];  ?>" required="required">
            </div>
            <div>
              <label>ALAMAT</label>
              <input type="text" placeholder="alamat" name="alamat" value="<?php echo $data['alamat'];  ?>" required="required">
            </div>

            <?php endwhile; ?>
            <button type="submit">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>