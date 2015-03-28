
				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12">
						
						<!-- Begin: life time stats -->
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift font-green-sharp"></i>
									<span class="caption-subject font-green-sharp bold uppercase">Products</span>
									<span class="caption-helper">manage products...</span>
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-container">
									<div class="table-actions-wrapper">
										<span>
										</span>
										<select class="table-group-action-input form-control input-inline input-small input-sm">
											<option value="">Select...</option>
											<option value="publish">Publish</option>
											<option value="unpublished">Un-publish</option>
											<option value="delete">Delete</option>
										</select>
										<button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit</button>
									</div>
									<table class="table table-striped table-bordered table-hover" id="datatable_products">
									<thead>
									<tr role="row" class="heading">
										<th width="1%">
											<input type="checkbox" class="group-checkable">
										</th>
										<th width="10%">
											 ID
										</th>
										<th width="15%">
											 Product&nbsp;Name
										</th>
										<th width="15%">
											 Category
										</th>
										<th width="10%">
											 Price
										</th>
										<th width="10%">
											 Quantity
										</th>
										<th width="15%">
											 Date&nbsp;Created
										</th>
										<th width="10%">
											 Status
										</th>
										<th width="10%">
											 Actions
										</th>
									</tr>
									<tr role="row" class="filter">
										<td>
										</td>
										<td>
											<input type="text" class="form-control form-filter input-sm" name="product_id">
										</td>
										<td>
											<input type="text" class="form-control form-filter input-sm" name="product_name">
										</td>
										<td>
											<select name="product_category" class="form-control form-filter input-sm">
												<option value="">Select...</option>
												
											</select>
										</td>
										<td>
											<div class="margin-bottom-5">
												<input type="text" class="form-control form-filter input-sm" name="product_price_from" placeholder="From"/>
											</div>
											<input type="text" class="form-control form-filter input-sm" name="product_price_to" placeholder="To"/>
										</td>
										<td>
											<div class="margin-bottom-5">
												<input type="text" class="form-control form-filter input-sm" name="product_quantity_from" placeholder="From"/>
											</div>
											<input type="text" class="form-control form-filter input-sm" name="product_quantity_to" placeholder="To"/>
										</td>
										<td>
											<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
												<input type="text" class="form-control form-filter input-sm" readonly name="product_created_from" placeholder="From">
												<span class="input-group-btn">
												<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
											<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
												<input type="text" class="form-control form-filter input-sm" readonly name="product_created_to " placeholder="To">
												<span class="input-group-btn">
												<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
										</td>
										<td>
											<select name="product_status" class="form-control form-filter input-sm">
												<option value="">Select...</option>
												<option value="published">Published</option>
												<option value="notpublished">Not Published</option>
												<option value="deleted">Deleted</option>
											</select>
										</td>
										<td>
											
										</td>
									</tr>
									</thead>
									<tbody>
                                    <tr class="odd" role="row"><td><div class="checker"><span><input name="id[]" value="1" type="checkbox"></span></div></td><td class="sorting_1">1</td><td>Test Product</td><td>Mens/FootWear</td><td>185.50$</td><td>585</td><td>05/01/2011</td><td><span class="label label-sm label-danger">Deleted</span></td><td><a href="ecommerce_products_edit.html" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a></td></tr>
									</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- End: life time stats -->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
		</div>
		<!-- END CONTENT -->
		
	</div>
	<!-- END CONTAINER -->
	