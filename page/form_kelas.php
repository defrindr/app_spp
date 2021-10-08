<?php
	$simpan=$fg->post("aksi");
	if($simpan=="simpan")
	{
		$post=$db->sanitPost();
		extract($post);
		if($nama_kelas != null && $kompetensi_keahlian != null) {
			$ins=$db->insert("kelas","null,'$nama_kelas','$kompetensi_keahlian'");	
			$fg->alert("simpan berhasil");
			$fg->redir("?hal=kelas");
		}
	}
?>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Input Data Kelas</h3>
	</div>
	<div class="card-body">
		<form method="post" action="?hal=form_kelas&aksi=simpan">
			<input type="hidden" name="aksi" value="simpan">
			<div class="form-group">
				<label>Nama Kelas</label>
				<input type="text" name="nama_kelas" class="
				form-control">
			</div>
			<div class="form-group">
				<label>Kompetensi Keahlian</label>
				<select name="kompetensi_keahlian" class="
				form-control">
					<option value="">==Pilih Kompetensi Keahlian==</option>
					<option value="RPL">RPL</option>
					<option value="MM">MM</option>
					<option value="AKL">AKL</option>
					<option value="OTKP">OTKP</option>
					<option value="BDP">BDP</option>
				</select>
			</div>
			<div class="form-group">
				<button class="btn btn-primary" value="Simpan"type="submit">Simpan</button>
				<button type="button" class="btn btn-secondary"onclick="history.back();">Back</button>
			</div>
		</form>
	</div>
	<div class="card-footer"></div>
</div>
