	<option value="">Select Programs</option>
	<?php for($i=0; $i<count($program_details); $i++): ?>
		<option value="<?= $program_details[$i]['program_id'];?>"> <?= $program_details[$i]['program'] ?></option>
	<?php endfor; ?>

