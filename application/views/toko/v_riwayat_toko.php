<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


<din class="container text-center">
	<div class="row">
		<div class="col-12">
			<table class="table table-hover">

			  <thead>
			    <tr>
					<th scope="col">#</th>
					<th scope="col">Nama Pembeli</th>
					<th scope="col">Nama Produk</th>
					<th scope="col">jumlah Beli</th>
					<th scope="col">Waktu Pembelian</th>
					<th scope="col">Lokasi</th>
					<th scope="col">Status</th>
			    </tr>
			  </thead>
<?php foreach ($produk as $pd): ?>
			  <tbody>
			    <tr>
					<th scope="row">1</th>
					<td>Tedi</td>
					<td><?= $pd['nama_produk'];?></td>
					<td>2</td>
					<td>11/11/2018-16:00</td>
					<td>Cipinang, jak-tim</td>
					<td>
						<a href="" class="badge badge-primary">Packing</a>
						<a href="" class="badge badge-primary">Pengiriman</a>
						<a href="" class="badge badge-success">Terkirim</a>
					</td>
			    </tr>
<?php endforeach; ?>

			</table>
		</div>
	</div>
</din>


