<div class="row">
	<div class="col-md-12">
		<div class="portlet portlet box blue tabbable">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-gift"></i>Category Setup
				</div>
			</div>
			<div class="portlet-body">
				<ul class="nav nav-tabs">
					<li class="active">
						<a aria-expanded="true" href="#tab_1_1" data-toggle="tab">
						Add </a>
					</li>
					<li class="">
						<a aria-expanded="true" href="#tab_1_2" data-toggle="tab">
						Edit </a>
					</li>
					<li class="">
						<a aria-expanded="true" href="#tab_1_3" data-toggle="tab">
						Delete </a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="tab_1_1">
					<form method="post" name="add">
					<div class="form-group ">
						<label class="control-label col-md-3">Category Name</label>
						<input class="form-control input-inline input-medium" name="categories" placeholder="Enter Category" type="text">
						</div>
						<div class="form-group ">
							<label class="control-label col-md-3">Image Uploa</label>
							<div class="col-md-9">
								<div class="fileinput fileinput-new" data-provides="fileinput">
									<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
										
									<!--	<img src="<?php echo $this->webroot; ?>images/180x100.png" alt="" >-->
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
									</div>
									<div>
										<span class="btn default btn-file">
										<span class="fileinput-new">
										Select image </span>
										<span class="fileinput-exists">
										Change </span>
										<input name="category_images" type="file">
										</span>
										<a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
										Remove </a>
									</div>
								</div>
								
							</div>
						</div>
						<button type="submit" class="btn blue">Add</button>
						<?php
						if(!empty($wrong))
						{
						?><div class="clearfix margin-top-10">
							<span class="label label-danger">
									NOTE! </span><?php echo $wrong; ?>
									</div>
							 <?php
						}
						?>
						
					</form>
					</div>
					<div class="tab-pane fade" id="tab_1_2">
						<p>
							 Raw denisddsfdm you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
						</p>
					</div>
					<div class="tab-pane fade" id="tab_1_3">
						<p>
							 Rawddsssdd denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>			
</div>