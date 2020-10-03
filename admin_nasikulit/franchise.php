<?php include_once "views/main.php";?>
<?php include_once "config/connection.php";?>
<?php 
//$main_view= "<script>window.location.href='data_bahan.php';</script>";
//switch (@$_GET["act"]){
//default:
//INDEX======================================================================================================
?>
<div class="my-3 my-md-1">
  <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="../index.php">Beranda</a>
            </li>
            <li class="breadcrumb-item active">Data Franchise</li>
          </ol>
          <div class="col-lg-12">
           <form class="card">
            <div class="card-header">
               <h3 class="card-title">Data Franchise</h3>
            </div>
            <div class="card-body">
          	<div class="table-responsive">
            <table class="table card-table table-vcenter text-nowrap datatable">
            	<thead>
                <tr>
                  <th class="w-2">No.</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th>No Whatsapp</th>
                  <th>Pesan</th>
                </tr>
              </thead>