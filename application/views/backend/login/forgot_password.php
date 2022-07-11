<!DOCTYPE html>
<html lang="zxx" class="js">

<!-- HEAD -->
<?php $this->load->view('Backend/includes/head'); ?>
<!-- /HEAD -->

<body class="nk-body bg-white npc-general pg-auth">
<div class="nk-app-root">
	<!-- main @s -->
	<div class="nk-main ">
		<!-- wrap @s -->
		<div class="nk-wrap nk-wrap-nosidebar">
			<!-- content @s -->
			<div class="nk-content ">
				<div class="nk-block nk-block-middle nk-auth-body  wide-xs">
					<div class="brand-logo pb-4 text-center">
						<a href="<?= base_url()?>" class="logo-link">
							<img class="logo-light logo-img logo-img-lg" src="<?= base_url()?>assets/images/logo.png" srcset="<?= base_url()?>assets/images/logo2x.png 2x" alt="logo">
							<img class="logo-dark logo-img logo-img-lg" src="<?= base_url()?>assets/images/logo-dark.png" srcset="<?= base_url()?>assets/images/logo-dark2x.png 2x" alt="logo-dark">
						</a>
					</div>
					<div class="card card-bordered">
						<div class="card-inner card-inner-lg">
							<div class="nk-block-head">
								<div class="nk-block-head-content">
									<h5 class="nk-block-title">Reset password</h5>
									<div class="nk-block-des">
										<p>Enter your registered email address, to get password reset link.</p>
									</div>
								</div>
							</div>
							<form action="#">
								<div class="form-group">
									<div class="form-label-group">
										<label class="form-label" for="default-01">Email</label>
									</div>
									<input type="text" class="form-control form-control-lg" id="default-01" placeholder="Enter your email address">
								</div>
								<div class="form-group">
									<button class="btn btn-lg btn-primary btn-block">Send Reset Link</button>
								</div>
							</form>
							<div class="form-note-s2 text-center pt-4">
								<a href="<?= base_url()?>"><strong>Return to login</strong></a>
							</div>
						</div>
					</div>
				</div>
				<div class="nk-footer nk-auth-footer-full">
					<div class="container wide-lg">
						<div class="row g-3 justify-content-center">
							<div class="col-lg-6">
								<div class="nk-block-content text-center text-lg">
									<p class="text-soft">&copy; <?= date('Y'); ?> <?= $company_info['name']?>. All Rights Reserved.</p>
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
<?php $this->load->view('Backend/includes/scripts'); ?>
<!-- /JavaScript -->

</body>
</html>
