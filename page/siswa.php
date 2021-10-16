<?php
	$aksi = $fg->get("aksi");
	$nisn = $fg->get("nisn");
	if($aksi=="hapus"){
		$db->delete("siswa where nisn = $nisn");
		$fg->redir("?hal=siswa");
	}
?>

<div class="card">
	<div class="card-header">
		<h3>Data Siswa</h3>
		<a href="?hal=form_siswa" class="btn btn-primary">Tambah Data</a>
	</div>
	<div class="card-body">
		<table class="table">
			<tr>
				<th>No</th>
				<th>NISN</th>
				<th>NIS</th>
				<th>Nama Siswa</th>
				<th>Kelas</th>
				<th>Alamat</th>
				<th>No Telp</th>
				<th>SPP (Rp.)</th>
				<th>Aksi</th>
			</tr>
			<?php
				$sel = $db->select("siswa a, kelas b,spp c where a.id_kelas=b.id_kelas and a.id_spp = c.id_spp","a.*,b.nama_kelas,c.nominal");
				$no=0;
				
				// dd($sel);
				while($row=$sel->fetch()){
					$no++;
					?>
					<tr>
						<td><?=$no?></td>
						<td><?=$row['nisn']?></td>
						<td><?=$row['nis']?></td>
						<td><?=$row['nama']?></td>
						<td><?=$row['nama_kelas']?></td>
						<td><?=$row['alamat']?></td>
						<td><?=$row['no_telp']?></td>
						<td><?=$row['nominal']?></td>
						<td>
							<a class="btn btn-warning" href="?hal=form_edit_siswa&nisn=<?=$row['nisn']?>&aksi=edit">Edit</a>
							<a class="btn btn-danger" href="?hal=siswa&nisn=<?=$row['nisn']?>&aksi=hapus" onclick="return confirm('Yakin akan dihapus?');">Hapus</a>
						</td>
					</tr>
					<?php
				}
			
			?>
		</table>
	</div>
	<div class="card-footer">

	</div>
