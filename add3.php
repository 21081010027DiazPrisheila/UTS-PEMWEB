<?php 
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_trans_upn = $_POST['id_trans_upn'];
      $id_kondektur = $_POST['id_kondektur'];
      $id_bus = $_POST['id_bus'];
      $id_driver = $_POST['id_driver'];
      $jumlah_km = $_POST['jumlah_km'];
      $tanggal = $_POST['tanggal'];
      //query SQL
      $query = "INSERT INTO trans_upn (id_trans_upn, id_kondektur, id_bus, id_driver, jumlah_km, tanggal) VALUES('$id_trans_upn' , '$id_kondektur', '$id_bus', '$id_driver', '$jumlah_km', '$tanggal')"; 

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
                <a href="<?php echo "trans.php"; ?>">Tabel Trans</a>
        </nav>

        <main role="main">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Trans berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Trans gagal disimpan</div>';
              }
           ?>

          <h3>Form Tambah Data Trans UPN</h3>
          <form action="add3.php" method="POST">
            
            <div>
              <label>ID ID TRANS UPN</label>
              <input type="text" placeholder="id_trans_upn" name="id_trans_upn" required="required">
            </div>
            <div>
              <label>ID KONDEKTUR</label>
              <input type="text" placeholder="id_kondektur" name="id_kondektur" required="required">
            </div>
            <div>
              <label>ID BUS</label>
              <input type="text" placeholder="id_bus" name="id_bus" required="required">
            </div>
            <div>
              <label>ID DRIVER</label>
              <input type="text" placeholder="id_driver" name="id_driver" required="required">
            </div>
            <div>
              <label>JUMLAH KM</label>
              <input type="text" placeholder="jumlah_km" name="jumlah_km" required="required">
            </div>
            <div>
              <label>TANGGAL</label>
              <input type="text" placeholder="tanggal" name="tanggal" required="required">
            </div>
            
            <button type="submit">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>