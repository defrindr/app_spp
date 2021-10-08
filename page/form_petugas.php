<?php
$simpan = $fg->post("simpan");
if ($simpan) {
	$post = $db->sanitPost();
	//dd($post);
	extract($post);
	$db->insert("petugas", "id_petugas,'$username','$password','$nama_petugas','$level'");
	$password = md5($password);
	$fg->alert("data berhasil disimpan");
	$fg->redir("?hal=petugas");
}
?>
<div class="card">
	<div class="header">
		<h3 class="card-title">Input Data Petugas</h3>
	</div>
	<div class="card-body">
		<form method="post" action="?hal=form_petugas&aksi=simpan">
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" name="password" class="form-control">
			</div>
			<div class="form-group">
				<label>Nama Petugas</label>
				<input type="text" name="nama_petugas" class="form-control">
			</div>
			<div class="form-group">
				<label>Level
				</label>
				<select class="form-control" name="Level">
					<option value="">===Pilih===</option>
					<option value="admin">Admin</option>
					<option value="petugas">Petugas</option>
				</select>
			</div>
			<div class="form-group">
				<button class="btn btn-primary" value="simpan" name="simpan" type="submit">Simpan
				</button>
				<button type="button" class="btn btn-secondary" onclick="history.back();">Back
				</button>
			</div>
		</form>
	</div>
</div>