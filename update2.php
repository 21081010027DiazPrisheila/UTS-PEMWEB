<?php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_kondektur'])) {
          //query SQL
          $id_kondektur_upd = $_GET['id_kondektur'];
          $query = "SELECT * FROM kondektur WHERE id_kondektur = '$id_kondektur_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_kondektur = $_POST['id_kondektur'];
        $nama = $_POST['nama'];
    //query SQL
    $sql = "UPDATE kondektur SET nama='$nama' WHERE id_kondektur='$id_kondektur'"; 
    
      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: kondektur.php?status='.$status);
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
                <a href="<?php echo "kondektur.php"; ?>">Tabel Kondektur</a>
              </li>
              <li>
                <a href="<?php echo "add2.php"; ?>">Tambah Data Kondektur</a>
              </li>
            </ul>
        </nav>

        <main role="main" >


          <h3>Update Data Kondektur</h3>
          <form action="update2.php" method="POST">
          <?php while($data = mysqli_fetch_array($result)): ?>

            <div>
              <label>ID KONDEKTUR</label>
              <input type="text" placeholder="id_kondektur" name="id_kondektur" value="<?php echo $data['id_kondektur'];  ?>" required="required" readonly>
            </div>
            <div>
              <label>NAMA</label>
              <input type="text" placeholder="nama" name="nama" value="<?php echo $data['nama'];  ?>" required="required">
            </div>

            <?php endwhile; ?>
            <button type="submit">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>