<?php
$submit_succ=1;
$limit="LIMIT 10" ;
?>		

 <style type='text/css'>
 .page-bar .page-breadcrumb > li > a, .page-bar .page-breadcrumb > li  
 {
    color: #888;
    font-size: 13px;
    text-shadow: none;
}
option 
{
    border-top:1px solid #CACACA;
    padding:4px;
	cursor:pointer;
}
select 
{
	cursor:pointer;
}
.text_price_box 
{
  width:120px;
  display:initial;
  font-size:12px;
 height:28px
}

</style>


				
<div class="page-bar">
    <ul class="page-breadcrumb">
        
        <?php
        if(!empty($search_by_meta))
        {
            ?> 
            <li>
                <i class="fa fa-home"></i>
                Keyword
                <i class="fa fa-angle-right"></i>
            </li>
            <li> <?php echo $search_by_meta; ?></li>									
           <?php 
        }
        else if(!empty($categories_id))
        {
        ?>
            <li>
            <i class="fa fa-home"></i>
            Category
             <i class="fa fa-angle-right"></i>
            </li>
            <li> <?php echo $categories_nm['Categorie']['categories']; ?></li>
            <?php 
        }
        else if(!empty($sub_categories_id))
        {
                ?>
               <li>
            <i class="fa fa-home"></i>
            Category
             <i class="fa fa-angle-right"></i>
            </li>
            <li> <?php echo $this->Html->link($categories_nm, array('action' => 'categories_details', '?' => array('categories_id' => $categories_id_sub)), array('escape' => false)); ?>  
             <i class="fa fa-angle-right"></i>
             </li>
            <li> <?php echo $sub_categories_nm ; ?> </li>
        
            <?php
        }
                ?>

            </ul>
                        
</div>
  
<!-- END PAGE HEADER-->



<!-- ******************************* ******* content start side bar ***********************************************  -->
<?php

