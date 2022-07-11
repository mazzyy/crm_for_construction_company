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
									<div class="nk-block-head">
									</div>
									<div class="card animated fadeIn">
										<div class="card-aside-wrap">
											<div class="card-content">
												<ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
													<li class="nav-item">
														<a class="nav-link active" href="#"><em class="icon ni ni-user-circle"></em><span>Student Information</span></a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="#"><em class="icon ni ni-file-text"></em><span>Documents</span></a>
													</li>
													<li class="nav-item">
														<a class="nav-link" href="#"><em class="icon ni ni-activity"></em><span>Activities</span></a>
													</li>
												</ul><!-- .nav-tabs -->
												<div class="card-inner">
													<div class="nk-block">
														<div class="nk-block-head">
															<h5 class="title">Registration Details</h5>
														</div><!-- .nk-block-head -->
														<div class="profile-ud-list">
															<div class="profile-ud-item">
																<div class="profile-ud wider">
																	<span class="profile-ud-label">First Name</span>
																	<span class="profile-ud-value"><?= $registration->first_name; ?></span>
																</div>
															</div>
															<div class="profile-ud-item">
																<div class="profile-ud wider">
																	<span class="profile-ud-label">Last Name</span>
																	<span class="profile-ud-value"><?= $registration->last_name; ?></span>
																</div>
															</div>
															<div class="profile-ud-item">
																<div class="profile-ud wider">
																	<span class="profile-ud-label">Full Name</span>
																	<span class="profile-ud-value"><?= $registration->first_name.' '.$registration->middle_name.' '.$registration->last_name ?></span>
																</div>
															</div>
															<div class="profile-ud-item">
																<div class="profile-ud wider">
																	<span class="profile-ud-label">Date of Birth</span>
																	<span class="profile-ud-value"><?= date('M-d-Y', strtotime($registration->dob)); ?></span>
																</div>
															</div>
															<div class="profile-ud-item">
																<div class="profile-ud wider">
																	<span class="profile-ud-label">Mobile Number</span>
																	<span class="profile-ud-value"><?= $registration->contact; ?></span>
																</div>
															</div>
															<div class="profile-ud-item">
																<div class="profile-ud wider">
																	<span class="profile-ud-label">Email Address</span>
																	<span class="profile-ud-value"><?= $registration->email; ?></span>
																</div>
															</div>
															<div class="profile-ud-item">
																<div class="profile-ud wider">
																	<span class="profile-ud-label">Whatsapp Number</span>
																	<span class="profile-ud-value"><?= $registration->whatsapp; ?></span>
																</div>
															</div>
															<div class="profile-ud-item">
																<div class="profile-ud wider">
																	<span class="profile-ud-label">Address</span>
																	<span class="profile-ud-value"><?= $registration->address; ?></span>
																</div>
															</div>
														</div><!-- .profile-ud-list -->
													</div><!-- .nk-block -->
													<div class="nk-block">
														<div class="nk-block-head nk-block-head-line">
															<h6 class="title overline-title text-base">Additional Information</h6>
														</div><!-- .nk-block-head -->
														<div class="profile-ud-list">
															<div class="profile-ud-item">
																<div class="profile-ud wider">
																	<span class="profile-ud-label">Joining Date</span>
																	<span class="profile-ud-value">08-16-2018 09:04PM</span>
																</div>
															</div>
															<div class="profile-ud-item">
																<div class="profile-ud wider">
																	<span class="profile-ud-label">Reg Method</span>
																	<span class="profile-ud-value">Email</span>
																</div>
															</div>
															<div class="profile-ud-item">
																<div class="profile-ud wider">
																	<span class="profile-ud-label">Country</span>
																	<span class="profile-ud-value">United State</span>
																</div>
															</div>
															<div class="profile-ud-item">
																<div class="profile-ud wider">
																	<span class="profile-ud-label">Nationality</span>
																	<span class="profile-ud-value">United State</span>
																</div>
															</div>
														</div><!-- .profile-ud-list -->
													</div><!-- .nk-block -->
													<div class="nk-divider divider md"></div>
													<div class="nk-block">
														<div class="nk-block-head nk-block-head-sm nk-block-between">
															<h5 class="title">Admin Note</h5>
															<a href="#" class="link link-sm">+ Add Note</a>
														</div><!-- .nk-block-head -->
														<div class="bq-note">
															<div class="bq-note-item">
																<div class="bq-note-text">
																	<p>Aproin at metus et dolor tincidunt feugiat eu id quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean sollicitudin non nunc vel pharetra. </p>
																</div>
																<div class="bq-note-meta">
																	<span class="bq-note-added">Added on <span class="date">November 18, 2019</span> at <span class="time">5:34 PM</span></span>
																	<span class="bq-note-sep sep">|</span>
																	<span class="bq-note-by">By <span>Softnio</span></span>
																	<a href="#" class="link link-sm link-danger">Delete Note</a>
																</div>
															</div><!-- .bq-note-item -->
															<div class="bq-note-item">
																<div class="bq-note-text">
																	<p>Aproin at metus et dolor tincidunt feugiat eu id quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean sollicitudin non nunc vel pharetra. </p>
																</div>
																<div class="bq-note-meta">
																	<span class="bq-note-added">Added on <span class="date">November 18, 2019</span> at <span class="time">5:34 PM</span></span>
																	<span class="bq-note-sep sep">|</span>
																	<span class="bq-note-by">By <span>Softnio</span></span>
																	<a href="#" class="link link-sm link-danger">Delete Note</a>
																</div>
															</div><!-- .bq-note-item -->
														</div><!-- .bq-note -->
													</div><!-- .nk-block -->
												</div><!-- .card-inner -->
											</div><!-- .card-content -->
											<div class="card-aside card-aside-right user-aside toggle-slide toggle-slide-right toggle-break-xxl" data-content="userAside" data-toggle-screen="xxl" data-toggle-overlay="true" data-toggle-body="true">
												<div class="card-inner-group" data-simplebar>
													<div class="card-inner">
														<div class="user-card user-card-s2">
															<div class="user-avatar lg bg-primary">
																<span>AB</span>
															</div>
															<div class="user-info">
																<div class="badge badge-outline-light badge-pill ucap">Investor</div>
																<h5>Abu Bin Ishtiyak</h5>
																<span class="sub-text">info@softnio.com</span>
															</div>
														</div>
													</div><!-- .card-inner -->
													<div class="card-inner card-inner-sm">
														<ul class="btn-toolbar justify-center gx-1">
															<li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-shield-off"></em></a></li>
															<li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-mail"></em></a></li>
															<li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-download-cloud"></em></a></li>
															<li><a href="#" class="btn btn-trigger btn-icon"><em class="icon ni ni-bookmark"></em></a></li>
															<li><a href="#" class="btn btn-trigger btn-icon text-danger"><em class="icon ni ni-na"></em></a></li>
														</ul>
													</div><!-- .card-inner -->
													<div class="card-inner">
														<div class="overline-title-alt mb-2">In Account</div>
														<div class="profile-balance">
															<div class="profile-balance-group gx-4">
																<div class="profile-balance-sub">
																	<div class="profile-balance-amount">
																		<div class="number">2,500.00 <small class="currency currency-usd">USD</small></div>
																	</div>
																	<div class="profile-balance-subtitle">Invested Amount</div>
																</div>
																<div class="profile-balance-sub">
																	<span class="profile-balance-plus text-soft"><em class="icon ni ni-plus"></em></span>
																	<div class="profile-balance-amount">
																		<div class="number">1,643.76</div>
																	</div>
																	<div class="profile-balance-subtitle">Profit Earned</div>
																</div>
															</div>
														</div>
													</div><!-- .card-inner -->
													<div class="card-inner">
														<div class="row text-center">
															<div class="col-4">
																<div class="profile-stats">
																	<span class="amount">23</span>
																	<span class="sub-text">Total Order</span>
																</div>
															</div>
															<div class="col-4">
																<div class="profile-stats">
																	<span class="amount">20</span>
																	<span class="sub-text">Complete</span>
																</div>
															</div>
															<div class="col-4">
																<div class="profile-stats">
																	<span class="amount">3</span>
																	<span class="sub-text">Progress</span>
																</div>
															</div>
														</div>
													</div><!-- .card-inner -->
													<div class="card-inner">
														<h6 class="overline-title-alt mb-2">Additional</h6>
														<div class="row g-3">
															<div class="col-6">
																<span class="sub-text">User ID:</span>
																<span>UD003054</span>
															</div>
															<div class="col-6">
																<span class="sub-text">Last Login:</span>
																<span>15 Feb, 2019 01:02 PM</span>
															</div>
															<div class="col-6">
																<span class="sub-text">KYC Status:</span>
																<span class="lead-text text-success">Approved</span>
															</div>
															<div class="col-6">
																<span class="sub-text">Register At:</span>
																<span>Nov 24, 2019</span>
															</div>
														</div>
													</div><!-- .card-inner -->
													<div class="card-inner">
														<h6 class="overline-title-alt mb-3">Groups</h6>
														<ul class="g-1">
															<li class="btn-group">
																<a class="btn btn-xs btn-light btn-dim" href="#">investor</a>
																<a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em class="icon ni ni-cross"></em></a>
															</li>
															<li class="btn-group">
																<a class="btn btn-xs btn-light btn-dim" href="#">support</a>
																<a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em class="icon ni ni-cross"></em></a>
															</li>
															<li class="btn-group">
																<a class="btn btn-xs btn-light btn-dim" href="#">another tag</a>
																<a class="btn btn-xs btn-icon btn-light btn-dim" href="#"><em class="icon ni ni-cross"></em></a>
															</li>
														</ul>
													</div><!-- .card-inner -->
												</div><!-- .card-inner -->
											</div><!-- .card-aside -->
										</div><!-- .card-aside-wrap -->
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
<!-- app-root @e -->



<!-- JavaScript -->
<?php $this->load->view('backend/includes/scripts'); ?>
<!-- /JavaScript -->



</body>

</html>
