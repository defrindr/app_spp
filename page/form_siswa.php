<?php
$simpan = $fg->post("simpan");
if ($simpan == "simpan") {
	$post = $db->sanitPost();
	extract($post);
	$db->insert("siswa", "'$nisn','$nis','$nama_siswa','$id_kelas','$alamat','$no_telp','$id_spp'");
	$fg->alert("data berhasil disimpan");
	$fg->redir("?hal=siswa");
}
?>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Input Data Siswa</h3>
	</div>
	<div class="card-body">
		<form method="post" action="?hal=form_siswa">
			<div class="form-group">
				<label>NISN</label>
				<input type="text" name="nisn" class="form-control">
			</div>
			<div class="form-group">
				<label>NIS</label>
				<input type="text" name="nis" class="form-control">
			</div>
			<div class="form-group">
				<label>NAMA SISWA</label>
				<input type="text" name="nama_siswa" class="form-control">
			</div>
			<div class="form_group">
				<label>KELAS</label>
				<select name="id_kelas" class="form-control">
					<option value="">pilihkelas</option>
					<?php
					$sel = $db->select("kelas");
					while ($rowkelas = $sel->fetch()) {
					?>
						<option value="<?= $rowkelas['id_kelas'] ?>">
							<?= $rowkelas['nama_kelas'] ?></option>
					<?php
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>ALAMAT</label>
				<input type="text" name="alamat" class="form-control">
			</div>
			<div class="form-group">
				<label>NO.TELP</label>
				<input type="text" name="no_telp" class="form-control">
			</div>
			<div class="form-group">
				<label>SPP</label>
				<select type="text" name="id_spp" class="form-control">
					<?php
					$selspp = $db->select("spp");
					while ($rowspp = $selspp->fetch()) {
					?>
						<option value="<?= $rowspp['id_spp'] ?>"><?= $rowspp['tahun'] . " / " . $rowspp['nominal']
																	?></option>
					<?php

					}
					?>
				</select>
			</div>
			<div class="form_group">
				<button type="submit" name="simpan" value="simpan" class="btn btn-primary">Simpan</button>
				<button type="button" onclick="history.back();" class="btn btn-secondary">Back</button>
			</div>
		</form>
	</div>
	<div class="card-footer">

	</div>
</div>