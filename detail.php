<?php 
include_once 'function.php';
include_once 'cek.php';

// dapetin id barang yang dipassing dihalaman sebelumnya
$idbarang = $_GET['id']; // get id barang

//get informasi barang berdasarkan db
$get = mysqli_query($conn, "select * from stock where idbarang='$idbarang'");
$fetch = mysqli_fetch_assoc($get);

//set variable
$namabarang = $fetch['namabarang'];
$image = $fetch['image'];
$deskripsi = $fetch['deskripsi'];
$stock = $fetch['stock'];

//cek ada gambar atau tidak
$gambar = $fetch['image'];
if($gambar==null){
    //jika tidak ada gambar
    $img = 'No Photo';
} else {
    $img = '<img src="images/'.$gambar.'" class="zoomable">';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Detail Products</title>
        <link rel="icon" href="images/logo.ico" type="image/x-icon" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <style>
            .zoomable{
                width: 200px;
            }
            .zoomable:hover{
                transform: scale(1.5);
                transition: 0.5s ease;
            }
            .logo-img {
                width: 50px; /* Atur lebar gambar sesuai kebutuhan Anda */
                height: 50px; /* Atur tinggi gambar sesuai kebutuhan Anda */
                margin-left: 0.5rem;
            }
    
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <img src="images/logo.png" alt="Logo" class="logo-img">
            <a class="navbar-brand" href="index.php">M-One Chemical</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
           
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"></i></div>
                                Stock Products
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"></i></div>
                                Product Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"></i></div>
                                Product Keluar
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"></i></div>
                                Kelola Admin
                            </a>
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        
                        <main style="margin-top: 50px;">
                            <div class="card mb-4 mt-4">
                            <div class="container-fluid">
                                <h1 class="mt-4">Detail Products</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Detail Products</li>
        </ol>

    </div>
</main>

                            <div class="card-header mb-4 mt-4">
                                <h2><?=$namabarang;?></h2>
                                <?=$img;?>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-3">Deskripsi</div>
                                    <div class="col-md-9">: <?=$deskripsi;?></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Stock</div>
                                    <div class="col-md-9">: <?=$stock;?></div>
                                </div>
                            </div>
                            
                            <br><br><hr>
                            <h3>Product Masuk</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="barangmasuk" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            </div>
                                            
                                                <?php
                                                            $ambildatamasuk = mysqli_query($conn, "select * from masuk where idbarang='$idbarang'");
                                                            $i = 1;
                                                            while($fetch=mysqli_fetch_array($ambildatamasuk)){
                                                                $tanggal = $fetch['tanggal'];
                                                                $keterangan = $fetch['keterangan'];
                                                                $qty = $fetch['qty'];

                                                    
                                                ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$tanggal;?></td>
                                                <td><?=$keterangan;?></td>
                                                <td><?=$qty;?></td>
                                            </tr>

                                            <?php
                                            };
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                
                                <br><br><hr>
                                <h3>Product Keluar</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="barangkeluar" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal</th>
                                                <th>Penerima</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                </div>
                                                
                                                    <?php
                                                                $ambildatakeluar = mysqli_query($conn, "select * from keluar where idbarang='$idbarang'");
                                                                $i = 1;
                                                                while($fetch=mysqli_fetch_array($ambildatakeluar)){
                                                                    $tanggal = $fetch['tanggal'];
                                                                    $penerima = $fetch['penerima'];
                                                                    $qty = $fetch['qty'];
    
                                                        
                                                    ?>
                                                <tr>
                                                    <td><?=$i++;?></td>
                                                    <td><?=$tanggal;?></td>
                                                    <td><?=$penerima;?></td>
                                                    <td><?=$qty;?></td>
                                                </tr>
    
                                                <?php
                                                };
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
     <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Product</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="text" name="namabarang" placeholder="Nama Product" class="form-control" required>
          <br>
          <input type="text" name="deskripsi" placeholder="Deskripsi Product" class="form-control" required>
          <br>
          <input type="number" name="stock" placeholder="Stock" class="form-control" required>
          <br>
          <input type="file" name="file" class="form-control">
          <br>
          <br>
          <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</html>
