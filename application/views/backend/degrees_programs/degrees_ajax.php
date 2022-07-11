<label class="form-label" for="full-name">Degree Name</label>
<div class="form-control-wrap">

<select class="form-select form-control" data-search="on" data-placeholder="Select Degree" name="degree_id" id="degree_id">
	<option value="">Select Degree</option>
	<?php for($i=0; $i<count($degrees); $i++): ?>
		<option value="<?= $degrees[$i]['degree_id'];?>" <?php if($program['degree_id'] == $degrees[$i]['degree_id']  ) {
			echo 'selected';
			};?>> <?= $degrees[$i]['degree'] ?></option>
	<?php endfor; ?>
</select>
	<div class="form-group">
		<label class="form-label" for="Name">Name</label>
		<div class="form-control-wrap">
			<input type="text" class="form-control" name="program" id="program" placeholder="program"  value="<?= $program['program']  ?>">
		</div>
	</div>
</div>
<input type="hidden" value="<?= $program['program_id'] ?>" name="program_id" >
