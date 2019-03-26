<div class="row">
	<div class="col-md-8">
		<p>
			<a href="<?= base_url('admin/calon/tambah'); ?>" class='btn btn-success btn-md'>Tambah Calon</a>
		</p>
		<?php
		if (!empty($this->session->flashdata('alert'))) {
			echo "<div class='alert alert-".$this->session->flashdata('alert')."'>".$this->session->flashdata('pesan').'</div>';	
		}
		?>
		<div class="panel panel-success">
			<div class="panel-heading">
				Daftar Calon Pemilu :v
				

			</div>
			<div class="panel-body">
				<div class="row">
					
					<?php
					if ($this->db->get('x_calon')->num_rows() == 0 ) {
						echo "<div class='alert alert-danger'>Belum ada Calon</div>";
					} else {
						foreach ($this->db->get('x_calon')->result() as $c) {
					?>
					<div class="col-md-6">
						<div class="thumbnail">
							<img style="width: 100%;" src="<?= base_url('uploads/'.$c->foto); ?>">
							<div class="caption">
								<h4><?= $c->nama; ?></h4>
								<small>NIS : <?= $c->nis; ?></small>
								<p>
									<?= $c->keterangan; ?>
								</p>
								<p>
									<a href="<?= base_url('admin/calon/hapus/'.$c->id.'/'.$c->foto); ?>" class="btn btn-danger btn-sm">Hapus</a>
								</p>
							</div>
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
</div>
<script type="text/javascript">
	CKEDITOR.replace( 'editor' );
</script>