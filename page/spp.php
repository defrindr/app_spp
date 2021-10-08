<?php
$aksi = $fg->get("aksi");
$id = $fg->get("id");
if ($aksi == "hapus") {
	$db->delete("spp where id_spp = $id");
	$fg->redir("?hal=spp");
}
?>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Data SPP</h3>
		<a href="?hal=form_spp" class="btn btn-primary"> Tambah SPP</a>
	</div>
	<div class="card-body">
		<table class="table">
			<tr>
				<th>id_spp</th>
				<th>Tahun</th>
				<th>Nominal</th>
				<th>Aksi</th>
			</tr>

			<?php
			$sel = $db->select("spp");
			$no = 0;
			while ($row = $sel->fetch()) {
				$no++;
			?>
				<tr>
					<td><?= $no ?></td>
					<td><?= $row['tahun'] ?></td>
					<td><?= $row['nominal'] ?></td>
					<td>
						<a class="btn btn-warning" href="?hal=form_edit_spp&id=<?= $row['id_spp'] ?>&aksi=edit">Edit</a>
						<a class="btn btn-danger" href="?hal=spp&id=<?= $row['id_spp'] ?>&aksi=hapus" onclick="return confirm('Yakin akan dihapus?');">HAPUS</a>
					</td>
				</tr>

			<?php


			}

			?>
		</table>
	</div>
</div>