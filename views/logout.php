<?php 
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
	session_destroy();
	echo "
		<script type='text/javascript'>
			window.location.href='".BASE_URL."home'
		</script>
	";
} else {
	echo "
		<script type='text/javascript'>
			window.location.href='".BASE_URL."home'
		</script>
	";
}
?>