<div class="row">
	<div class="col-md-8">
		<?php
		if (!empty($alert)) {
			echo "<div class='alert alert-".$alert."'>".$pesan.'</div>';	
		}
		?>
		<div class="panel panel-success">
			<div class="panel-heading">
				Tambah Calon Pemilu
			</div>
			<div class="panel-body">
				<form enctype="multipart/form-data" method="post" action="">
					<div class="form-group">
						<label>NIS</label>
						<input type="text" name="nis" required="required" class="form-control" maxlength="7">
					</div>
					<div class="form-group">
						<label>Foto</label>
						<input type="file" name="file" required="required" >
					</div>
					<div class="form-group">
						<label>Keterangan Lanjutan</label>
						<textarea name="keterangan" id="keterangan">
						</textarea>
					</div>
					<?php
					if (!empty($this->session->flashdata('alert'))) {
						echo "<div class='alert alert-".$this->session->flashdata('alert')."'>".$this->session->flashdata('pesan').'</div>';	
					}
					?>
					<div class="form-group">
						<div class="row">
							<div class="col-xs-6">
								<button name="submit" value="ya" class="btn btn-success btn-block btn-lg" type="submit">Tambahkan</button>
							</div>
							<div class="col-xs-6">
								<a href="<?= base_url('admin/calon'); ?>" class="btn btn-danger btn-block btn-lg">Batal / Kembali</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="alert alert-info">
			<ol>
				<li>Foto Ukuran 700x700 px</li>
				<li>Masukan NIS sesuai siswa yang dicalonkan</li>
				<li>Selain Siswa yang sudah di upload tidak dapat dicalonkan</li>
			</ol>

		</div>
	</div>

</div>
<script type="text/javascript">
	CKEDITOR.replace( 'keterangan' );
</script>