<?php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_trans_upn'])) {
          //query SQL
          $id_trans_upn_upd = $_GET['id_trans_upn'];
          $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_trans_upn = $_POST['id_trans_upn'];
        $id_kondektur = $_POST['id_kondektur'];
        $id_bus = $_POST['id_bus'];
        $id_driver = $_POST['id_driver'];
        $jumlah_km = $_POST['jumlah_km'];
        $tanggal = $_POST['tanggal'];
    //query SQL
    $sql = "UPDATE trans_upn SET id_kondektur='$id_kondektur', id_bus='$id_bus', id_driver='$id_driver', jumlah_km='$jumlah_km', tanggal='$tanggal' WHERE id_trans_upn='$id_trans_upn'"; 
    
      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: trans.php?status='.$status);
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
                <a href="<?php echo "trans.php"; ?>">Tabel Trans UPN</a>
              </li>
              <li>
                <a href="<?php echo "add3.php"; ?>">Tambah Data Trans UPN</a>
              </li>
            </ul>
        </nav>

        <main role="main" >


          <h3>Update Data Trans UPN</h3>
          <form action="update3.php" method="POST">
          <?php while($data = mysqli_fetch_array($result)): ?>

            <div>
              <label>ID TRANS UPN</label>
              <input type="text" placeholder="id_trans_upn" name="id_trans_upn" value="<?php echo $data['id_trans_upn'];  ?>" required="required" readonly>
            </div>
            <div>
              <label>ID KONDEKTUR</label>
              <input type="text" placeholder="id_kondektur" name="id_kondektur" value="<?php echo $data['id_kondektur'];  ?>" required="required">
            </div>
            <div>
              <label>ID BUS</label>
              <input type="text" placeholder="id_bus" name="id_bus" value="<?php echo $data['id_bus'];  ?>" required="required" >
            </div>
            <div>
              <label>ID DRIVER</label>
              <input type="text" placeholder="id_driver" name="id_driver" value="<?php echo $data['id_driver'];  ?>" required="required">
            </div>
            <div>
              <label>JUMLAH KM</label>
              <input type="text" placeholder="jumlah_km" name="jumlah_km" value="<?php echo $data['jumlah_km'];  ?>" required="required" >
            </div>
            <div>
              <label>TANGGAL</label>
              <input type="text" placeholder="tanggal" name="tanggal" value="<?php echo $data['tanggal'];  ?>" required="required">
            </div>

            <?php endwhile; ?>
            <button type="submit">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>