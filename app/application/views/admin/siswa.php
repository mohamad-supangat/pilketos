<div class="row">
	<div class="col-md-8">
		<p>
			<a href="<?= base_url('admin/siswa/tambah'); ?>" class='btn btn-success btn-md '>Tambah Siswa</a>
			<a href="<?= base_url('admin/siswa/reset'); ?>" class='btn btn-danger btn-md '>Reset Siswa</a>
		</p>
		<?php
			if (!empty($this->session->flashdata('alert'))) {
				echo "<div class='alert alert-".$this->session->flashdata('alert')."'>".$this->session->flashdata('pesan').'</div>';	
			}
		?>
		<div class="panel panel-success">
			<div class="panel-heading">
				Daftar Siswa :v
		
			</div>
			<div class="panel-body">
				<table class="table" id="table">
					<thead>
						<tr>
							<th>No.</th>
							<th>NIS</th>
							<th>Nama</th>
							<th style="width: 15%">Kelas & Jurusan</th>
						</tr>

					</thead>
					<tbody>
					<?php
						$this->db->where('nis != 0000');
						$q=$this->db->get('x_login');
						$i=0;
						foreach ($q->result() as $s) {
							$i++;
						?>
						<tr>
							<td><?= $i; ?></td>
							<td><?= $s->nis ;?></td>
							<td><?= $s->nama ;?></td>
							<td><?= $s->kelas.' '.$s->jurusan ;?></td>
						</tr>
						<?php 
						}
						?>						

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
  $(function () {
    $('#table').DataTable()
    $('#tabale').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>