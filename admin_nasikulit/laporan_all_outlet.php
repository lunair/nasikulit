<?php include_once "views/main.php";?>
<?php include_once "config/connection.php";?>
<div class="my-md-1">
          <div class="container">
      <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Laporan Transaksi Outlet</li>
          </ol>
          <div class="">
        <div class="card">
        <div class="card-header">
      <h3 class="card-title">Filter Transaksi Outlet</h3>
    </div>
    <div class="card-body">
      <form method="GET">
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group" >
              <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-user-o"></i>
              </div>

              <select class="form-control" name="namaoutlet" id="form-outlet">
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
           </div>
       <div class="col-lg-6">
          <div class="form-group" >
              <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-user-o"></i>
              </div>
              <input type="date" name="tanggal" class="form-control" id="form-tanggal">
               
              </div>
            </div>
           </div>
           <div class="form-group row text-left">
                  <div class="col-lg-12">
                     <button class="btn btn-xs btn-primary" name="cari"/><i class="fa fa-search"></i> Tampilkan </button>
                     <button class="btn btn-xs btn-light" name="reset"/><a href="lap_pendaftar.php"><i class="fa fa-delete"></i> Reset Filter </a></button>
                    
                  </div>
            </div>
      </form>
    </div>
  </div>