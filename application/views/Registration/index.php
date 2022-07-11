<!DOCTYPE html>
<html lang="zxx" class="js">

<!-- HEAD -->
<?php $this->load->view('backend/includes/head'); ?>
<!-- /HEAD -->

<body class="nk-body bg-white npc-general pg-auth">
	<div class="nk-app-root">
		<!-- main @s -->
		<div class="nk-main ">
			<!-- wrap @s -->
			<div class="nk-wrap nk-wrap-nosidebar">
				<!-- content @s -->
				<div class="nk-content ">
					<div class="nk-block nk-block-middle nk-auth-body  wide-md">
						<div class="brand-logo pb-4 text-center">
							<a href="<?= base_url() ?>" class="logo-link">
								<!--<img class="logo-light logo-img logo-img-lg" src="<?/*= base_url()*/ ?>uploads/logo.png" srcset="<?/*= base_url()*/ ?>uploads/logo.png 2x" alt="logo">
							<img class="logo-dark logo-img logo-img-lg" src="<?/*= base_url()*/ ?>uploads/logo.png" srcset="<?/*= base_url()*/ ?>assets/uploads/logo.png 2x" alt="logo-dark">-->
							</a>
						</div>
						<div class="card card-bordered">
							<div class="card-inner card-inner-lg">
								<div class="nk-block-head">
									<div class="nk-block-head-content">
										<h4 class="nk-block-title">Register Now</h4>
									</div>
								</div>
								<form action="#" method="POST" id="register">
									<div class="row gy-4">
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-label" for="default-03">First Name</label>
												<div class="form-control-wrap">
													<div class="form-icon form-icon-left">
														<em class="icon ni ni-user"></em>
													</div>
													<input type="text" class="form-control form-control-lg  rounded-pill" id="first_name" name="first_name" placeholder="First Name">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-label" for="default-03">Last Name</label>
												<div class="form-control-wrap">
													<div class="form-icon form-icon-left">
														<em class="icon ni ni-user"></em>
													</div>
													<input type="text" class="form-control form-control-lg rounded-pill" id="last_name" name="last_name" placeholder="Enter your Last name">

												</div>
											</div>
										</div>
										<!-- <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="form-label" for="default-03">Phone Number</label>
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-left">
                                            <em class="icon ni ni-mobile"></em>
                                        </div>
									<input type="text" class="form-control form-control rounded-pill" id="phone_number" name="phone_number" placeholder="Enter your phone number">
                                    </div>
                                </div>
                            </div> -->
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-label" for="default-03">Date of Birth</label>
												<div class="form-control-wrap">
													<div class="form-icon form-icon-left">
														<em class="icon ni ni-calendar"></em>
													</div>
													<input type="text" class="form-control form-control-lg form-control  date-picker rounded-pill" name="dob" value="" placeholder="Date of Birth">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-label" for="default-03">Email</label>
												<div class="form-control-wrap">
													<div class="form-icon form-icon-left">
														<em class="icon ni ni-mail"></em>
													</div>
													<input type="email" class="form-control form-control-lg form-control  rounded-pill" id="email" name="email" placeholder="Enter Email">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-label" for="default-03">Phone</label>
												<div class="form-control-wrap">
													<div class="form-icon form-icon-left">
														<em class="icon ni ni-mobile"></em>
													</div>
													<input type="phone" class="form-control form-control-lg form-control  rounded-pill" id="phone" name="phone" placeholder="Enter Phone Number">
												</div>
											</div>
										</div>
										<!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="default-03">Password</label>
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-left" >
                                            <em class="icon ni ni-lock" ></em>
                                        </div>
									
										<a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
											<em class="passcode-icon icon-show icon ni ni-eye"></em>
											<em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
										</a>
										<input type="password" class="form-control form-control-lg rounded-pill" id="password" name="password" placeholder="Enter your password">

									</div>
                                </div>
                            </div> -->
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-label" for="password">Password</label>
												<div class="form-control-wrap">
													<div class="form-icon form-icon-left">
														<em class="icon ni ni-lock"></em>
													</div>



													<input type="password" class="form-control form-control-lg rounded-pill" id="password" name="password" placeholder="Password">
													<a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
														<em class="passcode-icon icon-show icon ni ni-eye"></em>
														<em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
													</a>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-label" for="confirm_password">Confirm Password</label>
												<div class="form-control-wrap">
													<div class="form-icon form-icon-left">
														<em class="icon ni ni-lock"></em>
													</div>

													<input type="password" class="form-control form-control-lg rounded-pill" id="confirm_password" name="confirm_password" placeholder="Confirm password">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-label" for="gender">Gender</label>
												<div class="preview-block">
													<div class="custom-control custom-radio">
														<input type="radio" id="male" value="1" name="customRadio" class="custom-control-input">
														<label class="custom-control-label" for="male">Male</label>

													</div>

													<div class="custom-control custom-radio" style="margin-left: 10px;">
														<input type="radio" id="female" value="0" name="customRadio" class="custom-control-input">
														<label class="custom-control-label" for="female">Female</label>

													</div>
												</div>
											</div>
										</div>

										<!-- <div class="col-md-6">
											
											<div class="form-group">
											<div class="g-recaptcha" data-sitekey="6LdSKYUaAAAAACPctTA7ZMGXXUSS981ncAANnasN"></div>
											</div>
										</div> -->



										<div class="col-7 mx-auto">
											<input type="hidden" name="role" value="2">
											<div class="form-group">
												<button class="btn btn-lg btn-primary btn-block">Register</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="nk-footer nk-auth-footer-full">
						<div class="container wide-lg">
							<div class="row g-3 justify-content-center">
								<div class="col-lg-6">
									<div class="nk-block-content text-center text-lg">
										<p class="text-soft">&copy; <?= date('Y'); ?> <?= $company_info['name'] ?>. All Rights Reserved.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- wrap @e -->
			</div>
			<!-- content @e -->
		</div>
		<!-- main @e -->
	</div>


	<!-- JavaScript -->
	<?php $this->load->view('backend/includes/scripts'); ?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<!-- /JavaScript -->

	<script>
		$(document).ready(function() {
			$("#register").on('submit', (function(e) {
				e.preventDefault();
				var fd = new FormData(this);
				$.ajax({
					url: '<?php echo base_url("Registration/register") ?>',
					data: fd,
					type: "POST",
					contentType: false,
					processData: false,
					cache: false,
					beforeSend: function() {
						imageOverlay('#register', 'show');
					},
					complete: function(data) {
						imageOverlay('#register', 'hide');
					},
					success: function(res) {
						var res = $.parseJSON(res);
						if (res.msg_type === 'success') {
							NioApp.Toast(res.message, 'success', {
								position: 'top-right',
								icon: 'auto',
								ui: ''
							});
							setTimeout(function() {
								window.location = res.redirect_link;
							}, 2000);

						} else {

							var temp = res.message.split("<p>");
							var temp2 = temp;
							$.each(temp2, function(index, value) {
								console.log(value);
								if (typeof value !== "undefined") {
									if (value) {
										NioApp.Toast('<h5>' + value + '</h5>', 'error', {
											position: 'top-right',
											icon: 'auto',
											ui: ''
										});
									}
								}
							});


						}
					},
					error: function(xhr) {
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