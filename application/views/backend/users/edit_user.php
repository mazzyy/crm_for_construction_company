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
												<h5 class="card-title">Edit User</h5>
											</div>
											<form action="#" method="POST" id="edit_user">
												<div class="row g-4">
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label" for="default-03">Username</label>
															<div class="form-control-wrap">
																<div class="form-icon form-icon-left">
																	<em class="icon ni ni-user"></em>
																</div>
																<input type="text" class="form-control" name="name" id="name" value="<?= $user_detail->name; ?>">
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
																<input type="email" class="form-control" name="email" id="email" value="<?= $user_detail->email; ?>">
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
																<input type="text" class="form-control" name="contact" id="contact" value="<?= $user_detail->contact; ?>">
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
																		<option value="<?= $groups[$i]['group_id'];?>" <?php if($user_detail->role == $groups[$i]['group_id']) {
																			echo 'selected';
																		}?>><?= $groups[$i]['type'];?></option>
																	<?php endfor; ?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label class="form-label" for="default-03">Status</label>
															<div class="form-control-wrap">
																<select class="form-select form-control form-control-lg" data-search="on" name="status" id="status">
																	<?php if($user_detail->status == 'Active') { ?>
																	<option value="Active">Active</option>
																	<option value="Blocked">Blocked</option>
																	<option value="Suspended">Suspended</option>
																	<?php } elseif($user_detail->status == 'Blocked') { ?>
																		<option value="Blocked">Blocked</option>
																		<option value="Active">Active</option>
																		<option value="Suspended">Suspended</option>
																	<?php } else { ?>
																		<option value="Suspended">Suspended</option>
																		<option value="Active">Active</option>
																		<option value="Blocked">Blocked</option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</div>
													<input type="hidden" name="user_id" value="<?= $user_detail->id; ?>">
													<div class="col-12">
														<div class="form-group">
															<button type="submit" class="btn btn-primary">Update</button>
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
		$("#edit_user").on('submit', (function (e) {
			e.preventDefault();
			var fd = new FormData(this);
			$.ajax({
				url: '<?php echo base_url("Users/edit_user_ajax") ?>',
				data: fd,
				type: "POST",
				contentType: false,
				processData: false,
				cache: false,
				beforeSend: function(){
					imageOverlay('#edit_user','show');
				},
				complete:function(data){
					imageOverlay('#edit_user','hide');
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
	});
</script>

</html>
