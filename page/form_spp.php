<?php
$simpan = $fg->post("simpan");
if ($simpan == "simpan") {
	$post = $db->sanitPost();
	// dd($post);
	extract($post);
	$db->insert("spp", "'id_spp','$tahun','$nominal'");
	$fg->alert("data berhasil disimpan");
	$fg->redir("?hal=spp");
}
?>
<div class="card">
	<div class="header">
		<h3>Input Data SPP</h3>
	</div>
	<div class="card-body">
		<form method="POST" action="
		?hal=form_spp&aksi=simpan">
			<div class="form-group">
				<label>Tahun</label>
				<input type="text" name="tahun" class="
				form-control">
			</div>
			<div class="form-group">
				<label>Nominal</label>
				<input type="text" name="nominal" class="
				form-control">
			</div>
			<button class="btn btn-primary" name="simpan" value="simpan">Simpan</button>
			<button class="btn btn-secondary" onclick="
			history.back();">Back</button>
		</form>
	</div>


</div>