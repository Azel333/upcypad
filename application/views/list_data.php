 <!-- style="border-top: 2px; border-color: 2px solid white;z-index: 99;" -->

<div class="container">
  <div class="table-responsive card card-body mt-5 bg-primary" style="margin-top: -20px;">
     <a href="<?= base_url('pendaftaran') ?>" class="btn bg-success col-4" style="position: absolute;">DAFTAR ULANG</a>
    <table class="table table-bordered" id = "table-datatable">
      <div class="card text-center bg-white text-dark pt-3 pb-3" style="position: relative;top: 35px;">Data Anggota</div>
      <thead>
        <tr>
          <th style="font-size: 12px;" class="text-uppercase font-weight-bold">No</th>
          <th style="font-size: 12px;" class="text-uppercase font-weight-bold">Nama</th>
          <th style="font-size: 12px;" class="text-uppercase font-weight-bold">Email</th>
        </tr>
      </thead>
      <tbody>


<?php 
$list = $this->db->get('pendaftaran')->result_array();
 ?>
 <?php $i=0; ?>
<?php foreach ($list as $list): ?>
  <?php $i++; ?>
          <tr>
            <td style="font-size: 10px;"><?= $i ?></td>
            <td style="font-size: 10px;" class="text-uppercase"><?= $list['nama']; ?></td>
            <td style="font-size: 10px;" class="text-uppercase"><?= $list['email']; ?></td>
          </tr>
<?php endforeach; ?>



      </tbody>
  </table>
  </div>
</div>