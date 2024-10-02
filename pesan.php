<?php 
  include "layout/header.php";
  ?>
  
    <div class="container mt-3"> 
      <h2>Form Pemesanan</h2>
      <form action="simpan.php" method="post" autocomplete="off">
        <div class="row">
          <div class="mb-3 col-12 col-lg-6">
            <label for="nama-lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control form-control-sm" id="nama-lengkap" name="nama-lengkap" placeholder="" required>
          </div>
          <div class="mb-3 col-12 col-lg-6">
            <label for="no-identitas" class="form-label">Nomor Identitas</label>
            <input type="text" class="form-control form-control-sm" id="no-identitas" name="no-identitas" maxlength="16" minlength="16" required>
          </div>
          <div class="mb-3 col-6 col-lg-6">
            <label for="jns-kelamin" class="form-label">Jenis Kelamin</label> <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="jns-kelamin" id="jns-kelamin" value="laki-laki">
            <label class="form-check-label" for="laki">laki-laki</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="jns-kelamin" id="jns-kelamin" value="perempuan">
              <label class="form-check-label" for="perempuan">Perempuan</label>
            </div>
          </div>
          
          <div class="mb-3 col-12 col-md-6">
            <label for="tipe-kamar" class="form-label">Tipe kamar</label>
            <select type="text" class="form-select" aria-label="Default select example" id="tipe-kamar" name="tipe-kamar" onchange="updateHargaKamar()" aria-label="Default select example">
              <option selected>-- none --</option>
              <option value="1">Standar</option>
              <option value="2">Deluxe</option>
              <option value="3">Executif</option>
            </select>
          </div>
        </div>
  
        <div class="row">
          <div class="mb-3 col-12 col-md-6">
            <label for="tanggal-pesan" class="form-label">Tanggal Pesan</label>
            <input type="date" class="form-control form-control-sm" id="tanggal-pesan" name="tanggal-pesan" placeholder="" required>
          </div>
          <div class="mb-3 col-12 col-md-6">
            <label for="durasi" class="form-label">Durasi Penginapan</label>
            <div class="input-group input-group-sm">
              <input type="number" class="form-control form-control-sm" id="durasi" name="durasi" placeholder="" aria-describedby="basic-addon2" onchange="updateDiskon(this)" required>
              <span class="input-group-text" id="basic-addon2">hari</span>
            </div>
          </div>
        </div>
  
        <div class="row">
          <div class="mb-3 col-12 col-lg-6">
            <label for="breakfast">Breakfast (Rp. 80.000)</label>
              <div class="d-lg-flex justify-content-between">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="Y" id="breakfast" name="breakfast" onclick="handleBreakFast(this)">
                  <label class="form-check-label" for="penginapan">Ya</label>
                </div>
              </div>
            </div>
            <div class="mb-3 col-12 col-md-2">
            <label for="diskon" class="form-label">Diskon</label>
            <div class="input-group input-group-sm">
              <input type="text" class="form-control form-control-sm" id="diskon" name="diskon">
              <span class="input-group-text" id="basic-addon2">%</span>
            </div>
          </div>
          </div>
  
          <div class="row">
          <div class="mb-3 col-12 col-md-4">
            <label for="harga-kamar" class="form-label">Harga Kamar</label>
            <div class="input-group input-group-sm">
              <span class="input-group-text" id="basic-addon2">Rp</span>
              <input type="text" class="form-control form-control-sm" id="harga-kamar" name="harga-kamar" placeholder="" aria-describedby="basic-addon2" required>
            </div>
          </div>
          <div class="mb-3 col-12 col-md-4">
            <label for="harga-breakfast" class="form-label">Harga Breakfast</label>
            <div class="input-group input-group-sm">
              <span class="input-group-text" id="basic-addon2">Rp</span>
              <input type="text" class="form-control form-control-sm" id="harga-breakfast" name="harga-breakfast" placeholder="" aria-describedby="basic-addon2" required>
            </div>
          </div>
          <div class="mb-3 col-12 col-md-4">
            <label for="total" class="form-label">Total Bayar</label>
            <div class="input-group input-group-sm">
              <span class="input-group-text" id="basic-addon2">Rp</span>
              <input type="text" class="form-control form-control-sm" id="total" name="total" placeholder="" aria-describedby="basic-addon2" >
            </div>
          </div>
          </div>
  
        <div class="text-center">
          <row>
            <input type="submit" class="btn btn-sm btn-primary" value="simpan">
            <button type="button" class="btn btn-sm btn-success" onclick="hitung()">Hitung</button>
            <button type="cencel" class="btn btn-sm btn-danger">Cancel</button>
          </row>
        </div>
      </form>
    </div>
  
    <script>
      breakfast = false;

      function updateHargaKamar() {
        nilai = Number(document.getElementById("tipe-kamar").value);
        hargaKamar = 0;
          if (nilai === 1) {
            hargaKamar = 500000;
          } else if (nilai === 2) {
            hargaKamar = 1000000;
          } else if (nilai === 3) {
            hargaKamar = 1200000;
          }
        document.getElementById("harga-kamar").value = hargaKamar;
      }

      function handleBreakFast(cb) {
        breakfast = cb.checked;
        durasi = Number(document.getElementById("durasi").value);
        hb = document.getElementById("harga-breakfast");
        hb.value = hitungBreakfast();
      }

      function hitungBreakfast() {
        
        if (breakfast) {
            hargaBreakfast = 80000 * durasi;
          }

          return hargaBreakfast;  
      }

      function updateDiskon() {
        diskon = 0;
        hasilDiskon = Number(document.getElementById("durasi").value);
        elemenDiskon =document.getElementById("diskon");

        if (hasilDiskon > 3) {
          diskon = 10;
        }

        elemenDiskon.value = diskon;
      }

      function hitung() {
        durasi = parseInt(document.getElementById("durasi").value);
        hargaKamar = parseInt(document.getElementById("harga-kamar").value);
        hargaBreakfast = Number(document.getElementById("harga-breakfast").value);
        totalBayar = hargaKamar * durasi;
          
        if (durasi > 3) {
          totalBayar = discount(totalBayar);
        } 

        totalBayar = totalBayar + hargaBreakfast; 
        document.getElementById("total").value = totalBayar;

      }
      
      function discount(totalBayar) {
        var potongan = totalBayar * 0.1;
        return totalBayar - potongan;
      }
</script>