if(!empty($search_by_meta) || !empty($categories_id) || !empty($sub_categories_id))
{
?>
<table r class="table table-striped table-bordered table-hover dataTable no-footer">
<thead>
<tr role="row" class="heading">
<th colspan="1" rowspan="1" tabindex="0" >Date&nbsp;Sorting </th>
<th colspan="1" rowspan="1" tabindex="0">Price&nbsp;Sorting</th>
<th colspan="1" rowspan="1" tabindex="0"  >Price&nbsp;Range</th>
<th colspan="1" rowspan="1" tabindex="0" >Sub&nbsp;Categories</th>

</tr>
<tr role="row" class="filter"><td >
        <select class="table-group-action-input form-control input-inline input-small input-sm select_box" name="order" onChange="accending_disending(this.value,'<?php echo @$categories_id ; ?>','<?php echo @$search_by_meta; ?>','<?php echo @$sub_categories_id; ?>','1');" >
                        <option value="" >--Sorting--</option>
                        <option value="date ASC" >Ascending</option>
                        <option value="date DESC" >Descending</option>
          </select> 
    </td><td>
       <select class="table-group-action-input form-control input-inline input-small input-sm select_box"  name="order_way" onChange="accending_disending(this.value,'<?php echo @$categories_id ; ?>','<?php echo @$search_by_meta; ?>','<?php echo @$sub_categories_id; ?>','1');">
                        <option value="" >--Sorting--</option>
                        <option value="price ASC" >Ascending</option>
                        <option value="price DESC" >Descending</option>
                    </select>
    </td><td>
        <input type="text"  class="filterme  form-control input-small  text_price_box" autocomplete="off"  placeholder="Min" value="<?php  echo @$min_price ;?>" name="min_price" id="min_price"/>  
          <input type="text"  class="filterme  form-control input-small text_price_box" required autocomplete="off" placeholder="Max" value="<?php  echo@ $max_price ;?>" name="max_price" id="max_price"/>  
          
            <button class="btn btn-sm yellow filter-submit margin-bottom"  onclick="accending_disending('Classified_post.id DESC','<?php echo @$categories_id ; ?>','<?php echo @$search_by_meta; ?>','<?php echo @$sub_categories_id; ?>','2');"><i class="fa fa-search"></i> Search</button>
      
    </td>
    <td >
       <select class="table-group-action-input form-control input-inline input-small input-sm divider" onchange="location = this.options[this.selectedIndex].value;">
       <option value=""> --Select--</option>
           <?php $i=0;
			foreach ($sub_categories_arr as $sub_categories_ftc) 
			{ 
				if($sub_categories_ftc['Sub_categorie']['id']==$sub_categories_id)
				{
					$selected='selected=selected';
				}
				else
				{
					$selected='';
				}
				?> 
			<?php echo  '<option class="c" value="categories_details?sub_categories_id='.$sub_categories_ftc['Sub_categorie']['id'].'" '.$selected.'>'.$sub_categories_ftc['Sub_categorie']['sub_categories'].'</option>'; ?> 
			<?php } ?>
            </select>
    </td>
  </tr>
</thead>
</table>

    <?php 
	
	if(!empty($categories_id))
	{
		$sub_categories_id="";
	}
	if(!empty($sub_categories_id))
	{
		$categories_id="";
		$categories_id=$categories_id_sub;
	}
	
}

		?>
       
       
      <!-- ******************************* ******* content end side bar ***********************************************  -->
      
         <!-- ******************************* ******* content start post inventory  ***********************************************  -->
         <div class="row">
					<div class="col-md-12">
						<!-- Begin: life time stats -->
						<div class="portlet light">
							<div class="portlet-body">
                             <div id="sorting_ase_desc" >     
                              <input id="sub_categories_id" type="hidden" class="form-control" value="<?php echo @$sub_categories_id;  ?>">
                                <input id="categories_id" type="hidden"class="form-control" value="<?php echo @$categories_id;  ?>">
                                <input id="search_by_meta" type="hidden" class="form-control" value="<?php echo @$search_by_meta;  ?>">
                                <input id="order_by" type="hidden" class="form-control" value="<?php echo @$order_by;  ?>">
                                <input id="min_price" type="hidden" class="form-control" value="<?php echo @$min_price;  ?>">
                                <input id="max_price" type="hidden" class="form-control" value="<?php echo @$max_price;  ?>">
                             <?php
							 $row_count=2;
							 foreach($classified_posts_arr as $ftc_classified_post)
							{
								$classified_post_date_show=date("d-M-Y",strtotime($ftc_classified_post['Classified_post']['date']));
								
								$photo_arr=explode(',', $ftc_classified_post['Classified_post']['photo']);
								$photo_first=$photo_arr[0];
								
								$return_array=$this->requestAction(array('controller' => 'Nonmovinginventory', 'action' => 'find_city_states_sub_category'),array('pass'=>array($ftc_classified_post['Classified_post']['city_id'],$ftc_classified_post['Classified_post']['sub_category_id'])));
								
								$city_name=$return_array[0];
								$states=$return_array[1];
								$sub_categories=$return_array[2];
								if($row_count%2==0)
								{
									?>
                                    <div class="row">
									<?php
								}
								
								?>
                                 	
                                  		<div class="col-md-6 col-sm-12">
                                       		 <div class="portlet blue-hoki box">
                                             
								 				<div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-cogs"></i><a style="color:#FFF" class="search-result-title  " href="ads_details?post_id=<?php echo $ftc_classified_post['Classified_post']['id'] ; ?>" ><?php echo @$sub_categories; ?> ( <?php echo $ftc_classified_post['Classified_post']['product_name']; ?> )</a>
                                                    </div>
                                                </div>
									
												<div class="portlet-body">
															<div class="row static-info">
																<div class="col-md-12 value">
                                                                
                                               					 	<div  style="overflow:auto;margin-bottom:10px" class="col-sm-8 " >
                                                   
													
                                                                        <p class="description"> <b>Price :  <img src="<?PHP echo $this->webroot; ?>images/image/rupees.jpg" style="width:12px"></b>   <?php echo $ftc_classified_post['Classified_post']['price'] ; ?> </p>
                                                                        <p class="description"> <b>Brand :</b>   <?php echo $ftc_classified_post['Classified_post']['brand'] ; ?> </p>
                                                                        <p class="description"> <b>Stock :</b>   <?php echo $ftc_classified_post['Classified_post']['stock'];  echo " (".$ftc_classified_post['Classified_post']['sku'].")" ; ?> </p>
                                                                      <!--  <p class="description"> <b>Post Date :</b>   <?php echo $classified_post_date_show ; ?> </p>-->
                                                                        <p class="description"> <b>Location :</b>   <?php echo $city_name ; ?> ( <?php echo $states ; ?> )
                                                                         </p>
                                                                        <span class="is_r_featured"></span>
                                                                
                                                                    </div>
																	<a href="#product-pop-up" class="btn btn-default fancybox-fast-view"></a>
                                                                 <div class="col-sm-2 ">
                                                                    <a href="ads_details?post_id=<?php echo $ftc_classified_post['Classified_post']['id']; ?>" class="btn-block result-details-link">
                                                                   <div style="height:150px;width:150px"> 
                                                                    <img style="border:1px solid #67809F; border-radius:5px 5px 5px 5px;" alt="Post Images" class="img-res" width="100%"  height="90%"  src="<?php if(empty($photo_first)){ echo $this->webroot; ?>images/image/no_pic.gif<?php } else { echo $this->webroot; ?>images_post/<?php echo $ftc_classified_post['Classified_post']['user_id']."/".$ftc_classified_post['Classified_post']['id']."/".$photo_first; } ?>" />  <a href="ads_details?post_id=<?php echo $ftc_classified_post['Classified_post']['id'] ; ?>" class="btn blue-hoki btn-sm" style="width:100%; padding-top:3px; margin-top:1px;"><i class="fa fa-th-large"></i> <b>Details</b></a>
                                                         
                                                                    </div>
                                                                    </a>
                                                                </div>
										
                                                        </div>
                                                    </div> 
                                                </div>
                               			 </div>
									</div> 
                                    <?php
                                    if($row_count%2!=0)
									{
										
										?>
										</div>
										<?php
									
									}
									$row_count++;
								
							}
							?>
                                <div id="lode_more_1" >   <input name="page"  class="form-control" id="page" type="hidden" value="1">  </div>
 								</div>
											
								</div>	
							</div>
						</div>
						<!-- End: life time stats -->
					</div>
				</div>

   
             <!-- ******************************* ******* content end post inventory  ***********************************************  -->

