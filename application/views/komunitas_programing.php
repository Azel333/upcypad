
<div class="col-lg-8 offset-lg-2 col-sm-12">

<form action="<?= base_url('pendaftaran'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">





     <a href="<?= base_url('pendaftaran/list_data') ?>" class="btn btn-outline-primary col-6" style="position: absolute; top: -20px;">LIHAT YANG SUDAH TERDAFTAR</a>



<div class="" style="top: 50px; position: relative;">
      <div class="card">
          <div class="card-header bg-success">
              <h4 class="card-title text-white">Informasi Data Pribadi</h4>
          </div>
          <div class="card-body col-lg-8 offset-lg-2 col-sm-12" style="margin-top: 50px;position: relative;margin-bottom:50px;">



              <div class="form-group form-file-upload form-file-multiple">
                <input type="file" multiple="" class="inputFileHidden">
                <div class="input-group">
                    <input type="text" class="form-control inputFileVisible" placeholder="Nama Lengkap" name="nama" required="">
                </div>
              </div>

              <div class="form-group form-file-upload form-file-multiple">
                <input type="file" multiple="" class="inputFileHidden">
                <div class="input-group">
                    <input type="text" class="form-control inputFileVisible" placeholder="Nomor Handphone/Nomor WA" multiple name="no_hp" required="">
                </div>
              </div>

              <div class="form-group form-file-upload form-file-multiple">
                <input type="file" multiple="" class="inputFileHidden">
                <div class="input-group">
                    <input type="text" class="form-control inputFileVisible" placeholder="Email" multiple name="email" required="">
                </div>
              </div>

              <div class="form-group form-file-upload form-file-multiple">
                <input type="file" multiple="" class="inputFileHidden">
                <div class="input-group">
                    <input type="text" class="form-control" id="inputAddress" placeholder="Jurusan" name="jurusan" required="">
                </div>
              </div>

              <div class="form-group form-file-upload form-file-multiple">
                <input type="file" multiple="" class="inputFileHidden">
                <div class="input-group">
                    <input type="text" class="form-control" id="inputAddress" placeholder="Semester" name="semester" required="">
                </div>
              </div>

              <div class="form-group form-file-upload form-file-multiple">
                <input type="file" multiple="" class="inputFileHidden">
                <div class="input-group">
                    <input type="text" class="form-control" id="inputAddress" placeholder="Alamat" name="alamat" required="">
                </div>
              </div>

              <div class="form-group form-file-upload form-file-multiple">
                <input type="file" multiple="" class="inputFileHidden">
                <div class="input-group">
                    <select id="inputState" class="form-control" name="kota" required="">
                      <option selected>Pilih Provinsi Kota</option>
                      <option value="jakarta timur">Jakarta Timur</option>
                      <option value="jakarta Utara">Jakarta Utara</option>
                      <option value="jakarta Selatan">Jakarta Selatan</option>
                      <option value="jakarta Barat">Jakarta Barat</option>
                      <option value="jakarta Pusat">Jakarta Pusat</option>
                      <option value="Bekasi">Bekasi</option>
                    </select>
                </div>
              </div>

              <div class="form-group">
                <div class="form-check">
                  <select class="form-control" name="kelamin" required="">
                    <option>Pilih Jenis Kelamin</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
                </div>
              </div>



          </div>
      </div>
  </div>



