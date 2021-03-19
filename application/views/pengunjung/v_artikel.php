<link href="<?= base_url('assets/'); ?>style_css/pengunjung/artikel.css" rel="stylesheet">
<style type="text/css">
	.card-img-top
	{
		display: block;
		width: 250px;
		height: 178px;
	}
	
	.card
	{
		font-size: 1em;
		overflow: hidden;
		padding: 0;
		border: none;
		border-radius: .28571429rem;
		box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
	}

	.card-block
	{
		font-size: 1em;
		position: relative;
		margin: 0;
		padding: 1em;
		border: none;
		border-top: 1px solid rgba(34, 36, 38, .1);
		box-shadow: none;
	}
	.card-title
	{
		font-size: 1.28571429em;
		font-weight: 700;
		line-height: 1.2857em;
	}

	.card-text
	{
		clear: both;
		margin-top: .5em;
		color: rgba(0, 0, 0, .68);
	}

	.card-footer
	{
		font-size: 1em;
		position: static;
		top: 0;
		left: 0;
		max-width: 100%;
		padding: .75em 1em;
		color: rgba(0, 0, 0, .4);
		border-top: 1px solid rgba(0, 0, 0, .05) !important;
		background: #fff;
	}
</style>
<div class="contain-artikel" id="contain-artikel">
	<div class="col-12"  id="card-artikel">
		<div class="row">
			<?php
				$query_user = $this->db->get_where('tutorial_artikel', array('id_meta !='=> $this->session->userdata('id_meta')))->result_array();

				foreach ($query_user as $row)
				{
					$meta_user = $this->db->get_where('meta_user', array('id_meta'=> $row['id_meta']))->result_array();
			?>
			<div class="col-sm-6 col-md-4 col-lg-3 mt-4">
				<div class="card">
					<img class="card-img-top" src="<?php echo base_url('./assets/img/artikel/sampul/').$row['gambar_artikel'] ?>">
					<div class="card-block">
						<h4 class="card-title text-center"><a href="<?php echo base_url('pengunjung/detail-artikel/'.$row['id_artikel']) ?>"><?php echo $row['judul_artikel'] ?></a></h4>
						<div class="card-text">
							<?php echo $row['deskripsi_artikel'] ?>
						</div>
					</div>
					<div class="card-footer">
						<span class="float-right"><?php echo date('d M Y', $row['tgl_posting_artikel']);?></span>
						<span><i class=""></i>by: <?php echo $meta_user[0]['nama_depan']; ?> <?php echo $meta_user[0]['nama_belakang']; ?></span>
					</div>
				</div>
			<?php
				}
			?>
			<!-- akhir looping -->
		</div>
	</div>
</div>