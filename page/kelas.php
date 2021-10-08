<?php
$aksi = $fg->get("aksi");
$id = $fg->get("id");
if ($aksi == "hapus") {
	$db->delete("kelas where id_kelas = $id");
	$fg->redir("?hal=kelas");
}
?>

<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data Kelas</h3>
		<a href="?hal=form_kelas" class="btn btn-primary ">Tambah Kelas</a>
		<div>
			<div class="card-body">
				<table class="table">
					<tr>
						<th>Id Kelas</th>
						<th>Nama Kelas</th>
						<th>Kompetensi keahlian</th>
						<th>Aksi</th>
					</tr>
					<?php
					$sel = $db->select("kelas");
					$no = 0;
					while ($row = $sel->fetch()) {
						$no++;
					?>
						<tr>
							<td><?= $no ?></td>
							<td><?= $row['nama_kelas'] ?></td>
							<td><?= $row['kompetensi_keahlian'] ?></td>
							<td>
								<a class="btn btn-warning" href="?hal=form_edit_kelas&id=<?= $row['id_kelas'] ?>&aksi=edit">Edit</a>
								<a class="btn btn-danger" href="?hal=kelas&id=<?= $row['id_kelas'] ?>&aksi=hapus" onclick="return confirm('Yakin akan dihapus?');">HAPUS</a>
							</td>
						</tr>

					<?php


					}

					?>

				</table>
			</div>
		</div>