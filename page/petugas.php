<?php
$aksi = $fg->get("aksi");
$id = $fg->get("id");
if ($aksi == "hapus") {
	$db->delete("petugas where id_petugas = $id");
	$fg->redir("?hal=petugas");
}
?>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Petugas</h3>
		<a href="?hal=form_petugas" class="btn btn-primary"> Tambah Petugas</a>
	</div>
	<div class="card-body">
		<table class="table">
			<tr>
				<th>id_petugas</th>
				<th>Username</th>
				<th>Password</th>
				<th>Nama_Petugas</th>
				<th>Level</th>
				<th>Aksi</th>
			</tr>
			<tr>

				<?php
				$sel = $db->select("petugas");
				$no = 0;
				while ($row = $sel->fetch()) {
					$no++;
				?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $row['username'] ?></td>
				<td><?= $row['password'] ?></td>
				<td><?= $row['nama_petugas'] ?></td>
				<td><?= $row['level'] ?></td>
				<td>
					<a class="btn btn-warning" href="?hal=form_edit_petugas&id=<?= $row['id_petugas'] ?>&aksi=edit">Edit</a>
					<a class="btn btn-danger" href="?hal=petugas&id=<?= $row['id_petugas'] ?>&aksi=hapus" onclick="return confirm('Yakin akan dihapus?');">HAPUS</a>
				</td>
			</tr>

		<?php


				}

		?>
		</tr>
		</table>
	</div>