  <?php
include "config/koneksi.php";
include "library/controllers.php";
error_reporting(0);
//function tampil($con, $table) {
        //$sql = "SELECT * FROM $table";
       // $query = mysqli_query($con, $sql);
      //  while ($data = mysqli_fetch_array($query))
          //  $isi[] = $data;
        //return @$isi;
      //}
$perintah = new oop();
if (isset($_POST['simpan'])){
  
  $sql= "INSERT INTO tb_kegiatan VALUES ('', '$_POST[waktu]','$_POST[waktu_selesai]','$_POST[kegiatan]','$_POST[set_pelajaran]');";
  $eksekusi = mysqli_query($con, $sql, $sql1);
  echo "<script>alert('Berhasil tersimpan');document.location.href='?menu=laporankegiatan'</script>";
}
 if(isset($_GET['edit'])) {
    $sql = mysqli_query($con, "SELECT * FROM tb_laporan WHERE kegiatan = '$_GET[kegiatan]'");
    $isi = mysqli_fetch_array($sql);
  }
 if(isset($_GET['hapus'])){
    $sql = mysqli_query($con, "DELETE FROM tb_kegiatan WHERE id = '$_GET[id]'");
    if($sql){
      echo "<script>alert('Data berhasil dihapus');
      document.location.href='?menu=laporankegiatan'</script>";
    }else{
      echo "<script>alert('Data gagal dihapus');
      document.location.href='?menu=laporankegiatan'</script>";
    }
  }
  //if (isset($_POST['update'])) {
    //$fileName = $_FILES['gambar']['name'];
    //$sql = mysqli_query($con, "UPDATE tb_kegiatan SET kegiatan = '$_POST[kegiatan]','$fileName' WHERE kegiatan = '$_GET[kegiatan]'");
      //   move_uploaded_file($_FILES['gambar']['tmp_name'], "gambar/".$_FILES['gambar']['name']);
    //if ($sql) {
      //echo "<script>alert('Data berhasil diubah');document.location.href='?menu=laporankegiatan';</script>";
    //}else{
//      echo "<script>alert('Data gagal diubah');document.location.href='?menu=laporankegiatan';</script>";
   // }
 // }

?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Form Laporan Kegiatan</h6>
            </div>
            <div class="card-body">
            <form method="post" enctype="multipart/form-data">
               <strong> <p>*Klik Edit Untuk Menanambahkan Foto Bukti, Bahwa Anda Telah Melakukan Kegiatan Tersebut</p></strong>
            <div class="form-group">
                <div class="row">
               
                    <div class="col">
                      <p>Kegiatan</p>
                    <input type="text" name="kegiatan" class="form-control" placeholder="Isi Kegiatan" value="<?php echo $isi['kegiatan'] ?>">
                    </div>
                    <div class="col">
                      <p>Bukti Kegiatan</p>
                    <input type="file" name="buktikegiatan" class="form-control" placeholder="Bukti Kegiatan" value="<?php echo $isi['Bukti kegiatan'] ?>">
                    </div>
                    
                </div>
            </div>
            <?php if (isset($_GET['edit'])) {?>
                <td><input class="btn btn-warning" type="submit" name="update" value="UPDATE"></td>
              <?php }else{ ?>
                <td><input class="btn btn-primary" type="submit" name="simpan" value="SIMPAN"></td>
            <?php } ?>
            <button class="btn btn-secondary" name="clear">CLEAR</button>

            </form>
            <br><br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                      <th>No.</th>
                      <th>Kegiatan</th>
                      <th>Bukti</th>
                      <th>Aksi  </th>
                    </tr>
                     <?php
    $a = $perintah->tampil($con, "tb_laporan");
    $no = 0;
    if ($a == "") {
        echo "<tr><td align='center' colspan='10'>NO RECORD</td></tr>";
    } else {
        foreach ($a as $r) {
            $no++;
            ?>

            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $r['kegiatan']; ?></td>
                <td><img src="gambar"></td>
                <td><a href="?menu=laporankegiatan&edit&kegiatan=<?php echo $r['kegiatan'] ?>">Edit</a></td>
            </tr>
             <?php } } ?>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

    