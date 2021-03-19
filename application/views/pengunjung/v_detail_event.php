<link href="<?= base_url('assets/'); ?>style_css/pengunjung/event.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style type="text/css">
.card
{
	display: inline-block;
	position: relative;
	width: 100%;
	margin: 25px 0;
	box-shadow: 0 1px 4px 0 rgba(0, 0, 0, 0.14);
	border-radius: 6px;
	color: rgba(0,0,0, 0.87);
	background: #fff;
}

.row::before
{
	display: table;
	content: " ";
}

img
{
	height: 280px;
	border-radius: 6px;
	margin-top: 15px;
}

.card .card-header.card-header-icon
{
	float: left;
}

.card [data-background-color]
{
	color: #FFFFFF;
}

.card [data-background-color="green"]
{
	background: linear-gradient(60deg, #66bb6a, #43a047);
	box-shadow: 0 4px 20px 0px rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(76, 175, 80, 0.4);
}

.card [data-background-color]
{
	margin: -20px 15px 0;
	border-radius: 3px;
	padding: 15px;
	background-color: #999999;
	position: relative;
}

.card .card-header
{
	z-index: 3;
}

.card .card-header.card-header-icon i
{
	width: 33px;
	height: 33px;
	text-align: center;
	line-height: 33px;
}

.card .card-content
{
	padding: 15px 20px;
	position: relative;
}

.card .card-header.card-header-icon + .card-content .card-title
{
	padding-bottom: 15px;
}

.card .card-title
{
	margin-top: 0;
	margin-bottom: 3px;
}

.card-title
{
	color: #3C4858;
	text-decoration: none;
}

.circle
{
	width: 70px;
	height: 70px;
	border-radius: 50%;
}

.penyelenggara
{
	font-size:14px;
	background:#e91e63;
	color:#fff;
	padding:4px 10px;
	border-radius:15px;
	height: 29px;
	margin-top: 33px;
}
</style>

<div class="container" id="contain-artikel">
	<?php
			if ($event['id_meta'] == $this->session->userdata('id_meta'))
			{
				echo "biji";
			}
			else
			{
				?>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header card-header-icon" data-background-color="green">
									<i class="material-icons">language</i>
								</div>
								<div class="card-content">
									<h4 class="card-title"><?php echo $event['nama_acara'];?></h4>
									<div class="row justify-content-end">
										<div class="col-md-5">
											<div class="card-content">Diselenggarakan Oleh</div>
											<div class="row">
												<img class="circle" src="<?php echo base_url('assets/img/event/logo/').$event['logo_event'] ?>">
												<div class="penyelenggara">
													<?php echo $event['penyelenggara'];?>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-md-offset-1">
											<img class="img" src="<?php echo base_url('assets/img/event/banner/').$event['event_image'] ?>">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="tnc-detail">
						<p><strong>SYARAT &amp; KETENTUAN</strong></p>
						<div>
							<table class="toc">
								<tbody>
									<tr>
										<td style="width:50%">
											<div>
												<ul>
													<li>
														<i>Tiket yang sudah di beli tidak dapat di kembalikan.</i>
													</li>
													<li>
														<i>E-voucher ini tidak dapat dipindah-tangankan.</i>
													</li>
													<li>
														<i>Kami tidak bertanggung jawab atas kehilangan e-voucher ini.</i>
													</li>
													<li>
														<i>Nantinya e-voucher ini harus di tukarkan menjadi gelang asli. Waktu dan tempat penukaran akan diumumkan melalui e-mail blast tiga hingga lima hari sebelum hari penukaran.</i>
													</li>
												</ul>
											</div>
										</td>
										<td style="width:50%">
											<div>
												<ul>
													<li>
														<i>Wajib membawa dan menunjukkan kartu identitas (KTP/Kartu Pelajar/Passpor/SIM) pada saat penukaran e-voucher dengan gelang.</i>
													</li>
													<li>
														<i>Dilarang membawa senjata tajam/api dan obat-obatan terlarang.&nbsp;</i>
													</li>
													<li>
														<i>Penyelenggara berhak untuk tidak memberikan izin masuk ke dalam tempat acara jika tidak mengikuti&nbsp; syarat-syarat &amp; ketentuan yang berlaku.</i>
													</li>
												</ul>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<?php
			}
		?>
		<!-- akhir looping -->
</div>