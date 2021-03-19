<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dropify/dist/css/dropify.min.css')?>">
<style>
	.dynamic { list-style-type: none; margin: 0; padding: 0; width: 100%; }
</style>
<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.css') ?>">
<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.js'); ?>"></script>
<script src="<?= base_url('assets/dropify/dist/js/dropify.js'); ?>"></script>
<link href="<?= base_url('assets/'); ?>style_css/toko/upload_produk.css" rel="stylesheet">

<form action="<?= base_url('toko/upload_produk'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">

	<div class="row" id="contain-produk">

		<div class="col-lg-6 mt-5">
		    <div class="card"  id="contain-left">
			    <div class="card-body">
			        <!-- Credit Card -->
			        <div id="pay-invoice">
			            <div class="card-body">
			                <div class="card-title">
			                    <h5 class="text-center">Data Produk</h5>
			                </div>

		                	<hr>

			                    

			                    <div class="form-group has-success">
			                            <label for="nama_produk" class="control-label mb-1">Name Produk</label>
			                            <input id="nama_produk" name="nama_produk" type="text" class="form-control" required="">
			                    </div>

			                    <div class="form-group">
			                        <label for="deskripsi_produk" class="control-label mb-1">Deskripsi Produk</label>
			                        <input id="deskripsi_produk" name="deskripsi_produk" type="text" class="form-control" required="">
			                    </div>

			                    <div class="form-group col-lg-6">
							      <label for="inputState">Kategori</label>
							      <select id="inputState" class="form-control" name="kategori" required="">
							        <option selected>Pilih...</option>
							        <option value="1">Mainan</option>
							        <option value="2">Fashion</option>
							        <option value="3">Furniture</option>
							      </select>
							    </div>

			                    <div class="form-group col-6">
			                        <label for="harga_produk" class="mb-1">Harga Produk</label>
			                        <input id="harga_produk" name="harga_produk" type="text" class="form-control" required="">
			                    </div>

			                    <div class="form-group col-6">
			                        <label for="diskon" class="control-label mb-1">Diskon</label>
			                        <input id="diskon" name="diskon" type="text" class="form-control" required="">
			                    </div>

			            </div>
			        </div>
				</div>
			</div>
		</div>


		<div class="col-lg-6 mt-5">
			<div class="row">
		    	<div class="col-lg-12">
		    		<div class="custom-file">
					  <input type="file" class="dropify" id="gambar" height="200" name="gambar1" required="">
					  <label class="custom-file-label" for="customFile">Gambar Depan</label>
					</div>
		    	</div>
		    	<div class="col-lg-12">
		    		<div class="custom-file">
					  <input type="file" class="dropify" id="gambar" height="200" name="gambar2" required="">
					  <label class="custom-file-label" for="customFile">Gambar Samping</label>
					</div>
		    	</div>
		    	<div class="col-lg-12">
		    		<div class="custom-file">
					  <input type="file" class="dropify" id="gambar" height="200" name="gambar3" required="">
					  <label class="custom-file-label" for="customFile">Gambar Belakang</label>
					</div>
		    	</div>
			</div>
		</div>

	</div>


	<div class="form-group col-12 card mt-5">
		
		<div class="form-group">
			<ul id="drag" class="dynamic dynamic_step" name="langkah">
				<li>
					<div class="row ml-5">
						<div class="form-group col-lg-4">
							<label for="cc-payment" class="control-label ml-3">Ukuran Produk</label>
							<input type="text" name="ukuran[1]" class="form-control name_list" required="" />
						</div>
						<div class="form-group col-lg-4">
							<label for="cc-payment" class="control-label ml-3">Warna Produk</label>
							<input type="text" name="warna[1]" class="form-control name_list" required="" />
						</div>
						<div class="form-group col-lg-2">
							<label for="cc-payment" class="control-label ml-3">Stok Produk</label>
							<input type="text" name="stok[1]" class="form-control name_list" required="" />
						</div>
						<div class="form-group col-lg-2 mt-4">
							<button type="button" name="add" id="tambah" class="btn text-success">
								<i class="fas fa-plus"></i>
							</button>
							<button type="button" name="" id="" class="btn text-danger btn-hapus">
								<i class="fa fa-trash"></i>
							</button>
						</div>
					</div>
				</li>
			</ul>
		</div>
    </div>


<?php echo form_error('harga_produk','<small>','</small>'); ?>
<?php echo form_error('ukuran[]','<small>','</small>'); ?>
<?php echo form_error('warna[]','<small>','</small>'); ?>


	<div class="col-12 text-center">
		<div class="row">
	    	<div class="col-12 mt-3">
	        <button id="payment-button" type="submit" value="upload" class="btn btn-info">Submit</button>
	        </div>
		</div>
	</div>

</form>
<!-- <?php foreach ($ukuran as $uk): ?>
  <span><?= $uk ?></span><span>,</span>
