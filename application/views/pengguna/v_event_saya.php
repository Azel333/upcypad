<link href="<?= base_url('assets/'); ?>style_css/pengguna/event-saya.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


	<div class="content">
		<div class="container">
			<div class="row">
<?php
	$query_user = $this->db->get_where('event', array('id_meta'=> $this->session->userdata('id_meta')))->result_array();

	foreach ($query_user as $row)
	{
?>
				<div class="col-lg-4">
					<div class="card card-product">
						<div class="card-image" data-header-animation="true">
							<a href="#pablo">
								<img class="img" src="<?php echo base_url('assets/img/event/banner/').$row['event_image'] ?>">
							</a>
						</div>
						<div class="card-content">
							<div class="card-actions">
								<button type="button" class="btn btn-danger btn-simple fix-broken-card">
									<i class="material-icons">build</i> Fix Header!
								</button>
								<button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="View">
									<a href="<?php echo base_url('pengunjung/detail-event-saya/'.$row['id_event']) ?>">
										<i class="material-icons">art_track</i>
									</a>
								</button>
								<button type="button" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Edit">
									<i class="material-icons">edit</i>
								</button>
								<button type="button" class="btn btn-danger btn-simple" rel="tooltip" data-placement="bottom" title="Remove">
									<a href="<?php echo base_url('pengguna/hapus-event/'.$row['id_event']) ?>">
										<i class="material-icons">close</i>
									</a>
								</button>
							</div>
							<h4 class="card-title">
								<a href="#pablo"><?php echo $row['nama_acara'];?></a>
							</h4>
							<div class="card-description">
								<div>
									<i class="far fa-calendar-alt"></i>
									<?php
										echo date('d M Y', strtotime($row['mulai_acara']));
										if ($row['mulai_acara'] != $row['akhir_acara'])
										{
											echo " - " .date('d M Y', strtotime($row['akhir_acara']));
										}
									?>
								</div>
								<div>
									<i class="fas fa-clock"></i>
									<?php
										echo date('H:i', strtotime($row['waktu_mulai_acara']));
										if ($row['waktu_mulai_acara'] != $row['waktu_akhir_acara'])
										{
											echo " - " .date('H:i', strtotime($row['waktu_akhir_acara']));
										}
									?>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<div class="price">
								<h4>
									<?php echo "Rp. ". number_format($row['biaya'], 0, ".", "."); ?>
								</h4>
							</div>
							<div class="stats float-right">
								<p class="category"><i class="material-icons">place</i> <?php echo $row['nama_lokasi'];?></p>
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