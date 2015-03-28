<div class="row">
					<div class="col-md-12">
						<div class="portlet box blue" id="form_wizard_1">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i> Provide Your Information
								</div>
							</div>
							<div class="portlet-body form">
								<form   class="form-horizontal" id="submit_form" method="POST">
									<div class="form-wizard">
										<div class="form-body">
											<ul class="nav nav-pills nav-justified steps">
												<li class="active">
													<a aria-expanded="true" href="#tab1" data-toggle="tab" class="step">
													<span class="number">
													1 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Organization Profile </span>
													</a>
												</li>
												<li>
													<a href="#tab2" data-toggle="tab" class="step">
													<span class="number">
													2 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Contact Details </span>
													</a>
												</li>
												<li>
													<a href="#tab3" data-toggle="tab" class="step active">
													<span class="number">
													3 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Others </span>
													</a>
												</li>
												<li>
													<a href="#tab4" data-toggle="tab" class="step">
													<span class="number">
													4 </span>
													<span class="desc">
													<i class="fa fa-check"></i> Confirm </span>
													</a>
												</li>
											</ul>
											<div id="bar" class="progress progress-striped" role="progressbar">
												<div style="width: 25%;" class="progress-bar progress-bar-success">
												</div>
											</div>
											<div class="tab-content">
												<div class="alert alert-danger display-none">
													<button class="close" data-dismiss="alert"></button>
													You have some form errors. Please check below.
												</div>
												<div class="alert alert-success display-none">
													<button class="close" data-dismiss="alert"></button>
													Your form validation is successful!
												</div>
												<div class="tab-pane active" id="tab1">
													<h3 class="block">Provide your organization details</h3>
													<div class="form-group">
														<label class="control-label col-md-3">Organization Name
														</label>
														<div class="col-md-4">
															<input class="form-control" name="organization_name" type="text">
															<span class="help-block">
															Provide your organization name </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Address for correspondence
														</label>
														<div class="col-md-4">
															<input class="form-control" name="address_for_correspondence" id="submit_form_password" type="text">
															<span class="help-block">
															Provide your address </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Year of Incorporation 
														</label>
														<div class="col-md-4">
															<input class="form-control" name="year_of_incorporation" type="text">
															<span class="help-block">
															Year of incorporation </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Website of Organization 
														</label>
														<div class="col-md-4">
															<input class="form-control" name="website_of_organization" type="text">
															<span class="help-block">
															Website of organization </span>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="tab2">
													<h3 class="block">Provide your contact details</h3>
													<div class="form-group">
														<label class="control-label col-md-3">Name of the Person
														</label>
														<div class="col-md-4">
															<input class="form-control" name="name_of_person" type="text">
															<span class="help-block">
															Provide name of the person </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Designation 
														</label>
														<div class="col-md-4">
															<input class="form-control" name="designation" type="text">
															<span class="help-block">
															Provide your designation </span>
														</div>
													</div>
													
													<div class="form-group">
														<label class="control-label col-md-3">Mobile No 
														</label>
														<div class="col-md-4">
															<input class="form-control" name="mobile_no" type="text">
															<span class="help-block">
															Provide your street address </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Landline No 
														</label>
														<div class="col-md-4">
															<input class="form-control" name="phone_no" type="text">
															<span class="help-block">
															Provide your Landline no </span>
														</div>
													</div>
													
													<div class="form-group">
														<label class="control-label col-md-3">Email ID</label>
														<div class="col-md-4">
															<input type="text" class="form-control" rows="3" name="email_id">
                                                            <span class="help-block">
															Provide your Landline no </span>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="tab3">
													<h3 class="block">Provide your others details</h3>
													<div class="form-group">
														<label class="control-label col-md-3">TIN No 
														</label>
														<div class="col-md-4">
															<input class="form-control" name="tin_no" type="text">
															<span class="help-block">
                                                            Provide your TIN No 
															</span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Pan No 
														</label>
														<div class="col-md-4">
															<input class="form-control" name="pan_no" type="text">
															<span class="help-block">
                                                             Provide your Pan No 
															</span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Category of Organization
														</label>
														<div class="col-md-4">
															<div class="radio-list">
															<?php
																	foreach($result_category_of_organization as $data)
																	{
																	$id=$data['category_of_organization']['id'];
																	$category_name=$data['category_of_organization']['category_name'];
																?> 
																<label class="radio-inline">
																<input name="category_of_organization" value="<?php echo $id ; ?>" data-title="<?php echo $category_name ; ?>" type="radio">
																<?php echo $category_name ; ?> </label>   
																
															<?php
															}
															?>
															
															</div>
															
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Type of Organization
														</label>
														<div class="col-md-6">
															<div class="checkbox-list">
															<?php
															foreach($result_organization_type as $data)
																	{
																	$id=$data['organization_type']['id'];
																	$organization_type=$data['organization_type']['organization_type'];
																?> 
																<label class="checkbox-inline">
																<input name="type_of_organization[]" value="<?php echo $id ; ?>" data-title="<?php echo $organization_type ; ?>" type="checkbox">
																<?php echo $organization_type ; ?> </label>
															<?php
															}
															?>
																
															</div>
															
														</div>
													</div>
                                                    <div class="form-group">
														<label class="control-label col-md-3">Name of Products 
														</label>
														<div class="col-md-4">
															<input class="form-control" name="name_of_products" type="text">
															<span class="help-block">
                                                             Provide your products name
															</span>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="tab4">
													<h3 class="block">Confirm your account</h3>
													<h4 class="form-section">Organization Profile</h4>
													<div class="form-group">
														<label class="control-label col-md-3">Organization Name:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="organization_name">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Address for correspondence</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="address_for_correspondence">
															</p>
														</div>
													</div>
                                                    <div class="form-group">
														<label class="control-label col-md-3">Year of Incorporation</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="year_of_incorporation">
															</p>
														</div>
													</div>
                                                    <div class="form-group">
														<label class="control-label col-md-3">Website of Organization</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="website_of_organization">
															</p>
														</div>
													</div>
													<h4 class="form-section">Profile</h4>
													<div class="form-group">
														<label class="control-label col-md-3">Name of the Person:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="name_of_person">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Designation:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="designation">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Mobile No</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="mobile_no">
															</p>
														</div>
													</div>
                                                    <div class="form-group">
														<label class="control-label col-md-3">Phone No</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="phone_no">
															</p>
														</div>
													</div>
                                                      <div class="form-group">
														<label class="control-label col-md-3">Email ID</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="email_id">
															</p>
														</div>
													</div>
													<h4 class="form-section">Others</h4>
													<div class="form-group">
														<label class="control-label col-md-3">TIN No:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="tin_no">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Pan No:</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="pan_no">
															</p>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Category of Organization</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="category_of_organization">
															</p>
														</div>
													</div>
                                                    <div class="form-group">
														<label class="control-label col-md-3">Type of Organization</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="type_of_organization[]">
															</p>
														</div>
													</div>
													 <div class="form-group">
														<label class="control-label col-md-3">Name of Products</label>
														<div class="col-md-4">
															<p class="form-control-static" data-display="name_of_products">
															</p>
														</div>
													</div>
													
												</div>
											</div>
										</div>
										<div class="form-actions">
											<div class="row">
												<div class="col-md-offset-3 col-md-9">
													<a style="display: none;" href="javascript:;" class="btn default button-previous disabled">
													<i class="m-icon-swapleft"></i> Back </a>
													<a href="javascript:;" class="btn blue button-next">
													Continue <i class="m-icon-swapright m-icon-white"></i>
													</a>
													<button type="submit" name="final_submit" style="display: none;"  class="btn green button-submit">
													Submit <i class="m-icon-swapright m-icon-white"></i>
													</button>
													
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>