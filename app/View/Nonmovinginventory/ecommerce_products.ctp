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
                                    
                                    <th width="11%">
                                        Product Id
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
                                         Stock
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
                                        <input type="text" class="form-control form-filter input-sm" name="product_id">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-filter input-sm" name="product_name">
                                    </td>
                                    <td>
                                        <select name="product_category" class="form-control form-filter input-sm">
                                            <option value="">Select...</option>
                                            <?php
											foreach($arr_categories as $value)
											{ 
												$categories=$value ['categorie']['categories'];
												$categories_id=$value['categorie']['id'];
												?>
												<option  value="<?php echo $categories_id; ?>" ><?php echo $categories ; ?></option>
												 <?php
											}
											?>
                                        </select>
                                        
                                        <select name="product_subcategory" class="form-control form-filter input-sm" style="margin-top:5px;">
                                            <option value="">Select...</option>
                                            <?php
											foreach($arr_subcategories as $value)
											{ 
												$sub_categories=$value ['sub_categorie']['sub_categories'];
												$sub_categories_id=$value ['sub_categorie']['id'];
												?>
												<option  value="<?php echo $sub_categories_id; ?>" ><?php echo $sub_categories ; ?></option>
												 <?php
											}
											?>
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
                                            <?php
											foreach($arr_status as $value)
											{ 
											?>
											<option value="<?php echo $value['status']['id']; ?>"><?php echo $value['status']['status_name']; ?></option>
											<?php
											}
											?>
                                        </select>
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
								foreach($arr_classified as $value)
								{
									 $status_id=$value['classified_post']['status'];
									 $return_array=$this->requestAction(array('controller' => 'Nonmovinginventory', 'action' => 'find_status'),array('pass'=>array($status_id)));
									 foreach($return_array as $status_name_fetch)
                                     { 
									 	$status_name=$status_name_fetch['status']['status_name'];
									 }
									?>
                                <tr ><td class="sorting_1"><?php echo $value['classified_post']['id']; ?></td><td><?php echo $value['classified_post']['product_name']; ?></td><td>Mens/FootWear</td><td><?php echo $value['classified_post']['price']; ?></td><td><?php echo $value['classified_post']['stock']; ?></td><td><?php echo date('d-m-Y', strtotime($value['classified_post']['date'])); ?></td><td><?php if($status_id=='1'){ ?><span class="label label-sm label-success"><?php } else if($status_id=='2'){ ?><span class="label label-sm label-info"><?php }  else if($status_id=='3'){ ?><span class="label label-sm label-danger"><?php }  echo $status_name; ?></span> </td><td><a href="ecommerce_products_edit" class="btn btn-xs default btn-editable"><i class="fa fa-pencil"></i> Edit</a></td></tr>
                                <?php
								}
								?>
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
	