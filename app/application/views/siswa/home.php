<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
	<div class="col-md-8">
		<div class="jumbotron" style=" display:none;padding: 20px 25px">
			<h1 class="title">Pemilahan Ketua Osis</h1>
			<p>lihat kampanye para Calon Dulu :v </p>
		</div>
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
	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h1 class="panel-title">
					Lembar Pemilihan
				</h1>
			</div>
			<div class="panel-body">
				<form method="post" action="">
					<div class="form-group">
						<label>Nomer Induk Siswa</label>
						<input type="text" name="nis" class="form-control" value="<?= $a->nis; ?>" required="required" maxlength="7" readonly="readonly">
					</div>
					<div class="form-group">
						<label>Nama Pemilih</label>
						<input type="text" name="nama" class="form-control" value="<?= $a->nama; ?>" required="required" maxlength="7" readonly="readonly">

					</div>
					<div class="form-group">
						<label>Pilih Calon</label>
						<table class="table">
						<?php
						foreach ($this->db->get('x_calon')->result() as $c) {
						?>
						<tr>
							<td><input type="radio" name="calon" value="<?= $c->id; ?>"></td>
							<td><?= $c->nama; ?></td>
						</tr>
						<?php } ?>
						</table>
					</div>
					<?php
					if (!empty($this->session->flashdata('alert'))) {
						echo "<div class='alert alert-".$this->session->flashdata('alert')."'>".$this->session->flashdata('pesan').'</div>';	
					}
					?>
					<div class="form-group">
						<input type="submit" name="submit" class="btn btn-success btn-block btn-lg" value="Coblos !!">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>