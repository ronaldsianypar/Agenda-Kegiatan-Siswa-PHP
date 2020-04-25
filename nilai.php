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
$perintah=new oop();
if (isset($_POST['simpan'])){
  
  $sql= "INSERT INTO tb_kegiatan VALUES ('', '$_POST[waktu]','$_POST[waktu_selesai]','$_POST[kegiatan]','$_POST[set_pelajaran]');";
  $sqll= "INSERT INTO tb_laporan VALUES ('$_POST[kegiatan]','');";
  $eksekusi = mysqli_query($con, $sql);
  echo "<script>alert('Berhasil tersimpan');document.location.href='?menu=nilai'</script>";
  $eksekusii = mysqli_query($con, $sqll);
  echo "<script>alert('Berhasil tersimpan');document.location.href='?menu=nilai'</script>";
}
 if(isset($_GET['edit'])) {
    $sql = mysqli_query($con, "SELECT * FROM tb_kegiatan WHERE id = '$_GET[id]'");
    $isi = mysqli_fetch_array($sql);
  }
 if(isset($_GET['hapus'])){
    $sql = mysqli_query($con, "DELETE FROM tb_kegiatan WHERE id = '$_GET[id]'");
    if($sql){
      echo "<script>alert('Data berhasil dihapus');
      document.location.href='?menu=nilai'</script>";
    }else{
      echo "<script>alert('Data gagal dihapus');
      document.location.href='?menu=nilai'</script>";
    }
  }
  if (isset($_POST['update'])) {
    $sql = mysqli_query($con, "UPDATE tb_kegiatan SET waktu = '$_POST[waktu]', waktu_selesai = '$_POST[waktu_selesai]', kegiatan = '$_POST[kegiatan]', set_pelajaran = '$_POST[set_pelajaran]' WHERE id = '$_GET[id]'");
    $sqll = mysqli_query($con, "UPDATE tb_kegiatan SET kegiatan = '$_POST[kegiatan]','' WHERE kegiatan = '$_GET[kegiatan]'");
    if ($sql && $sqll) {
      echo "<script>alert('Data berhasil diubah');document.location.href='?menu=nilai';</script>";
    }else{
      echo "<script>alert('Data gagal diubah');document.location.href='?menu=nilai';</script>";
    }
  }
  if (isset($_POST['clear'])) {
    echo "<script>alert('Data dibersihkan');document.location.href='?menu=account';</script>";
  }else{
    mysqli_error($con);
  }
?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Form Kegiatan</h6>
            </div>
            <div class="card-body">
            <form method="post">
      
            <div class="form-group">
                <div class="row">
                    <div class="col">
                      <p>Waktu Mulai</p>
                    <input type="time" name="waktu" class="form-control"value="<?php echo $isi['waktu']?>" >
                    </div>
                    <div class="col">
                      <p>Waktu Selesai</p>
                    <input type="time" name="waktu_selesai" class="form-control" value="<?php echo  $isi['waktu_selesai']?>">
                    </div>
                    <div class="col">
                      <p>Kegiatan</p>
                    <input type="text" name="kegiatan" class="form-control" placeholder="Isi Kegiatan" value="<?php echo $isi['kegiatan'] ?>">
                    </div>
                     <div class="col">
                      <p>Pilih Pelajaran</p>
                    <select name="set_pelajaran" class="form-control">
                      <?php if ($isi['set_pelajaran'] === 'Agama') { ?>
                                <option value="Agama">Agama</option>
                            <?php }else if ($isi['set_pelajaran'] === 'PPKn') { ?>
                                <option value="PPKn">PPKn</option>
                            <?php }else if ($isi['set_pelajaran'] === 'Sejarah Indonesia') { ?>
                                <option value="Sejarah Indonesia">Sejarah Indonesia</option>
                            <?php }else if ($isi['set_pelajaran'] === 'PJOK') { ?>
                                <option value="PJOK">PJOK</option>    
                            <?php }else { ?>
                                <option value="" disabled selected>Set Pelajaran</option>
                      <?php } ?>
                        <option value="Agama">Agama</option>
                        <option value="PPKn">PPKn</option>
                        <option value="Sejarah Indonesia">Sejarah Indonesia</option>
                        <option value="PJOK">PJOK</option>
                    </select>
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
                      <th>Waktu Mulai</th>
                      <th>Waktu Selesai</th>
                      <th>Nama Kegiatan</th>
                      <th>  Set Pelajaran</th>
                      <th>Aksi  </th>
                    </tr>
                     <?php
    $a = $perintah->tampil($con, "tb_kegiatan");
    $no = 0;
    if ($a == "") {
        echo "<tr><td align='center' colspan='10'>NO RECORD</td></tr>";
    } else {
        foreach ($a as $r) {
            $no++;
            ?>

            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $r['waktu']; ?></td>
                <td><?php echo $r['waktu_selesai']; ?></td>
                <td><?php echo $r['kegiatan']; ?></td>
                <td><?php echo $r['set_pelajaran'] ?></td>
                <td><a href="?menu=nilai&hapus&id=<?php echo $r['id'] ?>" onClick="return confirm('Hapus data ?')"><img src="../images/b_drop.png"></a></td>
                <td><a href="?menu=nilai&edit&id=<?php echo $r['id'] ?>"><img src="../images/b_edit.png"></a></td>
            </tr>
             <?php } } ?>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

    