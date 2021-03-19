<link rel="stylesheet" href="<?php echo base_url('assets/style_css/pengguna/diikuti.css') ?>">


<?php 

$query_teman = $this->db->get('meta_user')->result_array();
$id_diikut = $this->db->get_where('meta_user', array('id_meta' => $this->session->userdata('id_meta')))->result_array();
foreach ($id_diikut as $at) {
	$ik2 =explode(',', $at['diikuti']);

	
	foreach ($ik2 as $at2) {
			
	}

	$b = 0;
	foreach ($query_teman as $az) {
		echo $b++;
		if ($az['id_meta'] == $ik2[1]) {
			
		}else
		{
			
		}
	}
}





?>

<?php die; ?>









<div id="page-contents">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 static">
			</div>

			<div class="col-md-7">
				<div class="friend-list mt-4">
					<div class="row">
						<?php
							$query_teman = $this->db->get_where('meta_user', array('id_meta' => $this->session->userdata('id_meta')))->result_array();
							foreach ($query_teman as $row)
							{
								$array_teman = $row["diikuti"];
								//jika array teman user 1 tidak kosong
								if ($array_teman)
								{
									// Pecah array teman
									$arrayTeman = explode(",", $array_teman);
									//Pecahan array teman satu persatu akan diberi query sql
									foreach ($arrayTeman as $key)
									{
										$sql_teman = $this->db->get_where('meta_user', array('id_meta' => $key))->result_array();
										foreach ($sql_teman as $row)
										{
											$biji = $this->db->get_where('user', array('id_meta' => $row['id_meta']))->result_array();
											//Tampilkan List array teman
						?>
						<div class="col-md-6 col-sm-6">
							<div class="friend-card">
								<img src="<?php echo base_url('assets/img/background/').$row['back_image'] ?>" alt="profile-cover" class="img-responsive cover" style="width: 100%; height: 100.33px" />
								<div class="card-info">
									<img src="<?php echo base_url('assets/img/profile/').$biji[0]['image'] ?>" alt="user" class="profile-photo-lg" />
									<form name="batal_diikuti" method="post" action="<?php echo base_url('pengguna/hapus-diikuti') ?>">
										<div class="friend-info">
											<input type="submit" class="btn btn-link float-right text-green" value="Batal Ikuti" name="hapus_teman" />
											<input type="hidden" name="id_teman" value="<?php echo $row['id_meta']; ?>">
											<h5>
												<a href="" class="profile-link">
													<?php echo $biji[0]['username']; ?>
												</a>
											</h5>
											<p class="nama"><?php echo $row["nama_depan"]; ?> <?php echo $row["nama_belakang"]; ?></p>
										</div>
									</form> 
								</div>
							</div>
						</div>
						<?php
										}
									}
								}
								else
								{
								//Jika array teman user 1 kosong
						?>
						<div class="user-title"> Belum ada yang diikuti</div>
						<?php
								}
							}
						?>
					</div>
				</div>
			</div>

			<div class="col-md-2 static mt-4">
				<div class="suggestions" id="sticky-sidebar">
					<h4 class="grey">Who to Follow</h4>
						<?php
							$query_teman = $this->db->get_where('meta_user', array('id_meta' => $this->session->userdata('id_meta')))->result_array();
							foreach ($query_teman as $row)
							{
								$array_teman = $row["diikuti"];
								//jika array teman user 1 tidak kosong
								if ($array_teman)
								{
									// Pecah array teman
									$arrayTeman = explode(",", $array_teman);
									//Pecahan array teman satu persatu akan diberi query sql
									foreach ($arrayTeman as $key)
									{
										$sql_teman = $this->db->get_where('meta_user', array('id_meta !='=> $key))->result_array();
										var_dump($sql_teman);
										die();
										foreach ($sql_teman as $row)
										{
						?>
											<div class="follow-user">
												<img src="<?php echo base_url('assets/img/profile/').$biji[0]['image'] ?>" alt="" class="profile-photo-sm float-left" />
												<div>
													<h5>
														<a href=""><?php echo $row["nama_depan"]; ?> <?php echo $row["nama_belakang"]; ?></a>
													</h5>
													<form name="tambahteman" method="post" action="<?php echo base_url('pengguna/tambah-diikuti') ?>">
														<input type="submit" class="btn btn-link text-green" value="Ikuti" name="tambah_teman" />
														<input type="hidden" name="id_teman" value="<?php echo $row['id_meta']; ?>">
													</form>
												</div>
											</div>
						<?php
										}
									}
								}
							}
						?>
				</div>
			</div>
		</div>
	</div>
</div>