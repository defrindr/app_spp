<?php
$nisn = $fg->get("nisn");
$aksi = $fg->get("aksi");
if ($aksi == "edit") {
	$sel = $db->select("siswa where nisn = '$nisn'");
	$row = $sel->fetch();
}
$aksi1 = $fg->post("aksi");
if ($aksi1 == "simpan") {
	$post = $db->sanitPost();
	extract($post);
	$update = $db->update("siswa", "nama='$nama',id_kelas='$id_kelas',alamat='$alamat',no_telp='$no_telp', id_spp='$id_spp' where nisn = '$nisn'");
	$fg->alert("data berhasil di update");
	$fg->redir("?hal=siswa");
}
?>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit Data Siswa</h3>
	</div>
	<div class="card-body">
		<form method="post" action="?hal=form_edit_siswa">
			<input type="hidden" name="nisn" value="<?= $row['nisn'] ?>">
			<div class="form-group">
				<label>NIS</label>
				<input type="text" name="nis" value="<?= $row['nis'] ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Nama Siswa</label>
				<input type="text" name="nama" value="<?= $row['nama'] ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Kelas</label>
				<select name="id_kelas" class="form_control">
					<option value="">==pilih kelas==</option>
					<?php
					$sel = $db->select("kelas");
					while ($rowkelas = $sel->fetch()) {
						if ($rowkelas['id_kelas'] == $row['id_kelas']) {
					?>
							<option value="<?= $rowkelas['id_kelas'] ?>" selected="selected"><?= $rowkelas['nama_kelas'] ?></option>
						<?php
						} else {
						?>
							<option value="<?= $rowkelas['id_kelas'] ?>">
								<?= $rowkelas['nama_kelas'] ?></option>
					<?php
						}
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<input type="text" name="alamat" class="form-control" value="<?= $row['alamat'] ?>">
			</div>
			<div class="form-group">
				<label>No.Telp</label>
				<input type="text" name="no_telp" class="form-control" value="<?= $row['no_telp'] ?>">
			</div>
			<div class="form-group">
				<label>SPP</label>
				<select name="id_spp" class="form-control">
					<option value="">==pilih spp==</option>
					<?php
					$selspp = $db->select("spp");
					while ($rowspp = $selspp->fetch()) {
						if ($rowspp['id_spp'] == $row['id_spp']) {
					?>
							<option value="<?= $rowspp['id_spp'] ?>" selected><?= $rowspp['tahun'] . " / " . $rowspp['nominal'] ?></option>
						<?php
						} else {
						?>
							<option value="<?= $rowspp['id_spp'] ?>"><?= $rowspp['tahun'] . " / " . $rowspp['nominal']
																		?></option>
					<?php
						}
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<button type="submit" name="aksi" value="simpan" class="btn btn-primary">Simpan</button>
				<button type="button" onclick="history.back();" class="btn btn-warning">Back</button>
			</div>
		</form>
	</div>
	<div class="card-footer"></div>
</div>