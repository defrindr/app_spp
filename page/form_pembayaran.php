<?php

	$simpan= $fg->post("simpan");
	if ($simpan=="Bayar") {
		// code...
		$post=$db->sanitPost();
		extract($post);
		$id_petugas=$_SESSION['id_petugas'];
		$sel=$db->select("siswa a, spp b where a.id_spp=b.id_spp and a.nisn='$nisn'","a.*, b.*");
		$rowl=$sel->fetch();
		$id_spp=$row1['id_spp'];
		$nominal=$row1['nominal'];
		$tanggal=date("Y-m-d");
		if ($sel=$db->insert("pembayaran","null,'$id_petugas','$nisn','$tanggal','$bulan_dibayar','$tahun_dibayar','$id_spp','$nominal'"))
		{
			$objF->alert("pembayaran berhasil dicatat");
			$objF->redir("?hal=laporan");
		}
	}
?>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Form Pembayaran</h3>
	</div>
	<div class="card-body">
		<form method="post" action="?hal=form_pembayaran">
			<div class="form-group">
				<label>Pilih Siswa</label>
				<select name="nisn" id="nisn" class="form-control">
					<option value="">--Silahkan pilih siswa</option>
					<?php
						$sel=$db->select("siswa");
						while ($row=$sel->fetch()) {
							// code...
							?>
							<option value="<?=$row['nisn']?>"><?=$row['nama']?></option>
							<?php
						}
					?>
				</select> 
			</div>
			<div class="form-group">
				<label>Pembayaran Bulan</label>
				<select name="bulan_dibayar" class="form-control" id="bulan_dibayar">
					<option value="">Silahkan Pilih Bulan</option>
					<option value="1">Januari</option>
					<option value="2">Februari</option>
					<option value="3">Maret</option>
					<option value="4">April</option>
					<option value="5">Mei</option>
					<option value="6">Juni</option>
					<option value="7">Juli</option>
					<option value="8">Agustus</option>
					<option value="9">September</option>
					<option value="10">Oktober</option>
					<option value="11">November</option>
					<option value="12">Desember</option>
				</select>
			</div>
			<div class="form-group">
				<label>Tahun</label>
				<select name="tahun_dibayar" class="form-control" id="tahun_dibayar">
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
				</select>
			</div>

			<input type="submit" name="simpan" value="bayar" class="btn btn-primary">
		</form>
	</div>
</div>