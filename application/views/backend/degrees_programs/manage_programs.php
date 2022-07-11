<!DOCTYPE html>
<html lang="zxx" class="js">



<!-- HEAD -->
<?php $this->load->view('backend/includes/head'); ?>
<!-- /HEAD -->

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
	<!-- main @s -->
	<div class="nk-main ">


		<!-- /SidBar -->
		<?php $this->load->view('backend/includes/sidebar'); ?>
		<!-- /SidBar -->

		<!-- wrap @s -->
		<div class="nk-wrap ">
			<!-- /Header -->
			<?php $this->load->view('backend/includes/header'); ?>
			<!-- /Header -->

			<!-- content @s -->
			<div class="nk-content ">
				<div class="container-fluid">
					<div class="nk-content-inner">
						<div class="nk-content-body">
							<div class="components-preview wide-md mx-auto">
								<div class="nk-block nk-block-lg">
									<div class="nk-block-head nk-block-head-sm">
										<div class="nk-block-between">
											<div class="nk-block-head-content">
												<h3 class="nk-block-title page-title">Manage Programs</h3>

											</div><!-- .nk-block-head-content -->
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm"><em class="icon ni ni-plus"></em></button>
										</div><!-- .nk-block-between -->
									</div><!-- .nk-block-head -->
									<div class="card card-preview">
										<div class="card-inner">
											<table class="datatable-init table">
												<thead>
												<tr>
													<th>Sno#</th>
													<th>Program Name</th>
													<th>Degree Name</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody>

												<?php for($i=0; $i<count($program); $i++): ?>
													<tr>
														<td><?= $i+1; ?></td>
														<td><?= $program[$i]['program'] ?></td>
														<td><?= $program[$i]['degree'] ?></td>
														<td align="center">
															<a onclick="get_program_byId(<?= $program[$i]['program_id']; ?>)" class="btn btn-xs btn-warning"><span class="icon ni ni-edit"></span></a>
															<button type="button" onclick="validate(this)" value="<?= $program[$i]['program_id']; ?>" class="btn btn-xs btn-danger"><span class="icon ni ni-trash"></span></button>
														</td>
													</tr>

												<?php endfor; ?>

												</tbody>
											</table>
										</div>
									</div><!-- .card-preview -->
								</div> <!-- nk-block -->

							</div><!-- .components-preview -->
						</div>
					</div>
				</div>
			</div>
			<!-- content @e -->
			<!-- footer @s -->
			<?php $this->load->view('backend/includes/footer'); ?>
			<!-- footer @e -->
		</div>
		<!-- wrap @e -->
	</div>
	<!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->





<!--EDIT Program-->

<div class="modal fade" tabindex="-1" id="edit_program">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Program</h5>
				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
					<em class="icon ni ni-cross"></em>
				</a>
			</div>
			<div class="modal-body">
				<form action="#" method="POST" id="edit_g" class="form-validate is-alter">
					<div class="form-group"  id="get_data">

					</div>


			</div>
			<div class="modal-footer bg-light">
				<button type="submit" class="btn btn-primary">Save</button>
				<button  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
			</div>
			</form>
		</div>
	</div>
</div>





<!-- ADD NEW PRogram -->
<div class="modal fade" tabindex="-1" id="modalForm">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Program</h5>
				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
					<em class="icon ni ni-cross"></em>
				</a>
			</div>
			<div class="modal-body">
				<form action="#" method="POST" id="add_program" class="form-validate is-alter">
					<div class="form-group">
						<label class="form-label" for="Degree">Select Degree</label>
						<div class="form-control-wrap">
							<select class="form-select form-control form-control-lg" data-search="on" data-placeholder="Select Degree" name="degree_id" id="degree_id">
								<option value="">Select Degree</option>
								<?php for($i=0; $i<count($degrees); $i++): ?>
									<option value="<?= $degrees[$i]['degree_id'];?>" ><?= $degrees[$i]['degree'];?></option>
								<?php endfor; ?>
							</select>

						</div>
					</div>
					<div class="form-group">
						<label class="form-label" for="Degree">Program Name</label>
						<div class="form-control-wrap">
							<input type="text" class="form-control" name="program" id="program" placeholder="Program Name" required>

						</div>
					</div>
			</div>
			<div class="modal-footer bg-light">
				<button type="submit" class="btn btn-primary">Save</button>
				<button  class="btn btn-danger" data-dismiss="modal" aria-label="Close">Close</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /ADD NEW ROUTE -->


