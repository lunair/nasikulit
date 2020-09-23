<?php include_once "views/main.php";?>
<?php include_once "config/connection.php";?>
<?php 
$main_view= "<script>window.location.href='satuan_bahan.php';</script>";
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
            <li class="breadcrumb-item active">Satuan Bahan</li>
          </ol>
          <div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tambah Satuan Bahan</h3>
                  </div>
                  <div class="card-body">
                  <form action="?&act=save" id="formtambahsatuan" enctype="multipart/form-data" method="post">
              		<div class="form-group">
                	<label>Satuan Bahan</label>
                  	<div class="input-group">
                    <div class="input-group-addon">
                      	<i class="fa fa-id-card"></i>
                    </div>
                    <input type="name" name="satuan" class="form-control" placeholder="Masukan satuan bahan" />
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
                    <h3 class="card-title">Data Satuan Bahan</h3>
                  </div>
                  <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Nama Satuan Bahan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              	<?php
                      $no = 1;
                      $data = mysqli_query($connect,"select * from tb_satuan_bahan");
                      while($d = mysqli_fetch_array($data)){
                    ?>
               <tr>
                  <td><span class="text-muted"><?php echo $no; ?></span></td>
                  <td><?php echo $d['nama_satuan']; ?></td>
                  <td class="text-left">
                    <a href='?&act=delete&id=<?php echo $d['id_satuan'];?>' onClick="return confirm('Yakin data akan dihapus ?')"
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
  <?php
  break;

  case "save";
	$varnamasatuan		= $_POST['satuan'];


  $cek_dulu=mysqli_query($connect,"SELECT * from tb_satuan_bahanahan where nama_satuan='$varnamasatuan'");
  $cek=mysqli_num_rows($cek_dulu);
   //if($cek>0) {
   //echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   //}
   //else {
   $input=mysqli_query($connect,"INSERT INTO `tb_satuan_bahan`(`id_satuan`, `nama_satuan`) VALUES ('','$varnamasatuan')");
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
$hapus=mysqli_query($connect,"DELETE FROM `tb_satuan_bahan` WHERE id_satuan='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
?>