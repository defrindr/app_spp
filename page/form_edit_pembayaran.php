<?php
	$id=$fg->get("id");
	$aksi=$fg->get("aksi");
	if($aksi=="edit"){
		$sel=$db->select("tb_pembayaran where id_pembayaran='$id'");
		$row=$sel->fetch();
	}
	$aksi1 =$fg->post("aksi");
	if($aksi1=="simpan"){
		$post=$db->sanitPost();
		extract($post);
		$update=$db->update("tb_pembayaran", "nama_petugas='$nama_petugas
			',nisn='$nisn',tanggal_bayar='$tanggal_bayar',bulan_bayar='$bulan_bayar',tahun_bayar='$tahun_bayar',nominal='$nominal',jumlah_bayar='$jumlah_bayar' where id_pembayaran='$id_pembayaran'");
		$fg->alert("data berhasil diupdate");
		$fg->redir("?hal=pembayaran");
	}
?>
<div class="card">
	<div class="card-header">
		<h3 class="card-title"><b>Edit Data Pembayaran</b></h3>
	</div>
	<div class="card-body">
		<form method="post" action="?hal=edit_pembayaran">
			<input type="hidden" name="id_pembayaran" value="<?=$row['id_pembayaran']?>">
			<div class="form-group">
			<label><b>Nama Petugas</b></label>
			<select name="id_petugas" value="<?=$row['id_petugas']?>" class="form-control">
				<option value=""></option>
				<?php
					$sel =$db->select("tb_petugas");
					while ($rowpetugas = $sel->fetch()){
				?>
				<option value="<?=$rowpetugas['id_petugas']?>">
					<?=$rowpetugas['nama_petugas']?></option>
				<?php
					}
				?>
			</select>
		    </div>
			<div class="form-group">
			<label><b>NISN</b></label>
			<select name="nisn" value="<?=$row['nisn']?>" class="form-control">
				<option value=""></option>
				<?php
					$sel =$db->select("tb_siswa");
					while ($rowsiswa = $sel->fetch()){
				?>
				<option value="<?=$rowsiswa['nisn']?>">
					<?=$rowsiswa['nisn']?></option>
				<?php
					}
				?>
			</select>
		    </div>
		    <br>
			<div class="form-group">
		   		<label><b>Tanggal Bayar</b></label>
   			 	<input type="number" maxlength="4" name="tanggal_bayar" value="<?=$row['tanggal_bayar']?>"class="form-group">
	 		</div>
	 		<br>
			<div class="form-group">
				<label><b>Bulan Bayar</b></label>
				<select name="bulan_bayar" value="<?=$row['bulan_bayar']?>" class="form-group">
				<option value="01">Januari</option>
				<option value="02">Februari</option>
				<option value="03">Maret</option>
				<option value="04">April</option>
				<option value="05">Mei</option>
				<option value="06">Juni</option>
				<option value="07">Juli</option>
				<option value="08">Agustus</option>
				<option value="09">Sepember</option>
				<option value="10">Oktober</option>
 				<option value="11">November</option>
				<option value="12">Desember</option>
			</select>
			</div>
			<br>
			<div class="form-group">
				<label><b>Tahun Bayar</b></label>
				<input type="number" maxlength="4" name="tahun_bayar" value="<?=$row['tahun_bayar']?>" class="form-group">
			</div>
			<br>
			<div class="form-group">
			<label><b>SPP</b></label>
			<select name="id_spp" value="<?=$row['id_spp']?>" class="form-control">
				<option value=""></option>
				<?php
				$selspp= $db->select("tb_spp");
				while($rowspp=$selspp->fetch()){
				?>
				<option value="<?=$rowspp['id_spp']?>"><?=$rowspp['tahun']." / ".$rowspp['nominal']?></option>
				<?php
					}
				?>
			</select>
			</div>
			<div class="form-group">
				<label><b>Jumlah Bayar</b></label>
				<input type="text" name="jumlah_bayar" value="<?=$row['jumlah_bayar']?>" class="form-control">
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


