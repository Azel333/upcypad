<link href="<?= base_url('assets/'); ?>style_css/pengunjung/event.css" rel="stylesheet">

<div class="container" id="contain-artikel">
	<div class="row">
		<?php
			$query_user = $this->db->get_where('event', array('id_meta !='=> $this->session->userdata('id_meta')))->result_array();

			foreach ($query_user as $row)
			{
		?>
		<div class="col-xs-12 col-sm-6 col-md-4">
			<div class="image-flip" ontouchstart="this.classList.toggle('hover');">
				<div class="mainflip">
					<div class="frontside">
						<div class="card">
							<div class="card-body text-center">
								<p><img class="img-fluid" src="<?php echo base_url('assets/img/event/').$row['event_image'] ?>" alt="Banner Acara"></p>
								<h4 class="card-title"><a href="#"><?php echo $row['nama_acara'];?></a></h4>
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
									<div class="price float-left">
										Biaya :
										<br>
										<?php echo "Rp. ". number_format($row['biaya'], 0, ".", "."); ?>
									</div>
									<div class="stats float-right">
										<p class="category">
											Lokasi :
											<br>
											<i class="fas fa-map-marker-alt"></i>
											<?php echo $row['nama_lokasi'];?>
										</p>
									</div>
							</div>
						</div>
					</div>
					<div class="backside">
						<div class="card">
							<div class="card-body text-center mt-4">
								<h4 class="card-title"><a href="#"><?php echo $row['nama_acara'];?></a></h4>
								<p class="card-text"><?php echo $row['deskripsi_acara'];?></p>
								<a class="btn btn-raised btn-info btn-block mt-5" href="<?php echo base_url('pengunjung/detail-event/'.$row['id_event']) ?>" role="button">Info Lengkap</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			}
		?>
		<!-- akhir looping -->
	</div>
</div>