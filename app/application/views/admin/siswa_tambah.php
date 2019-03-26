
<div class="row">
	<div class="col-md-8">
		<div class="panel panel-success">
			<div class="panel-heading">
				Tambah Siswa
			</div>
			<div class="panel-body">
				<div class="alert alert-info">
					<b>!!! Tutorial Import Data</b>
					<p>
						<ol>
							<li>Download Sample Format File excel untuk import</li>
							<li>Masukan data sesuai kolom </li>
							<li>Jangan memebuat kolom baru</li>
							<li>Simpan file dengan format <b><h4>.xlxs</h4></b></li>
							<li>Password yan digunakan adalah nama siswa huruf BESAR <b>TanpaSepasi</b><br><small>ex : MOHAMADSUPANGAT</small></li>
						</ol>
					</p>
				</div>
				<form enctype="multipart/form-data" method="post" action="<?= base_url('admin/siswa/proses_tambah'); ?>">
					<?php
					if (!empty($this->session->flashdata('alert'))) {
						echo "<div class='alert alert-".$this->session->flashdata('alert')."'>".$this->session->flashdata('pesan').'</div>';	
					}
					?>
					<div class="form-group">
						<a href="<?= base_url('format_siswa.xlsx'); ?>" class="btn btn-primary">Download Format Data Siswa </a>
					</div>
					<div class="form-group">
						<label>File Data Siswa :</label>
						<input type="file" name="file" required="required">
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<button class="btn btn-success btn-block btn-lg" type="submit">Import</button>
							</div>
							<div class="col-xs-6">
								<a href="<?= base_url('admin/siswa'); ?>" class="btn btn-danger btn-block btn-lg">Batal / Kembali</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	CKEDITOR.replace( 'keterangan' );
</script>