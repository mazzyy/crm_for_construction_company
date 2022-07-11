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
												<h3 class="nk-block-title page-title">Locations</h3>

											</div><!-- .nk-block-head-content -->
											<a href="<?= base_url('menus/add'); ?>" class="btn btn-primary"><em class="icon ni ni-plus"></em></a>
										</div><!-- .nk-block-between -->
									</div><!-- .nk-block-head -->
									<div class="card card-preview">
										<div class="card-inner">
											<table class="datatable-init table">
												<thead>
												<tr>
												<th>Sno#</th>
													<th>Location Name</th>
													<th>Address</th>
													<th>City</th>
													<th>State</th>
													<th>ZipCode</th>
													<th>Phone#</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody>
												
												<tr>
													<td>1</td>
													<td>Tariq bin zaid</td>
													<td>fl2 R3</td>
													<td>karachi</td>
													<td>sidnh</td>
													<td>5050</td>
													<td>03343874070</td>

													<td align="center">
														<a href="/asadbahi_crm/menus/edit/11" class="btn btn-xs btn-warning"><span class="icon ni ni-edit"></span></a>
														<button type="button"  class="btn btn-xs btn-danger"><span class="icon ni ni-trash"></span></button>
													</td>
												</tr>

												<tr>
													<td>1</td>
													<td>Tariq bin zaid</td>
													<td>fl2 R3</td>
													<td>karachi</td>
													<td>sidnh</td>
													<td>5050</td>
													<td>03343874070</td>

													<td align="center">
														<a href="/asadbahi_crm/menus/edit/11" class="btn btn-xs btn-warning"><span class="icon ni ni-edit"></span></a>
														<button type="button"  class="btn btn-xs btn-danger"><span class="icon ni ni-trash"></span></button>
													</td>
												</tr>

												<tr>
													<td>1</td>
													<td>Tariq bin zaid</td>
													<td>fl2 R3</td>
													<td>karachi</td>
													<td>sidnh</td>
													<td>5050</td>
													<td>03343874070</td>

													<td align="center">
														<a href="/asadbahi_crm/menus/edit/11" class="btn btn-xs btn-warning"><span class="icon ni ni-edit"></span></a>
														<button type="button"  class="btn btn-xs btn-danger"><span class="icon ni ni-trash"></span></button>
													</td>
												</tr>

												<tr>
													<td>1</td>
													<td>Tariq bin zaid</td>
													<td>fl2 R3</td>
													<td>karachi</td>
													<td>sidnh</td>
													<td>5050</td>
													<td>03343874070</td>

													<td align="center">
														<a href="/asadbahi_crm/menus/edit/11" class="btn btn-xs btn-warning"><span class="icon ni ni-edit"></span></a>
														<button type="button"  class="btn btn-xs btn-danger"><span class="icon ni ni-trash"></span></button>
													</td>
												</tr>
											

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

</body>

</html>
