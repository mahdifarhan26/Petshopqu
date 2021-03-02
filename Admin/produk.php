<h2 class="text-center"> Data Produk</h2>
<table class="table table-bordered ">
	<thead>
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Nama</th>
			<th class="text-center">Harga</th>
			<th class="text-center">Berat</th>
			<th class="text-center">Foto</th>
			<th class="text-center">Deskripsi</th>
			<th class="text-center">Stok barang</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM produk "); ?>
		<?php while($pecah = $ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?> </td>
			
			<td>Rp.<?php echo number_format( $pecah['harga_produk']); ?></td>
			<td><?php echo $pecah['berat']; ?>(Gr)</td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="150" height="150" >
			</td>
			<td><?php echo $pecah['deskripsi']; ?></td>
			<td><?php echo $pecah['id_stok']; ?></td>
			
			<td>
				<a href="index.php?halaman=hapus_produk&id=<?php echo $pecah['id_produk'];?>"
				onclick= "return confirm('apakah anda yakin ingin menghapus produk ini ?')"
				class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubah_produk&id=<?php echo $pecah['id_produk'];?>" class="btn btn-warning">ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
	    <?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambah_produk" class="btn btn-primary">Tambah Produk</a>