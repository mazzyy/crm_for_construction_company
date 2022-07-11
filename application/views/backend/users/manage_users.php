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
												<h3 class="nk-block-title page-title">Manage Users</h3>

											</div><!-- .nk-block-head-content -->
											<a href="<?= base_url('user/add'); ?>" class="btn btn-primary"><em class="icon ni ni-plus"></em></a>

										</div><!-- .nk-block-between -->
									</div><!-- .nk-block-head -->
									<div class="card card-preview">
										<div class="card-inner">
											<table class="datatable-init table">
												<thead>
												<tr>
													<th>Sno#</th>
													<th>Name</th>
													<th>Email</th>
													<th>Role</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody>
												<?php for($i=0; $i<count($users); $i++): ?>
													<tr>
														<td><?= $i+1; ?></td>
														<td><?= $users[$i]['name'] ?></td>
														<td><?= $users[$i]['email'] ?></td>
														<td>
															<?php if($users[$i]['type']== '1') { ?>
																<span class="badge badge-pill badge-success">
																	<?= $users[$i]['type']; ?>
																</span>
															<?php } else { ?>
																<span class="badge badge-pill badge-primary"><?= $users[$i]['type']; ?></span>
															<?php } ?>
														</td>
														<td>
															<?php
															  if($users[$i]['status'] == 'Active') {
															?>
																  <span class="badge badge-pill badge-success"><?= $users[$i]['status']; ?></span>
															<?php } elseif($users[$i]['status'] == 'Suspended') { ?>
																  <span class="badge badge-pill badge-warning"><?= $users[$i]['status']; ?></span>
															<?php } else { ?>
																  <span class="badge badge-pill badge-danger"><?= $users[$i]['status']; ?></span>
															<?php } ?>
														</td>
														<td align="center">
															<!-- <a href="#" class="btn btn-xs btn-info"><span class="icon ni ni-eye"></span></a> -->
															<a href="<?= base_url('user/edit/'.$users[$i]['id']); ?>" class="btn btn-xs btn-warning"><span class="icon ni ni-edit"></span></a>
															<button type="button" onclick="" value="" class="btn btn-xs btn-danger"><span class="icon ni ni-trash"></span></button>
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


<!-- JavaScript -->
<?php $this->load->view('backend/includes/scripts'); ?>
<!-- /JavaScript -->


<!--Add GROUP JS-->


<script type="text/javascript">
	$(document).ready(function () {
		$("#add_group").on('submit', (function (e) {
			e.preventDefault();
			var fd = new FormData(this);
			$.ajax({
				url: '<?php echo base_url("Users/save_group") ?>',
				data: fd,
				type: "POST",
				contentType: false,
				processData: false,
				cache: false,
				beforeSend: function(){
					imageOverlay('#add_group','show');
				},
				complete:function(data){
					imageOverlay('#add_group','hide');
				},
				success: function (res) {
					var res = $.parseJSON(res);
					if (res.msg_type === 'success') {
						NioApp.Toast(res.message, 'success', {position: 'top-right', icon: 'auto', ui: ''});
						setTimeout(function(){
							window.location = res.redirect_link;
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


<!--ADD GROUP JS END-->


<!--DELETE GROUP-->

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


<!--DELETE GROUP END-->


<script>
	function get_group_byId(id)
	{
		$('#edit_group').modal({
			backdrop: 'static',
			keyboard: false,
			show: true
		});
		var group_id = id;
		$.ajax({
			type: "POST",
			url: '<?php echo base_url("Users/edit_group_modal") ?>',
			data: {group_id : group_id},
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
				url: '<?php echo base_url("Users/save_edit_group") ?>',
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
							window.location = res.redirect_link;
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
