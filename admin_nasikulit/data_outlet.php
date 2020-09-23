<?php include_once "views/main.php";?>
<?php include_once "config/connection.php";?>
<?php 
$main_view= "<script>window.location.href='data_outlet.php';</script>";
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
            <li class="breadcrumb-item active">Data Outlet</li>
          </ol>
          <div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tambah Data Outlet</h3>
                  </div>
                  <?php
        			$query = mysqli_query($connect, "SELECT max(kode_outlet) as kodeOutlet FROM tb_outlet");
        			$data = mysqli_fetch_array($query);
        			$kodeoutlet = $data['kodeOutlet'];

        			// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
        			// dan diubah ke integer dengan (int)
        			$urutan = (int) substr($kodeoutlet, 3, 3);
        			$urutan++;
        			$huruf = "NKS";
        			$kodeoutlet = $huruf . sprintf("%03s", $urutan);
      			?>
                  <div class="card-body">
                  <form action="?&act=save" id="formtambahoutlet" enctype="multipart/form-data" method="post">
              		<div class="form-group">
                		<label>Kode Outlet</label>
                  		<div class="input-group">
                    	<div class="input-group-addon">
                      		<i class="fa fa-id-card"></i>
                    	</div>
                    	<input id="disabledTextInput" name="kodeoutlet" class="form-control" placeholder="kode dibuat otomatis" value="<?php echo $kodeoutlet ?>" readonly="readonly" onclick="validasi('outlet','Outlet')" />
                  	</div>
              	</div>
              	<div class="form-group">
                <label>Nama Outlet</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select class="form-control" id="exampleFormControlSelect1" name="namaoutlet">
                      <option selected value="">-Pilih Outlet-</option>
                        <option>Nasi Kulit Syuurga Pasar Santa</option>
                		<option>Nasi Kulit Syuurga Fatmawati</option>
                		<option>Nasi Kulit Syuurga Tebet</option>
                		<option>Nasi Kulit Syuurga Kalibata</option>
                		<option>Nasi Kulit Syuurga Tanjung Duren</option>
                		<option>Nasi Kulit Syuurga Meruya</option>
                		<option>Nasi Kulit Syuurga Kelapa Gading</option>
                		<option>Nasi Kulit Syuurga Rawamangun</option>
                		<option>Nasi Kulit Syuurga Bintaro</option>
                		<option>Nasi Kulit Syuurga Pamulang</option>
                		<option>Nasi Kulit Syuurga Cipondoh/Poris</option>
                		<option>Nasi Kulit Syuurga Depok Margonda</option>
                		<option>Nasi Kulit Syuurga Grand Depok City (GDC)</option>
                		<option>Nasi Kulit Syuurga Bekasi Timur</option>
                		<option>Nasi Kulit Syuurga Bandung</option>
                		<option>Nasi Kulit Syuurga Bogor</option>
                		<option>Nasi Kulit Syuurga Dapur Jogja</option>
                		<option>Nasi Kulit Syuurga Bali</option>
                		<option>Nasi Kulit Syuurga Cirebon</option>
                      </option>
                    </select>
                  </div>
              </div>
              <div class="modal-footer">
                <button onclick="javascript:validate();" class="btn btn-success" type="submit">
                  Tambah
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='data_outlet.php';">
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
                    <h3 class="card-title">Data Outlet</h3>
                  </div>
                  <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Kode Outlet</th>
                  <th>Nama Outlet</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              	<?php
                      $no = 1;
                      $data = mysqli_query($connect,"select * from tb_outlet");
                      while($d = mysqli_fetch_array($data)){
                    ?>
               <tr>
                  <td><span class="text-muted"><?php echo $no; ?></span></td>
                  <td><?php echo $d['kode_outlet']; ?></td>
                  <td><?php echo $d['nama_outlet']; ?></td>
                  <td class="text-left">
                    <a href='?&act=delete&id=<?php echo $d['kode_outlet']; ?>' onClick="return confirm('Yakin data akan dihapus ?')"
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
	$varkode		= $_POST['kodeoutlet'];
	//var_dump($varkode);
	$varnama		= $_POST['namaoutlet'];

  $cek_dulu=mysqli_query($connect,"SELECT * from tb_outlet where nama_outlet='$varnama'");
  $cek=mysqli_num_rows($cek_dulu);
   //if($cek>0) {
   //echo"<script>alert('Data yang di input sudah ada');history.back(-1);</script>";
   //}
   //else {
   $input=mysqli_query($connect,"INSERT INTO `tb_outlet`(`kode_outlet`, `nama_outlet`) VALUES ('$varkode','$varnama')");
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
$hapus=mysqli_query($connect,"DELETE FROM tb_outlet WHERE kode_outlet='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
  ?>