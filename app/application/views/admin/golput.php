<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<h2>Daftar Siswa Golput / Tidak Memilih</h2>
	<table class="table">
		<thead>
			<tr>
				<th>No.</th>
				<th>NIS</th>
				<th>Nama</th>
				<th>Kelas</th>
			</tr>
		</thead>
		<tbody>
			<?php
						$this->db->where('nis != 0000');
						$q=$this->db->get('x_login	');
						$i=0;
						foreach ($q->result() as $s) {
							$this->db->where('nis',$s->nis);
							if ($this->db->get('x_coblos')->num_rows() == 0) {
							$i++;
						?>
						<tr>
							<td><?= $i; ?></td>
							<td><?= $s->nis ;?></td>
							<td><?= $s->nama ;?></td>
							<td><?= $s->kelas.' '.$s->jurusan ;?></td>
						</tr>
						<?php 
						} }
						?>						
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		window.print();
	})
</script>