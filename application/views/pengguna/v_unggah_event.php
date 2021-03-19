<body onload="initialize()">
	<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.css') ?>">
	<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-ui-timepicker-addon.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-ui-timepicker-addon-i18n.min.js'); ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/style_css/pengguna/acara.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/style_css/pengguna/jquery-ui-timepicker-addon.css') ?>">

	<!-- Latest compiled and minified JavaScript -->
	<script src="<?php echo base_url('assets/jquery/jquery.mask.min.js'); ?>"></script>

	<style type="text/css">
		.preview
		{
			width : 150px;
			height : 150px;
			max-width : 150px;
			max-height: 150px;
			border-radius : 50%;
		}

		#upload,
		#event_image
		{
			display : none;
			top: 1%;
		}
	</style>

	<div class="container">
		<div class="edit-block">
			<?php echo form_open_multipart('pengguna/unggah-event');?>
				<div class="fileinput">
					<img src="<?php echo base_url('assets/img/background/').$data_user['back_image'] ?>" class="img-thumbnail banner_preview">
					<input id="event_image" type="file" name="event_image" accept="image/*"/>
				</div>

				<div>
					<img class="img-thumbnail preview" src="http://placehold.it/150x150"/>
					<input id="upload" type="file" name="logo_image" accept="image/*"/>
				</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label for="nama_acara" class="bmd-label-floating">Nama Acara</label>
							<input type="text" class="form-control text-capitalize" id="nama_acara" name="nama_acara" value="" required>
							<?php echo form_error('nama_acara','<small>','</small>'); ?>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label for="lastname" class="bmd-label-floating">Penyelenggara</label>
							<input type="text" class="form-control text-capitalize" id="penyelenggara" name="penyelenggara" value="" required>
							<?php echo form_error('penyelenggara','<small>','</small>'); ?>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="form-group">
							<label for="deskripsi_acara" class="bmd-label-floating">Deskripsi Acara</label>
							<textarea id="deskripsi_acara" name="deskripsi_acara" class="form-control" rows="4"></textarea>
							<?php echo form_error('deskripsi_acara','<small>','</small>'); ?>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="mulai_acara" class="bmd-label-floating">Tanggal Mulai Acara</label>
							<input type="text" class="form-control text-capitalize" id="mulai_acara" name="mulai_acara" value="" required>
							<?php echo form_error('mulai_acara','<small>','</small>'); ?>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="akhir_acara" class="bmd-label-floating">Tanggal Berakhir Acara</label>
							<input type="text" class="form-control text-capitalize" id="akhir_acara" name="akhir_acara" value="" required>
							<?php echo form_error('akhir_acara','<small>','</small>'); ?>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="waktu_mulai_acara" class="bmd-label-floating">Waktu Mulai Acara</label>
							<input type="text" class="form-control text-capitalize" id="waktu_mulai_acara" name="waktu_mulai_acara" value="" required>
							<?php echo form_error('waktu_mulai_acara','<small>','</small>'); ?>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label for="waktu_akhir_acara" class="bmd-label-floating">Waktu Berakhir Acara</label>
							<input type="text" class="form-control text-capitalize" id="waktu_akhir_acara" name="waktu_akhir_acara" value="" required>
							<?php echo form_error('waktu_akhir_acara','<small>','</small>'); ?>
						</div>
					</div>
				</div>

				<!-- Button trigger modal -->
				<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#Lokasi">
					Masukan Lokasi
				</button>

				<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#Tiket">
					Buat Tiket
				</button>

				<!-- Modal -->
				<div class="modal fade" id="Lokasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="form-group">
									<label for="nama_lokasi" class="bmd-label-floating">Nama Lokasi</label>
									<input type="text" class="form-control text-capitalize" id="nama_lokasi" name="nama_lokasi" value="" required>
									<?php echo form_error('nama_lokasi','<small>','</small>'); ?>
								</div>
								<div class="form-group">
									<label for="address" class="bmd-label-floating">Nama Alamat di Peta</label>
									<input type="text" class="form-control text-capitalize" id="address" name="address" value="" required>
									<?php echo form_error('address','<small>','</small>'); ?>
								</div>
								<div>
									<input type="button" value="Cari Lokasi" onclick="codeAddress()">
									<div style="display: none;">
										Latitude: <input type="text" name="lat" id="lat">
										Longitude: <input type="text" name="lng" id="lng">
									</div>
								</div>
								<label for="" class="bmd-label-static">Tampilan Alamat di Peta</label>
								<div id="map_canvas"></div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-info btn-block" data-dismiss="modal">
									Simpan Lokasi
								</button>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="Tiket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="card card-nav-tabs card-plain nav-justified">
									<div class="card-header card-header-danger">
										<div class="nav-tabs-navigation">
											<div class="nav-tabs-wrapper">
												<ul class="nav nav-tabs" data-tabs="tabs">
													<li class="nav-item">
														<a class="nav-link active" href="#detail_biaya" data-toggle="tab">Detail Biaya</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="#waktu_penjualan" data-toggle="tab">Waktu Penjualan</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="card-body ">
										<div class="tab-content">
											<div class="tab-pane active" id="detail_biaya">
												<div class="form-group">
													<label for="nama_biaya" class="bmd-label-floating">Nama Biaya</label>
													<input type="text" class="form-control text-capitalize" id="nama_biaya" name="nama_biaya" value="" required>
													<?php echo form_error('nama_biaya','<small>','</small>'); ?>
												</div>
												<label for="jumlah_tiket" class="bmd-label">Jumlah Tiket</label>
												<div class="input-group">
													<span class="input-group-btn">
														<button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
															<i class="fas fa-minus"></i>
														</button>
													</span>
													<input type="text" id="jumlah_tiket" name="jumlah_tiket" class="form-control input-number" min="10" value="10">
													<?php echo form_error('jumlah_tiket','<small>','</small>'); ?>
													<span class="input-group-btn">
														<button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
															<i class="fas fa-plus"></i>
														</button>
													</span>
												</div>
												<div class="form-group">
													<label for="biaya" class="bmd-label-floating">Biaya</label>
													<input type="text" class="form-control text-capitalize text-left" id="biaya" name="biaya" value="" required>
													<?php echo form_error('biaya','<small>','</small>'); ?>
												</div>
											</div>
											<div class="tab-pane" id="waktu_penjualan">
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<label for="mulai_penjualan" class="bmd-label-floating">Tanggal Mulai Penjualan</label>
															<input type="text" class="form-control text-capitalize" id="mulai_penjualan" name="mulai_penjualan" value="" required>
															<?php echo form_error('mulai_penjualan','<small>','</small>'); ?>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label for="akhir_penjualan" class="bmd-label-floating">Tanggal Akhir Penjualan</label>
															<input type="text" class="form-control text-capitalize" id="akhir_penjualan" name="akhir_penjualan" value="" required>
															<?php echo form_error('akhir_penjualan','<small>','</small>'); ?>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label for="waktu_mulai_penjualan" class="bmd-label-floating">Waktu Mulai Penjualan</label>
															<input type="text" class="form-control text-capitalize" id="waktu_mulai_penjualan" name="waktu_mulai_penjualan" value="" required>
															<?php echo form_error('waktu_mulai_penjualan','<small>','</small>'); ?>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group">
															<label for="waktu_akhir_penjualan" class="bmd-label-floating">Waktu Akhir Penjualan</label>
															<input type="text" class="form-control text-capitalize" id="waktu_akhir_penjualan" name="waktu_akhir_penjualan" value="" required>
															<?php echo form_error('waktu_akhir_penjualan','<small>','</small>'); ?>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="text-right">
														<button class="btn btn-funky-moon btn-rounded" data-dismiss="modal">Selesai</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<button class="btn btn-raised btn-info btn-block" type="submit" name="edit">
						Buat Acara
					</button>
				</div>
			</form>

		</div>
	</div>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDOCykF1KHEVDf-oN0BPS40JxVlOk71O4&libraries=places&callback=initAutocomplete" async defer></script>
	<script type="text/javascript">
		$(".preview").click(function()
		{
			$("#upload").click();
		});

		$("#upload").change(function()
		{
			preview(this);
		});

		function preview(input)
		{
			if (input.files && input.files[0])
			{
				var reader = new FileReader();
				reader.onload = function(e)
				{
					$('.preview').attr('src', e.target.result);
				};
				reader.readAsDataURL(input.files[0]);
			}
		}

		$(".banner_preview").click(function()
		{
			$("#event_image").click();
		});

		$("#event_image").change(function()
		{
			image(this);
		});

		function image(input)
		{
			if (input.files && input.files[0])
			{
				var reader = new FileReader();
				reader.onload = function(e)
				{
					$('.banner_preview').attr('src', e.target.result);
				};
				reader.readAsDataURL(input.files[0]);
			}
		}

		var geocoder;
		var map;
		var lat;
		var lng;

		function initialize()
		{
			geocoder = new google.maps.Geocoder();
			var latlng = new google.maps.LatLng(-6.192267, 106.886657);
			var myOptions =
			{
				zoom: 17,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			var marker = new google.maps.Marker(
			{
				position: latlng
			});

			// To add the marker to the map, call setMap();
			marker.setMap(map);
		}

		function codeAddress()
		{
			var address = document.getElementById("address").value;
			geocoder.geocode( { 'address': address}, function(results, status)
			{
				if (status == google.maps.GeocoderStatus.OK)
				{
					map.setCenter(results[0].geometry.location);
					var latlng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
					var marker = new google.maps.Marker(
					{
						draggable:true,
						position: latlng
					});
					marker.setMap(map);
					document.getElementById('lat').value = results[0].geometry.location.lat();
					document.getElementById('lng').value = results[0].geometry.location.lng();
				}
				else
				{
					alert("Geocode was not successful for the following reason: " + status);
				}
			});
		}

		$("#mulai_acara").datepicker(
		{
			changeMonth: true,
			changeYear: true,
			minDate: 0,
			onSelect: function (selected)
			{
				var dtMax = new Date(selected);
				dtMax.setDate(dtMax.getDate());
				var dd = dtMax.getDate();
				var mm = dtMax.getMonth() + 1;
				var y = dtMax.getFullYear();
				var dtFormatted = mm + '/'+ dd + '/'+ y;
				$("#akhir_acara").datepicker("option", "minDate", dtFormatted);
			}
		});

		$("#akhir_acara").datepicker(
		{
			changeMonth: true,
			changeYear: true,
			minDate: 0,
			onSelect: function (selected)
			{
				var dtMax = new Date(selected);
				dtMax.setDate(dtMax.getDate());
				var dd = dtMax.getDate();
				var mm = dtMax.getMonth() + 1;
				var y = dtMax.getFullYear();
				var dtFormatted = mm + '/'+ dd + '/'+ y;
				$("#mulai_acara").datepicker("option", "maxDate", dtFormatted)
			}
		});

		$('#waktu_mulai_acara').timepicker(
		{
			controlType: 'select',
			oneLine: true,
			timeFormat: 'HH:mm'
		});

		$('#waktu_akhir_acara').timepicker(
		{
			controlType: 'select',
			oneLine: true,
			timeFormat: 'HH:mm'
		});

		$("#mulai_penjualan").datepicker(
		{
			changeMonth: true,
			changeYear: true,
			minDate: 0,
			onSelect: function (selected)
			{
				var dtMax = new Date(selected);
				dtMax.setDate(dtMax.getDate());
				var dd = dtMax.getDate();
				var mm = dtMax.getMonth() + 1;
				var y = dtMax.getFullYear();
				var dtFormatted = mm + '/'+ dd + '/'+ y;
				$("#akhir_penjualan").datepicker("option", "minDate", dtFormatted);
			}
		});

		$("#akhir_penjualan").datepicker(
		{
			changeMonth: true,
			changeYear: true,
			minDate: 0,
			onSelect: function (selected)
			{
				var dtMax = new Date(selected);
				dtMax.setDate(dtMax.getDate());
				var dd = dtMax.getDate();
				var mm = dtMax.getMonth() + 1;
				var y = dtMax.getFullYear();
				var dtFormatted = mm + '/'+ dd + '/'+ y;
				$("#mulai_penjualan").datepicker("option", "maxDate", dtFormatted)
			}
		});

		$('#waktu_mulai_penjualan').timepicker(
		{
			controlType: 'select',
			oneLine: true,
			timeFormat: 'HH:mm'
		});

		$('#waktu_akhir_penjualan').timepicker(
		{
			controlType: 'select',
			oneLine: true,
			timeFormat: 'HH:mm'
		});

		$("#biaya").mask("#.##0",
		{
			reverse: true
		});

		var quantitiy=0;
		$('.quantity-right-plus').click(function(e)
		{
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#jumlah_tiket').val());
			// If is not undefined
			$('#jumlah_tiket').val(quantity + 1);
			// Increment
		});

		$('.quantity-left-minus').click(function(e)
		{
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#jumlah_tiket').val());
			// If is not undefined
			// Increment
			if(quantity>0)
			{
				$('#jumlah_tiket').val(quantity - 1);
			}
		});

		$("#jumlah_tiket").mask("#.##0",
		{
			reverse: true
		});
	</script>
</body>