<?php endforeach; ?> -->


	<script type="text/javascript" src="<?php echo base_url('assets/dropify/dist/js/dropify.min.js')?>"></script>
	<script type="text/javascript">
		$(function()
		{
			$('.dropify').dropify(
			{
				messages:
				{
					default: 'Drag atau drop untuk memilih gambar',
					replace: 'Ganti',
					remove:  'Hapus',
					error:   'error'
				}
			});
		});

		var i=1;
		$('#add').click(function()
		{
			i++;
			$('.dynamic_field').append(
				'<li>'+
					'<div class="row b'+i+' ml-5">'+
						'<div class="form-group col-lg-4">'+
							'<input type="text" name="ukuran['+i+']" class="form-control name_list" required="" />'+
						'</div>'+

						'<div class="form-group col-lg-4">'+
							'<input type="text" name="warna['+i+']" class="form-control name_list" required="" />'+
						'</div>'+

						'<div class="form-group col-lg-2">'+
							'<input type="text" name="stok['+i+']" class="form-control name_list" required="" />'+
						'</div>'+

						'<div class="form-group col-lg-2">'+
							'<button type="button" name="add" id="'+i+'" class="btn text-success btn_add">'+
								'<i class="fas fa-plus"></i>'+
							'</button>'+
							'<button type="button" name="remove" id="'+i+'" class="btn text-danger btn_remove">'+
								'<i class="fa fa-trash"></i>'+
							'</button>'+
						'</div>'+
					'</div>'+
				'</li>'
			);
		});

		$(document).on('click', '.btn_remove', function()
		{
			var button_id = $(this).attr("id");  
			$('.b'+button_id+'').empty();
		});

		$(document).on('click', '.btn_add', function()
		{
			var button_id = $(this).attr("id");  
			i++;
			$('.dynamic_field').append(
				'<li>'+
					'<div class="row b'+i+' ml-5">'+
						'<div class="form-group col-lg-4">'+
							'<input type="text" name="ukuran['+i+']" class="form-control name_list" required="" />'+
						'</div>'+

						'<div class="form-group col-lg-4">'+
							'<input type="text" name="warna['+i+']" class="form-control name_list" required="" />'+
						'</div>'+

						'<div class="form-group col-lg-2">'+
							'<input type="text" name="stok['+i+']" class="form-control name_list" required="" />'+
						'</div>'+

						'<div class="form-group col-lg-2">'+
							'<button type="button" name="add" id="'+i+'" class="btn text-success btn_add">'+
								'<i class="fas fa-plus"></i>'+
							'</button>'+
							'<button type="button" name="remove" id="'+i+'" class="btn text-danger btn_remove">'+
								'<i class="fa fa-trash"></i>'+
							'</button>'+
						'</div>'+
					'</div>'+
				'</li>'
			);
		});

		var i=1;
		$('#tambah').click(function()
		{
			i++;
			$('.dynamic_step').append(
				'<li>'+
					'<div class="row c'+i+' ml-5">'+
						'<div class="form-group col-lg-4">'+
							'<input type="text" name="ukuran['+i+']" class="form-control name_list" required="" />'+
						'</div>'+
						'<div class="form-group col-lg-4">'+
							'<input type="text" name="warna['+i+']" class="form-control name_list" required="" />'+
						'</div>'+
						'<div class="form-group col-lg-2">'+
							'<input type="text" name="stok['+i+']" class="form-control name_list" required="" />'+
						'</div>'+
						'<div class="form-group col-lg-2">'+
							'<button type="button" name="add" id="'+i+' tambah" class="btn text-success btn-tambah">'+
								'<i class="fas fa-plus"></i>'+
							'</button>'+
							'<button type="button" name="" id="'+i+'" class="btn text-danger btn-hapus">'+
								'<i class="fa fa-trash"></i>'+
							'</button>'+
						'</div>'+
					'</div>'+
				'</li>'
			);
			$('.dropify').dropify(
			{
				messages:
				{
					default: 'Drag atau drop untuk memilih gambar',
					replace: 'Ganti',
					remove:  'Hapus',
					error:   'error'
				}
			});
		});

		$(document).on('click', '.btn-hapus', function()
		{
			var button_id = $(this).attr("id");  
			$('.c'+button_id+'').empty();
		});

		$(document).on('click', '.btn-tambah', function()
		{
			var button_id = $(this).attr("id");  
			i++;
			$('.dynamic_step').append(
				'<li>'+
					'<div class="row c'+i+' ml-5">'+
						'<div class="form-group col-lg-4">'+
							'<input type="text" name="ukuran['+i+']" class="form-control name_list" required="" />'+
						'</div>'+
						'<div class="form-group col-lg-4">'+
							'<input type="text" name="warna['+i+']" class="form-control name_list" required="" />'+
						'</div>'+
						'<div class="form-group col-lg-2">'+
							'<input type="text" name="stok['+i+']" class="form-control name_list" required="" />'+
						'</div>'+
						'<div class="form-group col-lg-2">'+
							'<button type="button" name="add" id="'+i+' tambah" class="btn text-success btn-tambah">'+
								'<i class="fas fa-plus"></i>'+
							'</button>'+
							'<button type="button" name="" id="'+i+'" class="btn text-danger btn-hapus">'+
								'<i class="fa fa-trash"></i>'+
							'</button>'+
						'</div>'+
					'</div>'+
				'</li>'
			);
			$('.dropify').dropify(
			{
				messages:
				{
					default: 'Drag atau drop untuk memilih gambar',
					replace: 'Ganti',
					remove:  'Hapus',
					error:   'error'
				}
			});
		});


	</script>

