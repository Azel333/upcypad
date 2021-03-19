<link rel="stylesheet" href="<?php echo base_url('assets/style_css/pengguna/diikuti.css') ?>">

<div id="page-contents">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 static">
			</div>

			<div class="col-md-7">
				<div class="friend-list mt-4">
					<div class="row">
						<?php

							$query_user = $this->db->get_where('meta_user', array('id_meta !='=> $this->session->userdata('id_meta')))->result_array();

							foreach ($query_user as $row)
							{
								$id_meta=$row['id_meta'];
						?>
								<li id="list<?php echo $row['id_meta']; ?>">
									<a href="#" class="user-title"><?php echo $row['nama_depan'];?> </a>
						<?php
									$sql_cek_teman = $this->db->get_where('meta_user', array('id_meta' => $this->session->userdata('id_meta')))->result_array();
									foreach ($sql_cek_teman as $row)
									{
										$array_diikuti = $row["diikuti"];
									}
									$array_teman = explode(",", $array_diikuti);
									if (in_array($id_meta, $array_teman))
									{
						?>
									<span class="add">
										<div class="user-title">Telah Diikuti</div>
									</span>
						<?php
							}
							else
							{
						?>
								<span class="add">
									<form name="tambahteman" method="post" action="<?php echo base_url('pengguna/tambah-diikuti') ?>">
										<input type="submit" class="greenButton" value="Ikuti" name="tambah_teman" />
										<input type="hidden" name="id_teman" value="<?php echo $id_meta; ?>">
									</form>
								</span>
					</li>
					<?php
							}
						}
					?>
					</div>
				</div>
			</div>

			<div class="col-md-2 static">
			</div>
		</div>
	</div>
</div>