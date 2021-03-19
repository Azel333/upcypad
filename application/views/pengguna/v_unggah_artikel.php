<body>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dropify/dist/css/dropify.min.css')?>">
	<style>
		.dynamic { list-style-type: none; margin: 0; padding: 0; width: 100%; }
	</style>
	<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.css') ?>">
	<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.js'); ?>"></script>

	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-lg-10 mt-4">
				<?php echo form_open_multipart('pengguna/unggah-artikel');?>
					<div class="form-group">
						<input type="file" name="artikel_image" class="dropify" data-height="200">
					</div>
					<div class="form-group">
						<input type="text" name="judul_artikel" class="form-control" placeholder="Judul Karya">
					</div>
					<div class="form-group">
						<textarea class="form-control" name="deskripsi_artikel" id="exampleFormControlTextarea1" rows="2" placeholder="Deskripsi Karya"></textarea>
					</div>

					<label class="text-muted">Alat Dan Bahan</label>
					<div class="row education_row biji">
						<div class="col-lg-12 education_form">
							<div class="bijiKuda row">
								<div class="form-group col-lg-10">
									<input type="text" name="alat_bahan[]" class="form-control name_list" required="" />
								</div>
								<div class="col-lg-2 mt-auto">
									<button type="button" class="btn text-success tambah">
										<i class="fas fa-plus"></i>
									</button>
									<button type="button" class="btn text-danger btn-remove-item">
										<i class="fa fa-trash"></i>
									</button>
									<i class="fas fa-sort text-primary"></i>
								</div>
							</div>
						</div>

					</div>

					<label class="text-muted">Langkah Pembuatan</label>
					<div class="row education_row biji">
						<div class="col-lg-12 langkah_form">
							<div class="bijiKuda row">
								<div class="form-group col-lg-2">
									<input type="file" name="langkah_image[]" class="dropify" data-height="120">
								</div>
								<div class="form-group col-lg-8 mt-auto">
									<input type="text" name="langkah[]" class="form-control name_list" required="" />
								</div>
								<div class="col-lg-2 mt-auto">
									<button type="button" class="btn text-success tambah_langkah">
										<i class="fas fa-plus"></i>
									</button>
									<button type="button" class="btn text-danger btn-hapus-item">
										<i class="fa fa-trash"></i>
									</button>
									<i class="fas fa-sort text-primary"></i>
								</div>
							</div>
						</div>

					</div>
					<button class="btn btn-raised btn-info btn-block rounded" type="submit" name="edit">
						Upload Artikel Tutorial
					</button>
				</form>
			</div>
		</div>

	</div>

	<script type="text/javascript" src="<?php echo base_url('assets/dropify/dist/js/dropify.min.js')?>"></script>

	<script type="text/javascript">


		$(function ()
		{
			$('.container').on('click', '.tambah', function (e)
			{
				if ($('.education_form').length >= 1)
				{
					$('.education_row .education_form').first().clone().insertAfter($('.education_row .education_form').last());
				}
			});

			$('.container').on('click', '.btn-remove-item', function (e)
			{
				if ($('.education_form').length > 1)
				{
					$(e.target).closest('.education_form').remove();
				}
			});

			$('.container').on('click', '.tambah_langkah', function (e)
			{
				if ($('.langkah_form').length >= 1)
				{
					$('.education_row .langkah_form').first().clone().insertAfter($('.education_row .langkah_form').last());
				}
			});

			$('.container').on('click', '.btn-hapus-item', function (e)
			{
				if ($('.langkah_form').length > 1)
				{
					$(e.target).closest('.langkah_form').remove();
				}
			});

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

			$( ".biji" ).sortable();
			$( ".biji" ).disableSelection();
		} );

	</script>
</body>