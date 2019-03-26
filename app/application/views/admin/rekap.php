<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<h2>Hasil Rekap Siswa</h2>
	<table class="table">
		<thead>
			<tr>
				<th>No.</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Kelas</th>
				<th>Pilihan</th>
			</tr>
		</thead>
		<tbody>
			<?php
						$this->db->where('nis != 0000');
						$q=$this->db->get('v_coblos	');
						$i=0;
						foreach ($q->result() as $s) {
							$i++;
						?>
						<tr>
							<td><?= $i; ?></td>
							<td><?= $s->nis ;?></td>
							<td><?= $s->nama ;?></td>
							<td><?= $s->kelas.' '.$s->jurusan ;?></td>
							<td><?= $s->nama_calon;?></td>
						</tr>
						<?php 
						}
						?>						
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		window.print();
	})
</script>