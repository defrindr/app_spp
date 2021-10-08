<?php
$id = $fg->get("id");
$aksi = $fg->get("aksi");
if ($aksi == "edit") {
	$sel = $db->select("petugas where id_petugas='$id'", "*");
	$row = $sel->fetch();
	// dd($row);
}
$aksi1 = $fg->post("aksi");
if ($aksi1 == "simpan") {
	$post = $db->sanitPost();
	extract($post);
	$update = $db->update("petugas", "username='$username',password='$password',nama_petugas='$nama_petugas',level='$level' where id_petugas='$id_petugas'");
	$fg->alert("data berhasil diupdate");
	$fg->redir("?hal=petugas");
}
?>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit Data Petugas</h3>
	</div>
	<div class="card-body">
		<form method="post" action="?hal=form_edit_petugas">
			<input type="hidden" name="id_petugas" value="<?= $row['id_petugas'] ?>">
			<div class="form-group">
				<label><b>Username</b></label>
				<input type="text" name="username" class="form-control"  value="<?= $row['username'] ?>">
			</div>
			<div class="form-group">
				<label><b>Password</b></label>
				<input type="text" name="password" class="form-control"  value="<?= $row['password'] ?>">
			</div>
			<div class="form-group">
				<label><b>Nama Petugas</b></label>
				<input type="text" name="nama_petugas" class="form-control"  value="<?= $row['nama_petugas'] ?>">
			</div>
			<div class="form-group">
				<label><b>Level</b></label>
				<select class="form-control" name="level">
					<option value=""></option>
					<option value="admin">Admin</option>
					<option value="petugas">Petugas</option>
				</select>
			</div>
			<br>
			<div class="form-group">
				<button class="btn btn-secondary text-warning" name="aksi" value="simpan" type="submit"><b>Simpan</b></button>
				<button type="button" class="btn btn-secondary text-warning" onclick="history.back();"><b>Back</b></button>
			</div>
		</form>
	</div>
	<div class="card-footer"></div>