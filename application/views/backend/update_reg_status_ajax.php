
<div class="form-control-wrap">
	<select class="form-select form-control" data-search="on" name="status" id="status">
	<?php if($detail->status == 'Verified') { ?>
		<option value="Verified">Verified</option>
		<option value="Lead">Lead</option>
		<option value="Contact">Contact</option>
		<option value="Interview">Interview</option>
	<?php } elseif($detail->status == 'Lead') { ?>
		<option value="Lead">Lead</option>
		<option value="Verified">Verified</option>
		<option value="Contact">Contact</option>
		<option value="Interview">Interview
	<?php } elseif($detail->status == 'Contact') { ?>
		<option value="Contact">Contact</option>
		<option value="Lead">Lead</option>
		<option value="Verified">Verified</option>
		<option value="Interview">Interview</option>
	<?php } else { ?>
		<option value="Interview">Interview</option>
		<option value="Contact">Contact</option>
		<option value="Lead">Lead</option>
		<option value="Verified">Verified</option>
	<?php } ?>
</select>
</div>
<input type="hidden" class="form-control" name="registration_id" id="registration_id" value="<?= $registration_id; ?>">
