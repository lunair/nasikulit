<?php include_once "views/main.php";?>
<?php include_once "config/connection.php";?>
<?php 
$main_view= "<script>window.location.href='trans_all_outlet.php';</script>";
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
            <li class="breadcrumb-item active">Transaksi Penjualan All Outlet</li>
          </ol>
          <div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Tambah Transaksi</h3>
                  </div>
                  <?php

    				$tahun = date ('Y');
    				$nomor = "/FP/NKS/".$tahun;
    				$query = mysqli_query($connect, "SELECT max(no_faktur) as Faktur FROM tb_trans_penjualan");
        			$data = mysqli_fetch_array($query);
    				$no= $data['Faktur'];
    				$noUrut= $no+1;
    				$nofak = "66";
    

    				$kode =  sprintf("%01s", $noUrut);
    				$nomorbaru = $nofak.$kode.$nomor;
				  ?>
                  <div class="card-body">
                  <form action="?&act=save" id="formtambahtransaksi" name="formtambahtransaksi" enctype="multipart/form-data" method="post">
              	 <div class="form-group">
                 <label>Nomor Faktur</label>
                  	<div class="input-group">
                    <div class="input-group-addon">
                      	<i class="fa fa-id-card"></i>
                    </div>
                    <input id="disabledTextInput" name="nofaktur" class="form-control" placeholder="kode dibuat otomatis" value="<?php echo $nomorbaru ?>" readonly="readonly"/>
                 </div>
              	</div>
              	<div class="form-group">
                <label>Nama Outlet</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="namaoutlet" class="form-control">
                      <option selected value="">-Pilih Outlet-</option>
                        <?php
                        //include "../config/connection.php"; 
                            $queryoutlet = mysqli_query($connect,"SELECT * FROM tb_outlet");
                            while ($dataoutlet = mysqli_fetch_array($queryoutlet)){
                        ?>
                      <option value="<?php echo $dataoutlet['kode_outlet'] ?>"><?php echo $dataoutlet['nama_outlet'] ?>
                            <?php } ?>
                      </option>
                      
                    </select>
                  </div>
              </div>
              <div class="form-group">
                 <label>Tanggal Transaksi</label>
                  	<div class="input-group">
                    <div class="input-group-addon">
                      	<i class="fa fa-id-card"></i>
                    </div>
                    <input type="date" name="tgltransaksi" class="form-control"/>
                 </div>
              	</div>
              	<div class="form-group">
                <label>Keterangan</label>
                  	<div class="input-group">
                    <div class="input-group-addon">
                      	<i class="fa fa-id-card"></i>
                    </div>
                    <input type="text" name="keterangan" placeholder="Masukkan Keterangan " class="form-control" />
                  	</div>
              	</div>
              	<div class="form-group">
                <label>Nama Produk</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="namabahan" class="form-control">
                      <option selected value="">-Pilih Produk-</option>
                        <?php
                        //include "../config/connection.php"; 
                            $querybahan = mysqli_query($connect,"SELECT * FROM tb_bahan");
                            while ($databahan = mysqli_fetch_array($querybahan)){
                        ?>
                      <option value="<?php echo $databahan['id_bahan'] ?>"><?php echo $databahan['nama_bahan'] ?>
                            <?php } ?>
                      </option>
                      
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Berat Produk</label>
                  	<div class="input-group">
                    <div class="input-group-addon">
                      	<i class="fa fa-id-card"></i>
                    </div>
                    <input type="number" name="berat" id="berat" onkeyup="sum();" value="0" min="1" class="form-control" />
                  	</div>
              	</div>
              	<div class="form-group">
                <label>Satuan Produk</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select name="satuanbahan" class="form-control">
                      <option selected value="">-Pilih Satuan Produk-</option>
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
              <div class="form-group">
                <label>Harga</label>
                  	<div class="input-group">
                    <div class="input-group-addon">
                      	<i class="fa fa-id-card"></i>
                    </div>
                    <input type="text" name="harga" id="harga" onkeyup="sum();" placeholder="Masukkan Harga " class="form-control" />
                  	</div>
              	</div>
              	<script>
					function sum() {
      				var txtFirstNumberValue = document.getElementById('berat').value;
      				var txtSecondNumberValue = document.getElementById('harga').value;
      				var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      				if (!isNaN(result)) {
         			document.getElementById('jumlah').value = result;
      				}
					}
				</script>
              <div class="form-group">
                <label>Jumlah</label>
                  	<div class="input-group">
                    <div class="input-group-addon">
                      	<i class="fa fa-id-card"></i>
                    </div>
                    <input type="text" name="jumlah" id="jumlah" readonly="true" placeholder="Total Harga " class="form-control" />
                  	</div>
              	</div>
              	<div class="modal-footer">
                <button onclick="javascript:validate();" class="btn btn-success" type="submit">
                  Tambah
                </button>
                <button type="reset" class="btn btn-danger" onClick="window.location.href='trans_all_outlet.php';">
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
                    <h3 class="card-title">Data Transaksi All Outlet</h3>
                  </div>
                  <div class="card-body">
          <div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
              <thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>No Faktur</th>
                  <th>Nama Outlet</th>
                  <th>Tanggal Transaksi</th>
                  <th>Keterangan</th>
                  <th>Nama Produk</th>
                  <th>Berat</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th class="w-2">Aksi</th>
                </tr>
              </thead>
              <tbody>
              	<?php
                      $no = 1;
                      $data = mysqli_query($connect,"SELECT id_penjualan, no_faktur, nama_outlet, tgl_penjualan, keterangan, nama_bahan, berat, nama_satuan, harga, jumlah FROM tb_trans_penjualan JOIN tb_outlet ON tb_outlet.kode_outlet=tb_trans_penjualan.kode_outlet JOIN tb_bahan ON tb_bahan.id_bahan=tb_trans_penjualan.id_bahan JOIN tb_satuan_bahan ON tb_satuan_bahan.id_satuan=tb_trans_penjualan.id_satuan");
                      while($d = mysqli_fetch_array($data)){
                    ?>
               <tr>
                  <td><span class="text-muted"><?php echo $no; ?></span></td>
                  <td><?php echo $d['no_faktur']; ?></td>
                  <td><?php echo $d['nama_outlet']; ?></td>
                  <td><?php echo $d['tgl_penjualan']; ?></td>
                  <td><?php echo $d['keterangan']; ?></td>
                  <td><?php echo $d['nama_bahan']; ?></td>
                  <td><?php echo $d['berat']; ?></td>
                  <td><?php echo $d['nama_satuan']; ?></td>
                  <td><?php echo $d['harga']; ?></td>
                  <td><?php echo $d['jumlah']; ?></td>
                  <td class="text-left">
                    <a href="trans_all_edit.php?id=<?php echo $d['id_penjualan'];?>" class="btn btn-info btn-sm"><i class="fe fe-edit"></i>Ubah</a>
                    <a href="?&act=delete&id=<?php echo $d['id_penjualan']; ?>" onClick="return confirm('Yakin data akan dihapus ?')"
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
  	$nofaktur 			= $_POST['nofaktur'];
  	$namaoutlet 		= $_POST['namaoutlet'];
  	$tgltransaksi		= $_POST['tgltransaksi'];
  	$keterangan 		= $_POST['keterangan'];
	$namabahan			= $_POST['namabahan'];
	$beratbahan			= $_POST['berat'];
	$satuanbahan		= $_POST['satuanbahan'];
	$hargabahan			= $_POST['harga'];
	$jumlah 			= $_POST['jumlah'];

   $input=mysqli_query($connect,"INSERT INTO `tb_trans_penjualan`(`id_penjualan`, `no_faktur`, `kode_outlet`, `tgl_penjualan`, `keterangan`, `id_bahan`, `berat`, `id_satuan`, `harga`, `jumlah`) VALUES ('','$nofaktur','$namaoutlet','$tgltransaksi','$keterangan','namabahan','$beratbahan','$satuanbahan','$hargabahan','$jumlah')");
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
$hapus=mysqli_query($connect,"DELETE FROM tb_trans_penjualan WHERE id_penjualan='$id'");
if ($hapus) {
  echo $main_view;
} else {
  echo"<script>alert('Gagal hapus data');history.back(-1);</script>"; 
}
break;

}
?>