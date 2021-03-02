<h2 class="text-center">Selamat Datang Administrator</h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No.</th>
			<th>Username</th>
			<th>Password</th>
			<th>Nama Admin</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $koneksi = $ambil = $koneksi->query("SELECT * FROM admin  "); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['username']; ?></td>
			<td><?php echo $pecah['password']; ?></td>
			<td><?php echo $pecah['Nama_admin']; ?></td>
			
		</tr>
		<?php $nomor++; ?>
	<?php } ?>
	</tbody>
</table>