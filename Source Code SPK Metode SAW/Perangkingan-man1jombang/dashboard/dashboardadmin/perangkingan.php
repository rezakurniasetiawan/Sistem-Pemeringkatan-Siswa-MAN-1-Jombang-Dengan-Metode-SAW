<?php
session_start();

include('../../koneksi.php');
if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}
if ($_SESSION['hakakses'] != "admin") {
    die("<b>Oops!</b> Access Failed.
		<button type='button' onclick=location.href='./'>Back</button>");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../../assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="../../assets/vendors/fontawesome/all.min.css">

    <link rel="stylesheet" href="../../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/app.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="dashboard.php">Mansajoe</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="dashboard.php" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="vuser.php" class='sidebar-link'>
                            <i class="iconly-boldProfile"></i>
                                <span>User</span>
                            </a>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Input Data</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="idatasiswa.php">Data Siswa</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="idatanilai.php">Data Nilai</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="idatabobot.php">Data Bobot</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>View Data</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="vdatasiswa.php">Data Siswa</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="vdatanilai.php">Data Nilai</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="vdatabobot.php">Data Bobot</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item active ">
                            <a href="matrikskeputusan.php" class='sidebar-link'>
                            <i class="iconly-boldProfile"></i>
                                <span>Analisis</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../../proses/ceklogout.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Logout</span>
                            </a>
                        </li>




                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li><a class="dropdown-item">No notification available</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                        <?php
                                            $tampilPeg    = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE nama='$_SESSION[nama]'");
                                            $peg    = mysqli_fetch_array($tampilPeg);
                                        ?>
                                            <h6 class="mb-0 text-gray-600"><a><?= $peg['nama'] ?></a></h6>
                                            <p class="mb-0 text-sm text-gray-600">Admin</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="../../assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Reza</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
        <div id="main">
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <ul class="nav nav-tabs nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link" href="matrikskeputusan.php">Matriks Keputusan</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="nilaibobot.php">Nilai Bobot</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="normalisasi.php">Normalisasi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="perangkingan.php">Perangkingan</a>
                                        </li>
                                        </ul>
                                        <?php
                                        $sql="SELECT MAX(UAS), MAX(UTS), MAX(nilairapot), MAX(nilaitesmasuk)FROM tb_nilai";
                                        $result=mysqli_query($koneksi,$sql); //row melihat dari sql 
                                        while($row=mysqli_fetch_array($result)){
                                            $MaxUAS           =$row[0];
                                            $MaxUTS           =$row[1];
                                            $MaxNilairapot    =$row[2];
                                            $MaxNilaitesmasuk =$row[3]; 
                                        }
                                        ?>
                                        <br>
                                        <div class="panel panel-info">
                                        <div class="panel-body">
                                            <table width="100%" class="table table-sm table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                <th>NIS</th>
                                                <th>UAS</th>
                                                <th>UTS</th>
                                                <th>Nilai Rapot</th>
                                                <th>Nilai Tes Masuk</th>
                                                <th>Total Nilai</th>
                                                <th>Rangking</th>
                                                </tr>
                                            </thead>
                                            <?php
                                        
                                        $sql="SELECT NIS, UAS, UTS, nilairapot, nilaitesmasuk, 
                                                    B_UAS, B_UTS, B_nilairapot, B_tesmasuk 
                                                    FROM tb_nilai, tb_bobot ORDER BY UAS DESC, UTS DESC, nilairapot DESC, nilaitesmasuk DESC";
                                        $result=mysqli_query($koneksi,$sql) or die(mysql_error()); //row melihat dari sql 
                                        $rangking =0;
                                        while($row = mysqli_fetch_array($result)){
                                            $rangking++;
                                            $NIS          =$row[0];
                                            $cUAS         =$row[5]*($row[1]/$MaxUAS);  
                                            $cUTS         =$row[6]*($row[2]/$MaxUTS);
                                            $cRapot       =$row[7]*($row[3]/$MaxNilairapot);
                                            $cTes         =$row[8]*($row[4]/$MaxNilaitesmasuk);
                                            $total        =$cUAS + $cUTS + $cRapot + $cTes; 
                                        echo "      
                                                    <tr>  
                                                    <td>".$NIS."</td> 
                                                    <td>".$cUAS."</td>
                                                    <td>".$cUTS."</td>
                                                    <td>".$cRapot."</td>
                                                    <td>".$cTes."</td>
                                                    <td>".$total."</td>
                                                    <td>".$rangking."</td>
                                                    </tr>   
                                            ";        
                                        
                                            }
                                        ?>
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Rezadev</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="../../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../../assets/js/pages/dashboard.js"></script>

    <script src="../../assets/js/main.js"></script>
</body>

</html>