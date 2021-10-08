<?php
$simpan = $fg->post("simpan");
if ($simpan == "Bayar") {
	$post = $db->sanitPost();
	extract($post);
	$sel = $db->select("siswa a,spp b where a.nisn='$nisn' and a.id_spp=b.id_spp");
	$row1 = $sel->fetch();
	$id_petugas = $_SESSION['id_petugas'];
	$id_spp = $row1['id_spp'];
	$jumlah_bayar = $row1['nominal'];
	$insert = $db->insert("pembayaran", "null, '$id_petugas','$nisn','now(),'$bulan_bayar','$tahun_bayar','$id_spp','$jumlah_bayar'");
	if ($insert) {
		$fg->alert("Penyimpanan berhasil");
		$fg->redir("?hal=laporan");
	}
}
?>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Form Pembayaran</h3>
	</div>
	<div class="card-body">
		<form method="post" action="?hal=pembayaran">
			<div class="form-group">
				<label>Cari Data Siswa</label>
				<select name="nisn" id="nisn" class="form-control">
					<option value="">Pilih Siswa</option>
					<?php
					$sel = $db->select("siswa");
					while ($row = $sel->fetch()) {
					?>
						<option value="<?= $row['nisn'] ?>"><?= $row['nama'] ?></option>
					<?php
						//code...
					}
					?>
				</select>
			</div>

			<div class="form-group">
				<label>Pembayaran Bulan</label>
				<select name="bulan_bayar" class="form-control" id="bulan_bayar">
					<option value="Januari">Januari</option>
					<option value="Februari">Februari</option>
					<option value="Maret">Maret</option>
					<option value="April">April</option>
					<option value="Mei">mei</option>
					<option value="Juni">Juni</option>
					<option value="Juli">Juli</option>
					<option value="Agustus">Agustus</option>
					<option value="September">September</option>
					<option value="Oktober">Oktober</option>
					<option value="November">November</option>
					<option value="Desember">Desember</option>
				</select>
			</div>
			<div class="form-group">
				<label>Tahun</label>
				<select name="tahun_bayar" class="form-control" id="tahun_bayar">
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
				</select>
			</div>
			<input type="submit" name="simpan" value="Bayar" class="btn btn-primary">
		</form>
	</div>
</div>