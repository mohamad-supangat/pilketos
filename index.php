<?php 
if (!file_exists('config/db_server.php')) {
	header('location: install/');
}  else {
	include 'config/db_server.php';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="0;url=<?= $url_utama;?>/app">
<script language="javascript">
    // window.location.href = "emanusa"
</script>
</head>
<body>
</body>
</html>
