<?php
$id = $fg->get("id");
$aksi = $fg->get("aksi");
if ($aksi == "edit") {
	$sel = $db->select("spp where id_spp='$id'");
	$row = $sel->fetch();
}
$aksi1 = $fg->post("aksi");
if ($aksi1 == "simpan") {
	$post = $db->sanitPost();
	extract($post);
	$update = $db->update("spp", "tahun='$tahun',nominal='$nominal' where id_spp='$id_spp'");
	$fg->alert("data berhasil diupdate");
	$fg->redir("?hal=spp");
}
?>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit Data SPP</h3>
	</div>
	<div class="card-body">
		<form method="post" action="?hal=form_edit_spp">
			<input type="hidden" name="id_spp" value="<?= $row['id_spp'] ?>">
			<div class="form-group">
				<label>Tahun</label>
				<input type="text" name="tahun" value="<?= $row['tahun'] ?>" class="form-control">
			</div>
			<div class="form-group">
				<label>Nominal</label>
				<input type="text" name="nominal" value="<?= $row['nominal'] ?>" class="form-control">
			</div>
			<br>
			<button class="btn btn-secondary text-warning" name="aksi" value="simpan" type="submit"><b>Simpan</b></button>
			<button type="button" class="btn btn-secondary text-warning" onclick="history.back();"><b>Back</b></button>
	</div>
	</form>
</div>
<div class="card-footer"></div>