<div class="mb-5" style="top: 120px; position: relative;">
      <div class="card">
          <div class="card-header bg-success">
              <h4 class="card-title text-white">Informasi Tambahan</h4>
          </div>
          <div class="card-body col-lg-8 offset-lg-2 col-sm-12" style="margin-top: 50px;position: relative;margin-bottom:50px;">



              <div class="form-group form-file-upload form-file-multiple">
                <input type="file" multiple="" class="inputFileHidden">
                <div class="input-group">
                    <input type="text" class="form-control inputFileVisible" placeholder="Tujuan Masuk Komunitas" name="tujuan">
                </div>
              </div>

              <div class="form-group tect">
                <div class="form-check">
                  <div>Bagian yang ingin di kuasai</div>
                  <br>
                  <label class="form-check-label">
                      <input type="radio" value="front end" name="bagian">
                      Front End <button type="button" class="btn btn-info" data-toggle="modal" data-target=".front">Apa itu Fornt End?</button>
                  </label>
                  <label class="form-check-label">
                      <input type="radio" value="back end" name="bagian">
                      Back End <button type="button" class="btn btn-info" data-toggle="modal" data-target=".back">Apa itu Back End?</button>
                  </label>
                  <hr>
                </div>
              </div>

              <div class="form-group tect">
                <div class="form-check">
                  <div>Pemprograman yang di minati</div>
                  <br>
                  <div class="form-check-label">
                      <input type="radio" value="web" name="minat">
                      Web Programing
                  </div>
                  <div class="form-check-label">
                      <input type="radio" value="android" name="minat">
                      Androin
                  </div>
                  <div class="form-check-label">
                      <input type="radio" value="game" name="minat">
                      Game Programing
                  </div>
                  <div class="form-check-label">
                      <input type="radio" value="robotik" name="minat">
                      Robotik
                  </div>
                  <hr>
                </div>
              </div>

              <div class="form-group form-file-upload form-file-multiple">
                <input type="file" multiple="" class="inputFileHidden">
                <div class="input-group">
                    <textarea class="form-control inputFileVisible" placeholder="Bahasa Pemprograman yang pernah di pelajari" rows="6" name="bahasa_program" required=""></textarea>
                </div>
              </div>

              <div class="form-group form-file-upload form-file-multiple">
                <input type="file" multiple="" class="inputFileHidden">
                <div class="input-group">
                    <textarea class="form-control inputFileVisible" placeholder="Saran untuk suasana dan agenda waktu/hari serta jam kumpul bareng" rows="6" name="harapan" required=""></textarea>
                </div>
              </div>

              <div class="form-group form-file-upload form-file-multiple">
                <input type="file" multiple="" class="inputFileHidden">
                <div class="input-group">
                    <textarea class="form-control inputFileVisible" placeholder="Saran dan Masukan untuk sistem di komunitas" rows="6" name="saran" required=""></textarea>
                </div>
              </div>

              <div class="form-group form-file-upload form-file-multiple">
                <input type="file" multiple="" class="inputFileHidden">
                <div class="input-group">
                    <textarea class="form-control inputFileVisible" placeholder="Saran tentang pengadaan kas dan nominal" rows="6" name="kas" required=""></textarea>
                </div>
              </div>




          </div>
      </div>
  </div>










        <div class="form-check-label" style="top: 120px; position: relative;">
            <input type="checkbox" value="" required="">
            I agree to the terms and conditions.
            <div>
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
</form>

</div>
















<!-- front end -->

<div class="modal fade front" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">



<div class="col-md-6">
    <div class="card">
        <div class="card-header card-header-danger">
            <h4 class="card-title">Front End</h4>
        </div>
        <div class="card-body">
            <p class="category">Pemprograman yang lebih memfokuskan pada pembuatan desain antar muka/tampilan seperti pengusaan html, css, bootstrap, photoshop dan adobe ilustrator untuk pembuatan gambar di aplikasi</p>
        </div>
    </div>
  </div>
</div>




    </div>
  </div>
</div>

<!-- backend -->

<div class="modal fade back" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">



  <div class="col-md-6">
    <div class="card">
        <div class="card-header card-header-danger">
            <h4 class="card-title">Back End</h4>
        </div>
        <div class="card-body">
            <p class="category">Pemprograman yang lebih memfokuskan pada pengelolaan sumber daya di belakang layar seperti menangani database dan bugs/program error dalam suatu program</p>
        </div>
    </div>
  </div>
</div>



    </div>
  </div>
</div>