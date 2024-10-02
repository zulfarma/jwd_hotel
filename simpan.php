<?php include "koneksi.php";

  $nama = $_POST['nama-lengkap'];
  $no_identitas = $_POST['no-identitas'];
  $jenis_kelamin = isset($_POST['jns-kelamin']) ? 'Laki-laki' : 'Perempuan';
  $tipe_kamar = $_POST['tipe-kamar'];
  $harga = $_POST['harga-kamar'];
  $tgl_pesan = $_POST['tanggal-pesan'];
  $durasi = $_POST['durasi'];
  $breakfast = $_POST['breakfast'];
  $diskon = $_POST['diskon'];
  $total = $_POST['total'];

  $query = "INSERT INTO pesanan (nama, jenis_kelamin, no_identitas, tipe_kamar, harga, tgl_pesan, durasi, breakfast, diskon, total) 
            VALUES ('$nama', '$jenis_kelamin', '$no_identitas', '$tipe_kamar', '$harga', '$tgl_pesan', '$durasi', '$breakfast', '$diskon', '$total')";

  $sukses = mysqli_query($koneksi, $query);

  $query_select = "SELECT * FROM pesanan WHERE nama='$nama' AND no_identitas='$no_identitas' AND tgl_pesan='$tgl_pesan'";
  $result = mysqli_query($koneksi, $query_select);
  $data = mysqli_fetch_assoc($result);
?>

<?php include "layout/header.php" ?>

  <div class="container mt-3"> 
    <div class="col-12 col-md-12">
      <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Selamat!</strong> Pesanan anda berhasil disimpan.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div> -->

      <div class="card">
        <div class="card-header text-center">BUKTI PEMESANAN PAKET WISATA</div>
        <div class="card-body">
          <table class="table">
            <tr>
              <td>Nama</td>
              <td><?php echo $data['nama'] ?></td>
            </tr>
            <tr>
              <td>No Identitas</td>
              <td><?php echo $data['no_identitas'] ?></td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td><?php echo $data['jenis_kelamin'] ?></td>
            </tr>
            <tr>
              <td>Tipe Kamar</td>
              <td>
              <?php
                if($tipe_kamar == '1') {
                  echo 'Standar';
                }
                if($tipe_kamar == '2') {
                  echo 'Deluxe';
                }
                if($tipe_kamar == '3') {
                  echo 'Executif';
                }
              ?>
              </td>
            </tr>
            <tr>
              <td>Durasi Penginapan</td>
              <td><?php echo $data['durasi'] ?> Hari</td>
            </tr>
            <tr>
              <td>Diskon</td>
              <td><?php echo $data['diskon'] ?> %</td>
            </tr>
            </tr>
              <td>Jumlah Bayar</td>
              <td>Rp. <?php echo $total ?></td>
            </tr>
          </table>
        </div>
      </div>

      <div class="card text-center">
        <h6>Pesan Lagi?</h6>
        <row>
          <a href="pesan.php" class="btn btn-primary">Ya</a>
          <a href="index.php" class="btn btn-danger">Tidak</a>
        </row>
      </div>
    </div>    
  </div>
