<?php 
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_driver = $_POST['id_driver'];
      $nama = $_POST['nama'];
      $no_sim = $_POST['no_sim'];
      $alamat = $_POST['alamat'];
      //query SQL
      $query = "INSERT INTO driver (id_driver, nama, no_sim, alamat) VALUES('$id_driver' , '$nama' , '$no_sim', '$alamat')"; 

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
                <a href="<?php echo "driver.php"; ?>">Tabel Driver</a>
        </nav>

        <main role="main">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Driver berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Driver gagal disimpan</div>';
              }
           ?>

          <h3>Form Tambah Data Driver</h3>
          <form action="add1.php" method="POST">
            
            <div>
              <label>ID DRIVER</label>
              <input type="text" placeholder="id_driver" name="id_driver" required="required">
            </div>
            <div>
              <label>NAMA</label>
              <input type="text" placeholder="nama" name="nama" required="required">
            </div>
            <div>
              <label>NO SIM</label>
              <input type="text" placeholder="no_sim" name="no_sim" required="required">
            </div>
            <div>
              <label>ALAMAT</label>
              <input type="text" placeholder="alamat" name="alamat" required="required">
            </div>
            
            <button type="submit">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>