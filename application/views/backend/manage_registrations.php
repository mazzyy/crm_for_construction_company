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
												<h3 class="nk-block-title page-title">Manage Registrations</h3>

											</div><!-- .nk-block-head-content -->
											<!-- <a href="<?= base_url('menus/add')?>" class="btn btn-primary"><em class="icon ni ni-plus"></em></a> -->

										</div><!-- .nk-block-between -->
									</div><!-- .nk-block-head -->
									<div class="card card-preview animated fadeIn">
										<div class="card-inner">
											<table class="datatable-init table">
												<thead>
												<tr>
													<th>Sno#</th>
													<th>Name</th>
													<th>Email</th>
													<th>Number</th>
													<th>Status</th>
													<th>Create Date</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody>

												<?php for($i=0; $i<count($registrations); $i++): ?>
													<tr>
														<td><?= $i+1; ?></td>
														<td><?= $registrations[$i]['first_name'] ?></td>
														<td><?= $registrations[$i]['email'] ?></td>
														<td><?= $registrations[$i]['contact'] ?></td>
														<td>
															<?php if($registrations[$i]['status'] == "Pending") { ?>
															<span class="badge badge-pill badge-warning"><?= $registrations[$i]['status']; ?></span>
															<?php } else { ?>
																<span class="badge badge-pill badge-success"><?= $registrations[$i]['status']; ?></span>
															<?php  } ?>

														</td>
														<td><?= $registrations[$i]['created_at'] ?></td>

														<td align="center">
															<button type="button" onclick="get_group_byId(<?= $registrations[$i]['registration_id']; ?>)" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#update_status"><em class="icon ni ni-check"></em></button>
<!--															<a href="button" class="btn btn-xs btn-primary"><span class="icon ni ni-check"></span></a>-->
															<a href="<?= base_url('registration/detail/'.$registrations[$i]['user_id'])?>" class="btn btn-xs btn-info"><span class="icon ni ni-eye"></span></a>
															<!-- <a href="#" class="btn btn-xs btn-warning"><span class="icon ni ni-edit"></span></a> -->
															<button type="button" class="btn btn-xs btn-danger"><span class="icon ni ni-trash"></span></button>
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


<!--Approved Status-->


<!-- ADD NEW ROUTE -->
<div class="modal fade" tabindex="-1" id="update_status">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Update Status</h5>
				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
					<em class="icon ni ni-cross"></em>
				</a>
			</div>
			<div class="modal-body">
				<form action="#" method="POST" id="reg_status" class="form-validate is-alter">
					<div class="form-group">
						<label class="form-label" for="Status">Status</label>
						<div  id="get_data">
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

<!--/Approved Status-->


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
					url: '<?= base_url('Menus/del_menu')?>',
					data: {'id': id}
				}).then(function(res){
					var res = $.parseJSON(res);
					if(res.msg_type === 'success') {
						$(a).closest('tr').remove();
						swal.fire('Deleted!', 'Menu has been Deleted.', 'success');
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



<script>
	function get_group_byId(id)
	{
		// alert(id);
		$('#update_status').modal({
			backdrop: 'static',
			keyboard: false,
			show: true
		});
		var registration_id = id;
		$.ajax({
			type: "POST",
			url: '<?php echo base_url("Registration/get_registration_status") ?>',
			data: {registration_id : registration_id},
			success: function (res) {
				$('#get_data').html(res);
			},
			error: function (xhr) {
				$("#msg").html("Error: - " + xhr.status + " " + xhr.statusText);
			}
		});
	}
	$(document).ready(function () {
		$("#reg_status").on('submit', (function (e) {
			e.preventDefault();
			var fd = new FormData(this);
			$.ajax({
				url: '<?php echo base_url("Registration/update_status") ?>',
				data: fd,
				type: "POST",
				contentType: false,
				processData: false,
				cache: false,
				beforeSend: function(){
					imageOverlay('#reg_status','show');
				},
				complete:function(data){
					imageOverlay('#reg_status','hide');
				},
				success: function (res) {
					var res = $.parseJSON(res);
					if (res.msg_type === 'success') {
						NioApp.Toast(res.message, 'success', {position: 'top-right', icon: 'auto', ui: ''});
						setTimeout(function(){
							location.reload();
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
