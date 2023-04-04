<?php 
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_kondektur = $_POST['id_kondektur'];
      $nama = $_POST['nama'];
      //query SQL
      $query = "INSERT INTO kondektur (id_kondektur, nama) VALUES('$id_kondektur' , '$nama')"; 

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
                <a href="<?php echo "kondektur.php"; ?>">Tabel Kondektur</a>
        </nav>

        <main role="main">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Kondektur berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Kondektur gagal disimpan</div>';
              }
           ?>

          <h3>Form Tambah Data Kondektur</h3>
          <form action="add2.php" method="POST">
            
            <div>
              <label>ID KONDEKTUR</label>
              <input type="text" placeholder="id_kondektur" name="id_kondektur" required="required">
            </div>
            <div>
              <label>NAMA</label>
              <input type="text" placeholder="nama" name="nama" required="required">
            </div>
            
            <button type="submit">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>