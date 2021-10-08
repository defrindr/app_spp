<?php
	$id=$fg->get("id");
	$aksi=$fg->get("aksi");
	if($aksi=="edit"){
		$sel=$db->select("kelas where id_kelas='$id'");
		$row=$sel->fetch();
	}
	$aksi1 =$fg->post("aksi");
	if($aksi1=="simpan"){
		$post=$db->sanitPost();
		extract($post);
		$update=$db->update("kelas", "nama_kelas='$nama_kelas',kompetensi_keahlian='$kompetensi_keahlian' where id_kelas='$id_kelas'");
		$fg->alert("data berhasil diupdate");
		$fg->redir("?hal=kelas");
	}
?>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit Data Kelas</h3>
	</div>
	<div class="card-body">
		<form method="post" action="?hal=edit_kelas">
			<input type="hidden" name="id_kelas" value="<?=$row['id_kelas']?>">
			<div class="form-group">
				<label>Nama Kelas</label>
				<input type="text" name="nama_kelas" value="<?=$row['nama_kelas']?>" class="form-control">
			</div>
			<br>
			<div class="form-group">
				<label>Kompetensi Keahlian</label>
				<select name="kompetensi_keahlian" value="<?=$row['kompetensi_keahlian']?>" class="form-control">
					<option value=""></option>
					<option value="RPL">Rekayasa Perangkat Lunak</option>
					<option value="MM">MultiMedia</option>
					<option value="AKL">Akuntansi Keuangan Lembaga</option>
					<option value="OTKP">Otomatisasi Tata Kelola Perkantoran</option>
					<option value="BDP">Bisnis Daring Pemasaran </option>
				</select>
			</div>
	<br>
	<div class="form-group">
		<button class="btn btn-secondary text-warning" name="aksi" value="simpan" type="submit"><b>Simpan</b></button>
		<button type="button" class="btn btn-secondary text-warning" onclick="history.back();"><b>Back</b></button>
		</div>
	</form>
</div>
</div>
<div class="card-footer"></div>


