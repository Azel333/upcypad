<link href="<?= base_url('assets/'); ?>style_css/pengunjung/kontak.css" rel="stylesheet">

<div class="container" id="contain-kontak">
	<div class="row">
		<div class="col-md-8">
			<div class="card border border-info">
				<form class="p-5" method="post" action="<?php echo base_url('pengunjung/kontak') ?>">
					<div class="row">
						<div class="col-md-12">
							<h3 class="text-center">Hubungi Kami</h3>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="far fa-user"></i>
									</span>
									<input type="text" name="nama" class="form-control" placeholder="Nama" required="required">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="far fa-envelope"></i>
									</span>
									<input type="email" name="email" class="form-control" placeholder="Email" required="required">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fas fa-phone"></i>
									</span>
									<input type="text" name="nomor_telpon" class="form-control" placeholder="Nomor Telepon" required="required">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<textarea name="message" id="message" class="form-control" rows="9" cols="26" required="required" placeholder="Message"></textarea>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button type="submit" class="btn btn-raised btn-info" id="btnContactUs">
								<i class="fa fa-paper-plane"></i>
								Send Message
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-4">
			<form>
				<legend><i class="fa fa-globe"></i> Kontak Kami</legend>
				<hr>
				<address>
					<strong>Upcypad</strong><br>
					<abbr title="Lokasi">
						<i class="fa fa-map-marker"></i>
					</abbr>
					Jl. Kayu Jati V No.14, Kota Jakarta Timur, Jakarta<br>
					<abbr title="Telepon">
						<i class="fa fa-phone"></i>
					</abbr>
					+62 8XXX XXXX XXXX<br>
					<abbr title="email">
						<i class="fa fa-envelope"></i>
					</abbr>
					<a href="mailto:#">contact@upcypad.xyz</a>
				</address>
			</form>
		</div>
		<div class="col-md-12 mt-4">
			<div id="map"></div>

		</div>
	</div>
</div>

<script>
	function initMap()
	{
		var myLatLng = {lat: -6.192267, lng: 106.886657};
		var map = new google.maps.Map(document.getElementById('map'),
		{
			zoom: 17,
			center: myLatLng
		});

		var marker = new google.maps.Marker(
		{
			position: myLatLng,
			map: map,
			title: 'Hello World!'
		});
	}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDOCykF1KHEVDf-oN0BPS40JxVlOk71O4&callback=initMap"></script>

