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
									<div class="card card-bordered animated fadeIn">
										<div class="card-inner">
											<div class="card-head">
												<h5 class="card-title">Add User</h5>
											</div>
											<form action="#" method="POST" id="save_user">
												<div class="row g-4">
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label" for="default-03">Full Name</label>
															<div class="form-control-wrap">
																<div class="form-icon form-icon-left">
																	<em class="icon ni ni-user"></em>
																</div>
																<input type="text" class="form-control" name="name" id="name" placeholder="Full Name">
															</div>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label" for="default-03">Email</label>
															<div class="form-control-wrap">
																<div class="form-icon form-icon-left">
																	<em class="icon ni ni-mail"></em>
																</div>
																<input type="email" class="form-control" name="email" id="email" placeholder="admin@example.com">
															</div>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label" for="default-03">Cell Number</label>
															<div class="form-control-wrap">
																<div class="form-icon form-icon-left">
																	<em class="icon ni ni-mobile"></em>
																</div>
																<input type="text" class="form-control" name="contact" id="contact" placeholder="+0 000 00000">
															</div>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label">User Group</label>
															<div class="form-control-wrap">
																<select class="form-select form-control form-control-lg" data-search="on" data-placeholder="Select Group" name="group_id" id="group_id">
																	<option value="">Select Group</option>
																	<?php for($i=0; $i<count($groups); $i++): ?>
																		<option value="<?= $groups[$i]['group_id'];?>"><?= $groups[$i]['type'];?></option>
																	<?php endfor; ?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label" for="default-03">Password</label>
															<div class="form-control-wrap">
																<div class="form-icon form-icon-left">
																	<em class="icon ni ni-lock"></em>
																</div>
																<input type="password" class="form-control" name="password" id="password" placeholder="********">
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="preview-block">
															<label class="form-label" for="Send Cred">Send Credentials</label>
															<style>
																.userswitch {
																	display: flex;
																}
															</style>
															<div class="custom-control custom-switch userswitch">
																<input type="checkbox" class="custom-control-input" checked id="customSwitch2" name="my-checkbox">
																<label class="custom-control-label" for="customSwitch2"></label>
															</div>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group">
															<button type="submit" class="btn btn-primary">Save</button>
														</div>
													</div>
												</div>
											</form>
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

<script>


	$(document).ready(function () {
		$("#save_user").on('submit', (function (e) {
			e.preventDefault();
			var fd = new FormData(this);
			$.ajax({
				url: '<?php echo base_url("Users/save_user") ?>',
				data: fd,
				type: "POST",
				contentType: false,
				processData: false,
				cache: false,
				beforeSend: function(){
					imageOverlay('#save_user','show');
				},
				complete:function(data){
					imageOverlay('#save_user','hide');
				},
				success: function (res) {
					var res = $.parseJSON(res);
					if (res.msg_type == 'success') {
						NioApp.Toast(res.message, 'success', {position: 'top-right', icon: 'auto', ui: ''});
						setTimeout(function(){
							window.location = res.redirect_link;
						}, 2000);

					} else {
						var temp = res.message.split("<p>");
						var temp2 = temp;
						$.each(temp2, function( index, value ) {
							console.log(value);
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
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		});
	});
</script>

</html>
