<?php require 'includes/config.php'; ?>
<?php
	 $pageLang = $_SESSION["dil"];
	 session_destroy();
	 $_SESSION["dil"] = $pageLang;
	 echo '<script type="text/javascript">window.location = "login.php"</script>';
?>