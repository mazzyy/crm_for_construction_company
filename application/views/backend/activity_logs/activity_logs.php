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
												<h3 class="nk-block-title page-title">Manage Routes</h3>

											</div><!-- .nk-block-head-content -->
											<a href="<?= base_url('menus/add_menu_route')?>" class="btn btn-primary"><em class="icon ni ni-plus"></em></a>

										</div><!-- .nk-block-between -->
									</div><!-- .nk-block-head -->
									<div class="card card-preview">
										<div class="card-inner">
											<table id="user-grid" class="table">
												<thead>
												<tr>
													<th>Sno.</th>
													<th>User</th>
													<th>Controller</th>
													<th>Method</th>
													<th>Date Time</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody>

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
			<div class="nk-footer">
				<div class="container-fluid">
					<div class="nk-footer-wrap">
						<div class="nk-footer-copyright"> &copy; 2020 DashLite. Template by <a href="https://softnio.com" target="_blank">Softnio</a>
						</div>
						<div class="nk-footer-links">
							<ul class="nav nav-sm">
								<li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Help</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
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

<script type="text/javascript" language="javascript">
	$(document).ready(function() {
		getList();
	});
	function getList(){
		var dataTable = $('#user-grid').DataTable( {
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"processing": true,
			"serverSide": true,
			"ajax":{
				url :"<?=base_url('activity_logs/get_logs')?>", // json datasource
				type: "post",  // method  , by default get
				error: function(){  // error handling
					$(".user-grid-error").html("");
					$("#user-grid").append('<tbody class="user-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#user-grid_processing").css("display","none");

				}
			},
			"oLanguage": {
				"sProcessing": '<img src="<?=base_url()?>uploads/loading.gif" width="50">'
			}
		} );
	}
</script>

</body>

</html>
