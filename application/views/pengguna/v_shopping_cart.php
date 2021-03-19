<link href="<?= base_url('assets/'); ?>style_css/pengguna/shopping_cart.css" rel="stylesheet">
<form action="<?= base_url('cart/shopping_cart'); ?>" method="post" class="form-horizontal">

    <div class="card text-center">
     <div class="card-header">
        Konfirmasi Pembayaran
      </div>
      <div class="form-group col-6">
          <label for="inputEmail4">Kode Invoice</label>
          <input type="text" class="form-control col-4 text-center" name="invoice" id="inputEmail4" placeholder="" value="INV<?php echo rand(1, 10000000000000); ?>" readonly>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-8">


                <div class="text-center col-6" id="array">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Warna</th>
                                <th>Ukuran</th>
                            </tr>

                        
                        </thead>



                        <tbody>
                            

                              



                                

<?php

                  $contain= $this->cart->contents();
                  $prod = $this->db->get('produk')->result_array();
                  foreach ($contain as $key) {
                    $id = $key['id'];
                    $a = 0;
                    foreach ($prod as $pd) {
                      $a++;
                      $aw = explode("-", $pd['array_warna']);
                      $au = explode("-", $pd['array_ukuran']);

                      $i=$pd['id_produk'];
                        if ($i == $id) {
                          $jml = count($aw);
                          $ju = count($au);

                              if ($jml > 1 || $ju > 1) {
                                echo '
                                <tr>
                                  <td>
                                          <input type="text" name="id_produk['.$a.']" id="id_produk" value="'.$id.'" class="id_produk form-control" hidden="">
                                          <select id="inputState" name ="warna_produk['.$a.']" class="form-control">
                                            <option selected>Pilih</option>';

                                foreach ($aw as $aw2) {
                                  echo '                                  
                                            <option value="'.$aw2.'">'.$aw2.'</option>';
                                            }
                                  echo '
                                          </select>
                                  </td>';
                                  echo '
                                  <td>
                                          <select id="inputState" name ="ukuran_produk['.$a.']" class="form-control">
                                            <option selected>Pilih</option>
                                  ';
                                  foreach ($au as $au2) {
                                    echo '
                                            <option value="'.$au2.'">'.$au2.'</option>
                                  ';
                                  }
                                  
                                  echo '
                                          </select>
                                  </td>
                                  </tr> ';
                                  
                              }else{
                                echo '
                                <tr>
                                <td>
                                        <input type="text" name="id_produk['.$a.']" id="id_produk" value="'.$id.'" class="id_produk form-control" hidden="">
                                        <select id="inputState" name ="warna_produk['.$a.']" class="form-control">
                                          <option selected>Pilih</option>
                                          <option value="'.$aw[0].'">'.$aw[0].'</option>
                                        </select>
                                </td>';
                                echo '
                                <td>
                                        <select id="inputState" name ="ukuran_produk['.$a.']" class="form-control">
                                          <option selected>Pilih</option>
                                          <option value="'.$pd['array_ukuran'].'">'.$pd['array_ukuran'].'</option>
                                        </select>
                                </td>
                                </tr> ';
                              }
                              

                        }else{}
                    }
                  }

                  
?>



                                                    
                    </table>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th>Batalkan</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody id="detail_cart">

                    </tbody>
                     
                </table>
            </div>
        </div>
      </div>
    <div class="card-footer text-muted"> 
    </div>
</div>


<div class="card text-center mt-3">
    <div class="card-header">
        Data Pengiriman
    </div>
   <div class="card col-8 offset-2">
           
      <div class="form-row">
        <div class="form-group col-6">
          <label for="inputEmail4">Nama Depan</label>
          <input type="text" name="nama_depan" class="form-control" id="inputEmail4" placeholder="">
        </div>
        <div class="form-group col-6">
          <label for="inputPassword4">Nama Belakang</label>
          <input type="text" name="nama_belakang" class="form-control" id="inputPassword4" placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label for="inputAddress">Alamat</label>
        <input type="text" name="alamat" class="form-control" id="inputAddress" placeholder="">
      </div>
      <div class="form-row">
        <div class="form-group col-6">
          <label for="inputCity">Kota</label>
          <input type="text" name="kota" class="form-control" id="inputCity">
        </div>
        <div class="form-group col-2">
          <label for="inputZip">Kode POS</label>
          <input type="text" name="kode_pos" class="form-control" id="inputZip">
        </div>
      </div>
      <div class="form-group col-4">
        <label for="inputAddress2">No Handphone</label>
        <input type="text" name="no_hp" class="form-control" id="inputAddress2" placeholder="" name="no_hp">
      </div>
      <div class="form-group col-4">
          <label for="inputState">Jasa Pengiriman</label>
          <select id="inputState" name ="kurir" class="form-control">
            <option selected>Pilih Kurir</option>
            <option value="jne">JNE</option>
            <option value="sicepat">SICEPAT</option>
            <option value="tiki">TIKI</option>
          </select>
      </div>
 
    </div>
</div>



    <div class="card text-center mt-3">
    
            <div class="card-footer text-muted">
                <button id="payment-button" type="submit" value="upload" class="btn btn-outline-success">Submit</button>
            </div>
    </div>
</form>

<!-- Modal -->
<?php foreach ($produk as $pd) : ?>

              <?php $nama_gambar = explode("//-//", $pd['array_gambar']); ?>

<div class="modal fade" id="exampleModalCenter<?= $pd['id_produk']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <i><h5 class="modal-title" id="exampleModalLongTitle"><?= $pd['nama_produk']; ?></h5></i>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        
        <div id="carouselExampleControls<?= $pd['id_produk']; ?>" class="carousel slide card" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="<?= base_url('assets/img/'); ?>profile/<?= $nama_gambar[0]; ?>" alt="First slide" height="200">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="<?= base_url('assets/img/'); ?>profile/<?= $nama_gambar[1]; ?>" alt="Second slide" height="200">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="<?= base_url('assets/img/'); ?>profile/<?= $nama_gambar[2]; ?>" alt="Third slide" height="200">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls<?= $pd['id_produk']; ?>" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgba(0,0,0, .5); height: 30px; width: 30px; font-size: 2px;"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls<?= $pd['id_produk']; ?>" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgba(0,0,0, .5); height: 30px; width: 30px; font-size: 2px;"></span>
                <span class="sr-only">Next</span>
              </a>
        </div>
        <div class="card">
              <div class="card-body">
                <h5 class="card-title">Deskripsi</h5>
                <p class="card-text"><?= $pd['deskripsi_produk']; ?>.</p>
              </div>
        </div>
      
      </div>
    </div>
  </div>
</div>

<?php endforeach;?>

