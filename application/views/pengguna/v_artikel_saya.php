<link href="<?= base_url('assets/'); ?>style_css/pengguna/event-saya.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



	<div class="content">
		<div class="container">
			<div class="row">
				<?php
	$query_user = $this->db->get_where('tutorial_artikel', array('id_meta'=> $this->session->userdata('id_meta')))->result_array();

	foreach ($query_user as $row)
	{
?>
				<div class="col-lg-4">
					<div class="card card-product">
						<div class="card-image" data-header-animation="true">
							<a href="#pablo">
								<img class="img" src="<?php echo base_url('assets/img/artikel/sampul/').$row['gambar_artikel'] ?>">
							</a>
						</div>
						<div class="card-content">
							<div class="card-actions">
								<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
									<a href="<?php echo base_url('pengunjung/detail-artikel-saya/'.$row['id_artikel']) ?>">
										<i class="material-icons">art_track</i>
									</a>
								</button>
								<button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
									<a href="<?php echo base_url('pengguna/update-artikel/'.$row['id_artikel']) ?>">
										<i class="material-icons">edit</i>
									</a>
								</button>
								<button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
									<a href="<?php echo base_url('pengguna/hapus-artikel/'.$row['id_artikel']) ?>">
										<i class="material-icons">close</i>
									</a>
								</button>
							</div>
							<h4 class="card-title">
								<a href="#pablo"><?php echo $row['judul_artikel'];?></a>
							</h4>
							<div class="card-description">
								<?php echo mb_strimwidth($row['deskripsi_artikel'], 0, 380, "...")?>
							</div>
						</div>
						<div class="card-footer">
							<div class="stats float-right">
								<p class="category"><i class="far fa-calendar-alt"></i> <?php echo date('d M Y', $row['tgl_posting_artikel']);?></p>
							</div>
						</div>
					</div>
				</div>
				<?php
	}
?>
			</div>
		</div>
	</div>
