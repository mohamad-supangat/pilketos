<div class="row">
	<div class="col-md-8">
		<?php
		if ($alert=='sukses') {
		?>
		<div class="alert alert-info">Sukses Mereset</div>
		<?php
		}
		?>
		<div class="panel panel-success">
			<div class="panel-heading">
				Hasil Pemilu
				
			</div>
			<div class="panel-body">
				<div class="row">
					
					<?php
					if ($this->db->get('x_calon')->num_rows() == 0 ) {
						echo "<div class='alert alert-danger'>Belum ada Calon</div>";
					} else {
						foreach ($this->db->get('x_calon')->result() as $c) {
							$this->db->where('c_id',$c->id);
							$cek=$this->db->get('x_coblos')->num_rows();
					?>
					<div class="col-md-6">
						<div class="thumbnail">
							<img style="width: 100%;" src="<?= base_url('uploads/'.$c->foto); ?>">
							<table class="table">
								<tr>
									<td>Nama</td>
									<td><?= $c->nama;?></td>
								</tr>
								<tr>
									<td>NIS</td>
									<td><?= $c->nis;?></td>
								</tr>
								<tr>
									<td>Total Pemilih</td>
									<td><b style="color: red"><?= $cek; ?></b></td>
								</tr>
							</table>
						</div>
					</div>
					<?php
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<a href="<?= base_url('admin/home/rekap'); ?>" target='_blank' class="btn btn-lg btn-primary">Print Rekapan Siswa</a><br>
		<small>Rekapan pilihan siswa</small><hr/>
		<a href="<?= base_url('admin/home/golput'); ?>" target='_blank' class="btn btn-lg btn-warning">Print Siswa Golput</a><br>
		<small>Rekapan Siswa yang tidak memilih</small><hr/>
		<a href="<?= base_url('admin/home/reset'); ?>" onclick='return confirm("Apakah anda yakin akan mereset hasil pemilu");' class="btn btn-lg btn-danger">Print Siswa Golput</a><br>
		<small>Hapus data Pilihan</small>
	</div>
</div>