<!-- JavaScript -->
<?php $this->load->view('backend/includes/scripts'); ?>
<!-- /JavaScript -->

<script type="text/javascript">
	function validate(a)
	{
		var id= a.value;
		swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yes, delete it!'
		}).then( function(result) {
			if (result.value) {

				$.ajax({
					type: 'POST',
					url: '<?= base_url('Menus/delete_route')?>',
					data: {'route_id': id}
				}).then(function(res){
					var res = $.parseJSON(res);
					if(res.msg_type === 'success') {
						$(a).closest('tr').remove();
						swal.fire('Deleted!', 'Route has been Deleted.', 'success');
						setTimeout(function(){
							location.reload();
						}, 1000);
					}else{
						swal.fire('Error','Ops something went wrong','error');
					}
				}, function(err){
					swal.fire('Error', err.statusText, 'error');
				});

			} else if (result.dismiss === 'cancel') {
				swal.fire(
					'Cancelled',
					'Your imaginary file is safe :)',
					'error'
				)
			}
		})
	}
</script>



<!--ADD PROGRAM-->
<script type="text/javascript">
	$(document).ready(function () {
		$("#add_program").on('submit', (function (e) {
			e.preventDefault();
			var fd = new FormData(this);
			console.log(fd)
			$.ajax({
				url: '<?php echo base_url("Degree_program/add_program") ?>',
				data: fd,
				type: "POST",
				contentType: false,
				processData: false,
				cache: false,
				beforeSend: function(){
					imageOverlay('#add_program','show');
				},
				complete:function(data){
					imageOverlay('#add_program','hide');
				},
				success: function (res) {
					var res = $.parseJSON(res);
					if (res.msg_type === 'success') {
						NioApp.Toast(res.message, 'success', {position: 'top-right', icon: 'auto', ui: ''});
						setTimeout(function(){
							location.reload();
						}, 2000);

					} else {
						var temp = res.message.split("<p>");
						var temp2 = temp;
						$.each(temp2, function( index, value ) {
							if(typeof value !== "undefined")
							{
								if(value){
									NioApp.Toast('<h5>' + value + '</h5>', 'error', {position: 'top-right', icon: 'auto', ui: ''});
								}
							}
						});
					}
				},
				error: function (xhr) {
					$("#msg").html("Error: - " + xhr.status + " " + xhr.statusText);
				}
			});
		}));
	});
</script>
<!--/ADD PROGRAM-->




<!--EDIT Program-->

<script>
	function get_program_byId(id)
	{
		$('#edit_program').modal({
			backdrop: 'static',
			keyboard: false,
			show: true
		});
		var program_id = id;
		$.ajax({
			type: "POST",
			url: '<?php echo base_url("Degree_program/get_degrees_by_id_ajax") ?>',
			data: {program_id : program_id},
			success: function (res) {
				$('#get_data').html(res);
			},
			error: function (xhr) {
				$("#msg").html("Error: - " + xhr.status + " " + xhr.statusText);
			}
		});
	}
	$(document).ready(function () {
		$("#edit_g").on('submit', (function (e) {
			e.preventDefault();
			var fd = new FormData(this);
			$.ajax({
				url: '<?php echo base_url("Degree_program/save_edit_program") ?>',
				data: fd,
				type: "POST",
				contentType: false,
				processData: false,
				cache: false,
				beforeSend: function(){
					imageOverlay('#edit_g','show');
				},
				complete:function(data){
					imageOverlay('#edit_g','hide');
				},
				success: function (res) {
					var res = $.parseJSON(res);
					if (res.msg_type === 'success') {
						NioApp.Toast(res.message, 'success', {position: 'top-right', icon: 'auto', ui: ''});
						setTimeout(function(){
							location.reload()
						}, 2000);

					} else {
						$("#msg").html(res);
						NioApp.Toast('<h5>' + res.message + '</h5>', 'error', {position: 'top-right', icon: 'auto', ui: ''});
					}
				},
				error: function (xhr) {
					$("#msg").html("Error: - " + xhr.status + " " + xhr.statusText);
				}
			});
		}));
	});
</script>


</body>

</html>
