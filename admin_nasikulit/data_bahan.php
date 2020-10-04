<?php include_once "views/main.php";?>
<?php include_once "config/connection.php";?>
<?php 
$main_view= "<script>window.location.href='data_bahan.php';</script>";
switch (@$_GET["act"]){
default:
//INDEX======================================================================================================
?>
<div class="my-3 my-md-1">
  <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Data Bahan</li>
          </ol>
          <div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tambah Data Bahan</h3>
                  </div>
                  <div class="card-body">
                  <form action="?&act=save" id="formtambahbahan" enctype="multipart/form-data" method="post">
                  <div class="form-group">
                  <label>Nama Bahan</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-id-card"></i>
                    </div>
                    <input type="name" name="namabahan" class="form-control" placeholder="Masukan nama bahan" />
                    </div>
                </div>
                <div class="form-group">
                  <label>Berat Bahan</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-id-card"></i>
                    </div>
                    <input type="number" name="berat" class="form-control" min="1" />
                    </div>
                </div>
                <div class="form-group">
                  <label>Harga Bahan</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-id-card"></i>
                    </div>
                    <input type="name" name="harga" class="form-control" placeholder="Masukan harga bahan" />
                    </div>
                </div>
                <div class="form-group">
                <label>Satuan Bahan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="satuanbahan" class="form-control">
                      <option selected value="">-Pilih Satuan Bahan-</option>
                        <?php
                        //include "../config/connection.php"; 
                            $querysatuan = mysqli_query($connect,"SELECT * FROM tb_satuan_bahan");
                            while ($datasatuan = mysqli_fetch_array($querysatuan)){
                        ?>
                      <option value="<?php echo $datasatuan['id_satuan'] ?>"><?php echo $datasatuan['nama_satuan'] ?>
                            <?php } ?>
                      </option>
                      
                    </select>
                  </div>
              </div>
                <div class="modal-footer">
                <button onclick="javascript:validate();" class="btn btn-success" type="submit">
                  Tambah
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='data_bahan.php';">
                  Batal
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
                <form class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Bahan</h3>
                  </div>
                  <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Nama Bahan</th>
                  <th>Berat Bahan</th>
                  <th>Satuan Bahan</th>
                  <th>Harga Bahan</th>
                  
                  <th class="w-2">Aksi</th>
                </tr>
              </thead>
              <tbody>
              	<?php
                      $no = 1;
                      $data = mysqli_query($connect,"SELECT id_bahan, nama_bahan, berat_bahan, harga_bahan, nama_satuan FROM tb_bahan JOIN tb_satuan_bahan ON tb_satuan_bahan.id_satuan=tb_bahan.id_satuan");
                      while($d = mysqli_fetch_array($data)){
                    ?>
               <tr>
                  <td><span class="text-muted"><?php echo $no; ?></span></td>
                  <td><?php echo $d['nama_bahan']; ?></td>
                  <td><?php echo $d['berat_bahan']; ?></td>
                  <td><?php echo $d['nama_satuan']; ?></td>
                  <td><?php echo $d['harga_bahan']; ?></td>
                  
                  <td class="text-left">
                    <a href="bahan_edit.php?id=<?php echo $d['id_bahan'];?>" class="btn btn-info btn-sm"><i class="fe fe-edit"></i>Ubah</a>
                    <a href="?&act=delete&id=<?php echo $d['id_bahan']; ?>" onClick="return confirm('Yakin data akan dihapus ?')"
                    class="btn btn-danger btn-sm"><i class="fe fe-trash"></i>Hapus</a>
                  </td>
                </tr>
              <?php $no++; } ?>
              </tbody>
            </table> 
            <script>
              require(['datatables', 'jquery'], function(datatable, $) {
                    $('.datatable').DataTable();
                  });
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
  <?php
  break;

  case "save";
	$varnamabahan		= $_POST['namabahan'];
	//var_dump($varkode);
	$varberatbahan		= $_POST['berat'];
	$varsatuanbahan		= $_POST['satuanbahan'];
	$varhargabahan		= $_POST['harga'];

  $cek_dulu=mysqli_query($connect,"SELECT * from tb_bahan where nama_bahan='$varnamabahan'");
  $cek=mysqli_num_rows($cek_dulu);
   //if($cek>0) {
   //echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   //}
   //else {
   $input=mysqli_query($connect,"INSERT INTO `tb_bahan`(`id_bahan`, `nama_bahan`, `berat_bahan`, `harga_bahan`, `id_satuan`) VALUES ('','$varnamabahan','$varberatbahan','$varhargabahan','$varsatuanbahan')");
   //var_dump($input); exit();
      if ($input){
        //$_SESSION[status]    = "sukses";
        //echo "masuk";
      echo $main_view;
      }
      else {
        //echo "gagal";
      echo "<script>alert('Proses Gagal');history.back(-1);</script>";  
      }
 break;

case "delete";
$id=$_GET['id'];
$hapus=mysqli_query($connect,"DELETE FROM tb_bahan WHERE id_bahan='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
?>