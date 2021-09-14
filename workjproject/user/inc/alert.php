<?php

if (isset($_GET['alert'])) {
	switch ($_GET['alert']) {
		case 'd_s':
			?>
				<script>
					swal('Deposit Successful', '', 'success');
				</script>
			<?php
		break;
	}
}

?>