<?php
	
/////////////////////////////////////////////////////////////   ******* content end **************////////////////////////////////////////////////////////////////

	?>		

  
  

<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>

<script>

$(document).scroll(function(e){

    // grab the scroll amount and the window height
    var scrollAmount = $(window).scrollTop();
    var documentHeight = $(document).height();
	// alert(documentHeight);
    // calculate the percentage the user has scrolled down the page
    var scrollPercent = (scrollAmount / documentHeight) * 100;

    if(scrollPercent >50) {
	
	
     doSomething();
    }
});


</script>

<script>

  $('.filterme').keypress(function(eve) 
 {
	 
  if ((  eve.which != 46 ||  $(this).val().indexOf('.') != -1) && (eve.which < 48 || eve.which > 57 ) && eve.which != 8 && eve.which != 0 || (eve.which == 46 && $(this).caret().start == 0) ) 
	  {
		eve.preventDefault();
			alert('Please insert only numeric value.');
	  }
// this part is when left part of number is deleted and leaves a . in the leftmost position. For example, 33.25, then 33 is deleted

	 $('.filterme').keyup(function(eve)
	  {
		  if($(this).val().indexOf('.') == 0)
		   { 
			  
			  $(this).val($(this).val().substring(1));
		   }
	 });
});

</script>

