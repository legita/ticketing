<?php
  error_reporting()
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <title>Print Rekap Laporan Ticketing Troubleshooting di PT. Sebastian Jaya Metal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="layout.css">
  <script src="../assets/bootstrap/jquery-3.2.1.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</head>

<body onload="window.print()">

<div class="panel panel-default">
  <div class="panel-body">
    <div class="row-table-bordered">
          <div>
            <div class="col-md-4">
                <img src="../images/logos/logo.png" class="img-responsive pull-left" style="max-height:100%;display:inline">
            </div>
            <div class="col-md-6">
                <font size="6"><b><p class="text-center">PT. Sebastian Jaya Metal</p></b></font>
                <font size="3"><b><p class="text-center">Kawasan Industri Jababeka I Jl. Jababeka X, Blok F No.5 Desa Harjamekar - Cikarang Utara, Bekasi</p></b></font>
                <b><p class="text-center">Phone : 021 89843515 / 0856 7115 593</p></b>
            </div>
          </div>
      <br>
     <style type="text/css">
        hr.style2 {
        border-top: 3px double #8c8b8b;
        }
    </style>
  
  <hr class="style2">

  <?php

  include '../config/koneksi.php';
  $bln = $_GET['bln'];
  $thn = $_GET['thn'];

  $query = "SELECT * FROM tbl_laporan where month(tgl_laporan) = '$bln' and year(tgl_laporan) = '$thn'";

  $tampil = mysqli_query($konek, $query) or die (mysqli_error($konek));

  $no =1;

  ?>

  <hr>
  <form action="switch_angka.php" method="GET">
  <h2 style="font-family: Kristen ITC;"><center>Rekap Laporan troubleshooting Bulan <?php  
  switch ($bln) {
                  case 0:
                      echo "";
                      break;
                  case 1:
                      echo "Januari";
                      break;
                  case 2:
                      echo "Februari";
                      break;
                  case 3:
                      echo "Maret";
                      break;
                  case 4:
                      echo "April";
                      break;
                  case 5:
                      echo "Mei";
                      break;
                  case 6:
                      echo "Juni";
                      break;
                  case 7:
                      echo "Juli";
                      break;
                  case 8:
                      echo "Agustus";
                      break;
                  case 9:
                      echo "September";
                      break;
                  case 10:
                      echo "Oktober";
                      break;
                  case 11:
                      echo "November";
                      break;
                  case 12:
                      echo "Desember";
                      break;
              }
  ?>&nbsp;<?php echo $thn ; ?></center></h2><br>
  <body>

      <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="myTable">
          <tr>
            <th class="bg-info"><center>No</center></th>
            <th class="bg-info"><center>Tanggal Laporan</center></th>
            <th class="bg-info"><center>Tanggal Dikerjakan</center></th>
            <th class="bg-info"><center>Tanggal Selesai</center></th>
            <th class="bg-info"><center>No Ticketing</center></th>
            <th class="bg-info"><center>Username</center></th>
            <th class="bg-info"><center>id_perangkat</center></th>
            <th class="bg-info"><center>jenis_perangkat</center></th>
            <th class="bg-info"><center>Penganggung Jawab</center></th>
            <th class="bg-info"><center>Lokasi Perangkat</center></th>
            <th class="bg-info"><center>Laporan Masalah</center></th>
            <th class="bg-info"><center>Catatan</center></th>
            <th class="bg-info"><center>Status Laporan</center></th>
            <th class="bg-info"><center>Status</center></th>
          </tr>
           
          <?php

          while($row = mysqli_fetch_array($tampil)) { ?>

            <tr>
                <td><center><?php echo $no++; ?></center></td>
                <td><center><?php echo $row['tgl_laporan']; ?></center></td>
                <td><center><?php echo $row['tgl_kerjakan']; ?></center></td>
                <td><center><?php echo $row['tgl_selesai']; ?></center></td>
                <td><center><?php echo $row['no_lap']; ?></center></td>   
                <td><center><?php echo $row['username']; ?></center></td>   
                <td><center><?php echo $row['id_perangkat']; ?></center></td>   
                <td><center><?php echo $row['jenis_perangkat']; ?></center></td>   
                <td><center><?php echo $row['user']; ?></center></td>   
                <td><center><?php echo $row['lokasi_perangkat']; ?></center></td>   
                <td><center><?php echo $row['laporan']; ?></center></td>      
                <td><center><?php echo $row['alasan']; ?></center></td>
                 <td>
                   <?php
                     if ($row['ting_laporan']=='1'){
                       echo '<font color="red"><b>Darurat</b></font>';
                     }
                     else {
                      echo '<font color="green"><b>Tidak Darurat</b></font>';
                     }
                   ?>
                </td>
                 
                 <td><center>
                   <?php 
                   if ($row['status']=='2'){ ?>
                     Selesai
                      <?php }
                       ?>
                 </center>
                 </td>
            </tr>

        <?php }

        ?>

        </table>

        
        <?php
        echo "<h4>Total Laporan Ticketing Troubleshooting Bulan  ";

          switch ($bln) {
                          case 0:
                              echo "";
                              break;
                          case 1:
                              echo "Januari";
                              break;
                          case 2:
                              echo "Februari";
                              break;
                          case 3:
                              echo "Maret";
                              break;
                          case 4:
                              echo "April";
                              break;
                          case 5:
                              echo "Mei";
                              break;
                          case 6:
                              echo "Juni";
                              break;
                          case 7:
                              echo "Juli";
                              break;
                          case 8:
                              echo "Agustus";
                              break;
                          case 9:
                              echo "September";
                              break;
                          case 10:
                              echo "Oktober";
                              break;
                          case 11:
                              echo "November";
                              break;
                          case 12:
                              echo "Desember";
                              break;
                      }
              echo $thn ;
              echo "</h4>";
              echo "<hr>";

        ?>

        </form>
        <div style="text-align-last: right">
          <label>
            <?php
            $tgl=date("l, d-M-Y");
            echo $tgl;
            ?>
          </label><br><br>
          <label>By : Staff IT</label>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>