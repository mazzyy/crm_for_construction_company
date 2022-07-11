<!DOCTYPE html>
<html lang="zxx" class="js">


<!-- HEAD -->
<?php $this->load->view('backend/includes/head'); ?>
<!-- /HEAD-->

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
									<div class="nk-block-head">

									</div>
									<div class="card card-bordered">
										<div class="card-inner">
											<div class="card-head">
												<h5 class="card-title">Group Permissions</h5>
											</div>
											<div class="row g-4">
													<div class="col-sm-4">
														<table class="table table-bordered" id="parent_menu">
															<thead class="thead-dark">
															<tr>
																<th scope="col">Modules</th>
															</tr>
															</thead>
															<tbody>
															<?php foreach ($parents as $parent): ?>
															<tr>
																<td>
																	<a href="#" id="parent_id" data-mid="<?= $parent['id']; ?>">
																		<?= $parent['name']?>
																	</a>
																</td>
															</tr>
															<?php endforeach; ?>
															</tbody>
														</table>
													</div>
													<div class="col-lg-8">
														<form id="save_permission" method="POST">
															<table id="child_menu"  class="table table-bordered">
																<thead class="thead-dark">
																<tr>
																	<th>ID</th>
																	<th>Sub Modules</th>
																	<th>Permission</th>
																</tr>
																</thead>
																<tbody id="tb1">

																</tbody>
															</table>
														</form>
													</div>
												</div>
										</div>
									</div>
								</div><!-- .nk-block -->
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
<!-- JavaScript -->
<?php $this->load->view('backend/includes/scripts'); ?>
<!-- /JavaScript -->

<script type="text/javascript">
	$(document).ready(function () {
		$('body').on('click', '#parent_id', function () {
			var id = $(this).data('mid');
			$.ajax({
				url: '<?= base_url("Users/get_child_menus")?>',
				type: 'POST',
				data: {id: id, group_id: <?= $group_id?> },
				success: function (data) {
					var res = data;
					$('#tb1').html(res);
				}

			})
		});


		$("#save_permission").on('submit', (function (e) {
			e.preventDefault();
			var fd = new FormData(this);
			$.ajax({
				url: '<?php echo base_url("Users/save_permission") ?>',
				data: fd,
				type: "POST",
				contentType: false,
				processData: false,
				cache: false,
				beforeSend: function(){
					imageOverlay('#save_permission','show');
				},
				complete:function(data){
					imageOverlay('#save_permission','hide');
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
						var temp = res.message.split("<p>");
						$.each(temp, function (index, value) {
							NioApp.Toast('<h5>' + value + '</h5>', 'error', {position: 'top-right', icon: 'auto', ui: ''});
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

</html>
