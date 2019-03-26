<?php
if (!empty($alert)) {
	echo "<div class='alert alert-".$alert."'>".$pesan.'</div>';	
}
?>
<p>
	<div class="row">
		<form method="post" action="" onsubmit="return cek();">
			<div class="col-md-4"><div class="form-group">
				<label>Password Lama</label>
				<input type="hidden" name="pwd_lama" value="<?= $a->pwd; ?>">
				<input type="password" name="pwd_lamax" required="required" class="form-control">
				
			</div></div>
			<div class="col-md-4"><div class="form-group">
				<label>Password Baru</label>
				<input type="password" name="pwd_baru" required="required" class="form-control">
			</div></div>
			<div class="col-md-4"><div class="form-group">
				<label>Konfirmasi Password Baru</label>
				<input type="password" name="pwd_barux" required="required" class="form-control">
			</div></div>
			<div class="col-md-4"><div class="form-group">
				<input type="submit" name="submit" class="btn btn-success btn-block" value="Simpan">
			</div></div>
			<div class="col-md-4">
				<div id="alert" class="alert alert-info" style="display: none;"></div>
			</div>
		</form>
	</div>
</p>
<script type="text/javascript">
	function cek(){
		var p_lama = $('[name="pwd_lama"]').val();
		var p_lamax = $('[name="pwd_lamax"]').val();
		var p_baru = $('[name="pwd_baru"]').val();
		var p_barux= $('[name="pwd_barux"]').val();
		var p;
		if (p_lamax!=p_lama) {
			p='Password Lama Tidak Sama';
		} else {
			if (p_barux!=p_baru) {
				p='Password Baru Tidak Sama';
			} else {
				p='Sedang Di Proses';
			}
		}
		$("#alert").html(p);
		$("#alert").show();
		if (p=='Sedang Di Proses') {
			return true;
		} else {
			return false;
		}
	}
</script>