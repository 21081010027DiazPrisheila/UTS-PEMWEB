<?php 
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_bus = $_POST['id_bus'];
      $plat = $_POST['plat'];
      $status = $_POST['status'];
      //query SQL
      $query = "INSERT INTO bus (id_bus, plat, status) VALUES('$id_bus' , '$plat' , '$status')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>ADD</title>
  </head>

  <body>

    <div>
      <div>
        <nav>
                <a href="<?php echo "bus.php"; ?>">Tabel Bus</a>
        </nav>

        <main role="main">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Bus berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Bus gagal disimpan</div>';
              }
           ?>

          <h3>Form Tambah Data Bus</h3>
          <form action="add.php" method="POST">
            
            <div>
              <label>ID BUS</label>
              <input type="text" placeholder="id_bus" name="id_bus" required="required">
            </div>
            <div>
              <label>PLAT</label>
              <input type="text" placeholder="plat" name="plat" required="required">
            </div>
            <div>
              <label>STATUS</label>
              <input type="text" placeholder="status" name="status" required="required">
            </div>
            
            <button type="submit">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>