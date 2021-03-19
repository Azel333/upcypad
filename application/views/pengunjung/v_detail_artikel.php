<style type="text/css">
	.card-img-top
	{
		display: block;
		width: 100%;
		height: 300px;
	}
</style>
<div class="container">
	<?php
			if ($artikel['id_meta'] == $this->session->userdata('id_meta'))
			{
				echo "biji";
			}
			else
			{
				?>

				<div class="row justify-content-md-center">
					<div class="col-lg-8" style="top: 80px;">
						<img class="card-img-top" src="<?php echo base_url('./assets/img/artikel/sampul/').$artikel['gambar_artikel'] ?>">
						<h4 class="card-title" style="font-weight: 900;font-size: 36px;color: #8bad00;"><?php echo $artikel['judul_artikel'] ?></h4>
						<div style="font-size: 1.2em;line-height: 1.3;">
							<?php echo $artikel['deskripsi_artikel'] ?>
						</div>
						<hr>
						<h2 style="font-size: 24px;color: #ccc9bc;">Alat dan Bahan</h2>
						<?php
							$alat = $this->db->get_where('alat_bahan_artikel', array('id_artikel'=> $artikel['id_artikel']))->result_array();

							foreach ($alat as $row)
							{
						?>
							<div style="padding: 5px 0;line-height: 1.2;margin-bottom: .1em;"><?php echo $row['alat_bahan']; ?></div>
						<?php
							}
						?>
						<br>
						<br>
						<h2 style="font-size: 24px;color: #ccc9bc;">Langkah Pembuatan</h2>
						<?php
							$alat = $this->db->get_where('langkah_artikel', array('id_artikel'=> $artikel['id_artikel']))->result_array();

							foreach ($alat as $row)
							{
								$gambar = $this->db->get_where('gambar_artikel', array('id_gambar_langkah'=> $row['id_langkah']))->row_array();
						?>
							<div class="row" style="padding: 5px 0;line-height: 1.2;margin-bottom: .1em;">
								<img class="img-thumnail" style="width: 250px;height: 250px;" src="<?php echo base_url('./assets/img/artikel/langkah/').$gambar['gambar_langkah'] ?>">
								<?php
								echo $row['langkah']; ?>
							</div>
						<?php
							}
						?>
					</div>
				</div>

				<?php
			}
		?>
		<!-- akhir looping -->
</div>