<div class="card">
	<div class="card-header">
		<h3 class="card-title">Hasil Pembayaran</h3>
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>NISN</th>
					<th>Nama</th>
					<th>Kelas</th>
					<th>Tanggal Bayar</th>
					<th>Bulan/tahun</th>
					<th>SPP(Rp)</th>
					<th>Petugas</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$sel=$db->select("siswa a, siswa b, pembayaran c, spp d,mpetugas e where a.id_kelas=b.id_kelas and a.nisn=c.nisn and c.id_spp=a.id_spp and a.id_spp=d.id_spp and c.id_petugas=e.id_petugas");
				$no=0
				while ($row=$sel->fetch()) {
					$no++;
					?>
					<tr>
					<td><?=$no?></td>
					<td><?=$row['nisn']?></td>
					<td><?=$row['nama']?></td>
					<td><?=$row['nama_kelas']?></td>
					<td><?=$row['tgl_bayar']?></td>
					<td><?=$row['bulan_dibayar']?>/<?=$row['tahun_dibayar']?></td>
					<td><?=$row['nominal']?></td>
					<td><?=$row['nama_petugas']?></td>

					<td><a href="#" class="btn btn-primary">Cetak</a></td>
				</tr>
				<?php
				// code...

				}
			?>

		</tbody>
	</table>
</div>
</div>