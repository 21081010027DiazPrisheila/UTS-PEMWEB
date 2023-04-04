<?php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_bus'])) {
          //query SQL
          $id_bus_upd = $_GET['id_bus'];
          $query = "SELECT * FROM bus WHERE id_bus = '$id_bus_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_bus = $_POST['id_bus'];
      $plat = $_POST['plat'];
      $status = $_POST['status'];
    //query SQL
    $sql = "UPDATE bus SET plat='$plat', status='$status' WHERE id_bus='$id_bus'"; 
    
    
      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: bus.php?status='.$status);
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
                <a href="<?php echo "bus.php"; ?>">Tabel Bus</a>
              </li>
              <li>
                <a href="<?php echo "add.php"; ?>">Tambah Data Bus</a>
              </li>
            </ul>
        </nav>

        <main role="main" >


          <h3>Update Data Driver</h3>
          <form action="update.php" method="POST">
          <?php while($data = mysqli_fetch_array($result)): ?>

            <div>
              <label>ID BUS</label>
              <input type="text" placeholder="id_bus" name="id_bus" value="<?php echo $data['id_bus'];  ?>" required="required" readonly>
            </div>
            <div>
              <label>PLAT</label>
              <input type="text" placeholder="plat" name="plat" value="<?php echo $data['plat'];  ?>" required="required">
            </div>
            <div>
              <label>STATUS</label>
              <input type="text" placeholder="status" name="status" value="<?php echo $data['status'];  ?>" required="required">
            </div>

            <?php endwhile; ?>
            <button type="submit">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>