<!DOCTYPE html>
<html lang="zxx" class="js">

<!-- HEAD -->
<?php $this->load->view('backend/includes/head'); ?>
<!-- /HEAD -->
<style>


body {
 
 	background-image: url("<?= base_url()?>assets\images\login\1900851.png") !important ;  
	background-repeat: no-repeat !important;
	background-size: 100%; 
}
</style>
<body class="nk-body bg-white npc-general pg-auth" style="background-image: url("<?= base_url()?>assets\images\login\1900851.png") !important ; ">
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
							<!--<img class="logo-light logo-img logo-img-lg" src="<?/*= base_url()*/?>uploads/logo.png" srcset="<?/*= base_url()*/?>uploads/logo.png 2x" alt="logo">
							<img class="logo-dark logo-img logo-img-lg" src="<?/*= base_url()*/?>uploads/logo.png" srcset="<?/*= base_url()*/?>assets/uploads/logo.png 2x" alt="logo-dark">-->
						</a>
					</div>
					<div class="card card-bordered">
						<div class="card-inner card-inner-lg">
							<div class="nk-block-head">
								<div class="nk-block-head-content">
									<h4 class="nk-block-title">Sign-In</h4>
								</div>
							</div>
							<form action="#" method="POST" id="login-form">
								<div class="form-group">
									<div class="form-label-group">
										<label class="form-label" for="default-01">Email or Username</label>
									</div>
									<input type="text" class="form-control form-control-lg" name="email" id="default-01" placeholder="Enter your email address or username">
								</div>
								<div class="form-group">
									<div class="form-label-group">
										<label class="form-label" for="password">Password</label>
										<a class="link link-primary link-sm" href="<?= base_url('forgot-password') ?>">Forgot Password?</a>
									</div>
									<div class="form-control-wrap">
										<a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
											<em class="passcode-icon icon-show icon ni ni-eye"></em>
											<em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
										</a>
										<input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Enter your passcode">
									</div>
								</div>
								<div class="form-group">
									<button class="btn btn-lg btn-primary btn-block">Sign in</button>
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
<?php $this->load->view('backend/includes/scripts'); ?>
<!-- /JavaScript -->

<!-- Login Js -->
<script>

	$(function(){
		$("#login-form").on("submit", function(e){
			e.preventDefault();
			var form_data = $(this).serialize();
			$.ajax({
				type: "POST",
				url: "",
				data: form_data,
				beforeSend: function(){
					imageOverlay('#login-form','show');
				},
				complete:function(data){
					imageOverlay('#login-form','hide');
				},
			}).then(function(res){
				res = $.parseJSON(res);
				if(res.type === "success"){
					NioApp.Toast('Authenticated Successfully', 'success', {position: 'top-right', icon: 'auto', ui: ''});
					setTimeout(function(){
						window.location = res.redirect_link;
					}, 2000);
				} else {
					var temp = res.response.split("<p>");
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
			}, function(){
			})
		});
	});


</script>
<!-- /Login Js-->

</body>
</html>
