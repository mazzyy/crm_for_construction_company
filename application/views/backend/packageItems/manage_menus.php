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
												<h3 class="nk-block-title page-title">Packages Items</h3>

											</div><!-- .nk-block-head-content -->
											<!-- <a href="<?= base_url('menus/add'); ?>" class="btn btn-primary"><em class="icon ni ni-plus"></em></a> -->
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
											<em class="icon ni ni-plus"></em>
											</button>
										</div><!-- .nk-block-between -->
									</div><!-- .nk-block-head -->
									<div class="card card-preview">
										<div class="card-inner">
											<table class="datatable-init table">
												<thead>
												<tr>
												<th>Sno#</th>
													<th>Items</th>
													<th>Price</th>
													<th>Quantity</th>
												
													<th>Action</th>
													
												</tr>
												</thead>
												<tbody>
												
												<tr>
													<td>1</td>
													<td><span class="btn btn-info btn-xs">item1 </span> </td>
													<td>200</td>
												
													<td>50</td>
													

													<td align="center">
														<!-- <a href="/asadbahi_crm/menus/edit/11" class="btn btn-xs btn-warning"><span class="icon ni ni-edit"></span></a> -->
														<button type="button" data-toggle="modal" data-target="#exampleModal-edit" class="btn btn-xs btn-warning"><span class="icon ni ni-trash"></span></button>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Packages Items</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="#" method="POST" id="add_menu">
												<div class="row g-4">
												<div class="col-lg-12">
												<div class="form-group">
															<label class="form-label">Select Items </label>
															<div class="form-control-wrap">
																<select class="form-select form-control form-control-lg" name="states" data-placeholder="Main" name="parent" id="parent">
																	<option value="0">Main</option>
																	<option value="1">Item 1</option>
																	<option value="2">Item 2</option>
																	<option value="3">Item 3</option>
								
																</select>
															</div>
														</div>
													</div>
													<div class="col-lg-12">
														<div class="form-group">
															<label class="form-label" for="Name">Price </label>
															<div class="form-control-wrap">
																<input type="number" class="form-control" name="price" id="price" placeholder="Price" >
															</div>
														</div>
													</div>
										
													<div class="col-lg-12">
														<div class="form-group">
															<label class="form-label" for="pay-amount-1">Quantity</label>
															<div class="form-control-wrap">
															<input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity" >
															</div>
														</div>
													</div>
													
												

													

													
												</div>
										
      </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save</button>
			</div>
		</form>										
    </div>
  </div>
</div>

<!--Edit Modal -->
<div class="modal fade" id="exampleModal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Packages Items</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	<form action="#" method="POST" id="add_menu">
												<div class="row g-4">
												<div class="col-lg-12">
												<div class="form-group">
															<label class="form-label">Select Items </label>
															<div class="form-control-wrap">
																<select class="form-select form-control form-control-lg" name="items" data-placeholder="Main" name="items-edit" id="items-edit">
																	<option value="0">Main</option>
																	<option value="1">Item 1</option>
																	<option value="2">Item 2</option>
																	<option value="3">Item 3</option>
																</select>
															</div>
														</div>
													</div>
													<div class="col-lg-12">
														<div class="form-group">
															<label class="form-label" for="Name">Price </label>
															<div class="form-control-wrap">
																<input type="number" class="form-control" name="price" id="price" placeholder="Price" >
															</div>
														</div>
													</div>
										
													<div class="col-lg-12">
														<div class="form-group">
															<label class="form-label" for="pay-amount-1">Quantity</label>
															<div class="form-control-wrap">
															<input type="number" class="form-control" name="quantity" id="quantity" placeholder="Quantity" >
															</div>
														</div>
													</div>
													
												

													

													
												</div>
										
      </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save</button>
			</div>
		</form>										
    </div>
  </div>
</div>

</body>

</html>
