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
            <li class="breadcrumb-item">
              <a href="data_bahan.php">Data Bahan</a>
            </li>
            <li class="breadcrumb-item active">Edit Data Bahan</li>
          </ol>
          <div class="my-3 my-md-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Edit Data Bahan</h3>
                  </div>
                  <div class="card-body">
                  <?php

                    $id = $_GET['id'] ?: '0';
                    $sql=mysqli_query($connect,"SELECT id_bahan, nama_bahan, berat_bahan, harga_bahan, nama_satuan FROM tb_bahan JOIN tb_satuan_bahan ON tb_satuan_bahan.id_satuan=tb_bahan.id_satuan where id_bahan='$id'");
                    $h=mysqli_fetch_array($sql);
                ?>
                  <form action="?&act=update" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                  	<label>Nama Bahan</label>
                    <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-id-card"></i>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <input type="name" name="namabahan" class="form-control" value="<?php echo $h['nama_bahan']?>" />
                    </div>
                </div>
              <div class="form-group">
                <label>Berat Bahan</label>
                  	<div class="input-group">
                    <div class="input-group-addon">
                      	<i class="fa fa-id-card"></i>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <input type="number" name="berat" value="<?php echo $h['berat_bahan'];?>" class="form-control" value="0" min="1" />
                  	</div>
              	</div>
              	<div class="form-group">
                <label>Satuan Bahan Bahan</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-user-o"></i>
                    </div>
                    <select class="form-control" id="exampleFormControlSelect1" name="satuanbahan">
                      <option selected value="">-Pilih Satuan Bahan-</option>
                      <?php
                        $querysatuan = mysqli_query($connect,"SELECT id_bahan, nama_bahan, berat_bahan, harga_bahan, nama_satuan FROM tb_bahan JOIN tb_satuan_bahan ON tb_satuan_bahan.id_satuan=tb_bahan.id_satuan ORDER BY id_bahan");
                        while ($datasatuan = mysqli_fetch_array($querysatuan)){
                            if($datasatuan['id_bahan']==$h['id_bahan']){
                                echo "<option selected value=$datasatuan[id_bahan]>$datasatuan[nama_satuan]</option>";
                            }else{
                                echo "<option value=$datasatuan[id_bahan]>$datasatuan[nama_satuan]</option>"; 
                            }
                        }
                    ?>    
                      </option>
                    </select>
                  </div>
              </div>
              <div class="form-group">
                <label>Harga Bahan</label>
                  	<div class="input-group">
                    <div class="input-group-addon">
                      	<i class="fa fa-id-card"></i>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                    <input type="name" name="harga" value="<?php echo $h['harga_bahan'];?>" class="form-control" />
                  	</div>
              	</div>
            
              	<div class="modal-footer">
                <button class="btn btn-success" type="submit">
                  Ubah
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
                    <a href='?&act=delete&id=<?php echo $d['id_bahan'];?>' onClick="return confirm('Yakin data akan dihapus ?')"
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

case "update";
$namabahan = $_POST['namabahan'];
$beratbahan = $_POST['berat'];
$satuanbahan = $_POST['satuanbahan'];
$hargabahan = $_POST['harga'];

//var_dump($paket_kesetaraan);
$id = $_POST['id'];

    $update=mysqli_query($connect,"UPDATE `tb_bahan` SET `nama_bahan`='$namabahan',`berat_bahan`='$beratbahan',`harga_bahan`='$hargabahan',`id_satuan`='$satuanbahan' WHERE id_bahan='$id'"); 
   //var_dump($input); exit();
      if ($update){
       // echo "update";
      echo $main_view;
      }
      else {
        //echo "gagal";
      echo"<script>alert('Proses Gagal');history.back(-1);</script>";  
      }
  //}
//}
break;
}
?>
