


<?php
foreach($classified_posts_arr as $ftc_classified_post)
		{
			$photo=$ftc_classified_post['Classified_post']['photo'];	
			
			$short_description=$ftc_classified_post['Classified_post']['short_description'];
			$description=$ftc_classified_post['Classified_post']['description'];	
			$sub_categories_id=$ftc_classified_post['Classified_post']['sub_category_id'];	
			
			$brand=$ftc_classified_post['Classified_post']['brand'];	
			
			$classified_post_id=$ftc_classified_post['Classified_post']['id'];	
			
			$price=$ftc_classified_post['Classified_post']['price'];	
			
			$product_name=$ftc_classified_post['Classified_post']['product_name'];	
			
			$city_id=$ftc_classified_post['Classified_post']['city_id'];	
		
			$time=$ftc_classified_post['Classified_post']['time'];	
			$part_no=$ftc_classified_post['Classified_post']['part_no'];	
	
			$location_address=$ftc_classified_post['Classified_post']['location_address'];	
			$user_id=$ftc_classified_post['Classified_post']['user_id'];	
			$year=$ftc_classified_post['Classified_post']['year_of_manufacture'];	
			$date=$ftc_classified_post['Classified_post']['date'];	
			$stock=$ftc_classified_post['Classified_post']['stock'];	
			$classified_post_date_show=date("d-M-Y",strtotime($date));
			
			if(empty($photo))
			{
			$img_cnt=0;	
			}
			else
			{
				@$photo_arr=explode(',', $photo);
				$img_cnt=sizeof($photo_arr);
				$photo_first=$photo_arr[0];
			}
			$return_array=$this->requestAction(array('controller' => 'Nonmovinginventory', 'action' => 'find_city_states_sub_category'),array('pass'=>array($city_id,$sub_categories_id)));
			
			$city_name=$return_array[0];
			$states=$return_array[1];
			$sub_categories=$return_array[2];
			$categories=$return_array[3];
					
			
				}
				
                ?>
                <style>
				.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
   background: #E6400C;
   color: #fff;
}
</style>
 <div  class="row">
	<div class="col-md-12">
            <div class="product-page">
              <div class="row">
                <div class="col-md-3 col-sm-6">
                  <div style="position: relative; overflow: hidden;" class="product-main-image">
              
                      <img  src="<?php if(empty($photo_first)){ echo $this->webroot; ?>images/image/no_pic.gif<?php } else { echo $this->webroot; ?>images_post/<?php echo $ftc_classified_post['Classified_post']['user_id']."/".$ftc_classified_post['Classified_post']['id']."/".$photo_first; } ?>" data-bigimgsrc="<?PHP echo $this->webroot; ?>images_post/<?php if(empty($photo)){ ?>no_pic.gif<?php } else { echo @$photo_first; } ?>"/>
                      
                  <img style="position: absolute; top: -25.2695px; left: -11.9843px; opacity: 0; width: 600px; height: 800px; border: medium none; max-width: none;" class="zoomImg" src="<?php if(empty($photo_first)){ echo $this->webroot; ?>images/image/no_pic.gif<?php } else { echo $this->webroot; ?>images_post/<?php echo $ftc_classified_post['Classified_post']['user_id']."/".$ftc_classified_post['Classified_post']['id']."/".$photo_first; } ?>">
                  </div>
                  <div class="product-other-images">
                  <?php
				  foreach($photo_arr as $photos)
				  {
					  ?>
					  <a href="<?php echo $this->webroot; ?>images_post/<?php echo $ftc_classified_post['Classified_post']['user_id']."/".$ftc_classified_post['Classified_post']['id']."/".$photos;  ?>" class="fancybox-button" rel="photos-lib"><img alt="<?php echo $sub_categories; ?> ( <?php echo $product_name; ?> )"  src="<?php if(empty($photo)){ echo $this->webroot; ?>images/image/no_pic.gif<?php } else { echo $this->webroot; ?>images_post/<?php echo $ftc_classified_post['Classified_post']['user_id']."/".$ftc_classified_post['Classified_post']['id']."/".$photos; } ?>" style="width:58px; height:70px;"></a>
                      
                      <?php
				  }
				  ?>
                 
                  </div>
                </div>
                <div class="col-md-9 col-sm-6">
                  <h1><?php echo $sub_categories; ?> ( <?php echo $product_name; ?> )</h1>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span><img src="<?PHP echo $this->webroot; ?>images/image/rupees.jpg" style="width:12px"></span><?php echo $price ; ?></strong>
                      
                    </div>
                    <div class="availability">
                      Availability: <strong>In Stock</strong>
                    </div>
                  </div>
                  <div class="description">
                    <p><?php echo $short_description; ?></p>
                  </div>
                  <hr/>
                <div class="location">
                    <p><?php echo $city_name; ?> ( <?php echo $states; ?> )</p>
                  </div>
               
                 <hr/>
                 <!-- <div class="product-page-cart ">
                    <div class="product-quantity">
                        <div class="input-group bootstrap-touchspin input-group-sm"><span class="input-group-btn">
                        	<button class="btn quantity-down bootstrap-touchspin-down" type="button"><i class="fa fa-angle-down"></i></button></span><span style="display: none;" class="input-group-addon bootstrap-touchspin-prefix"></span><input style="display: block;" id="product-quantity" value="1" readonly="" class="form-control input-sm" type="text"><span style="display: none;" class="input-group-addon bootstrap-touchspin-postfix"></span><span class="input-group-btn"><button class="btn quantity-up bootstrap-touchspin-up" type="button"><i class="fa fa-angle-up"></i></button></span></div>
                    </div>-->
                    <a aria-expanded="false" class="accordion-toggle collapsed btn btn-primary" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1">
													Enquiry </a>
                  <!--  <button class="btn btn-primary" type="submit">Enquiry</button>-->
                    <div style="height: 0px;" aria-expanded="false" id="accordion1_1" class="panel-collapse collapse">
													<div class="panel-body">
														
                                                      <!-- BEGIN FORM-->
                                                    <form id="regform" name="regform">
                                                        <h2>Write a Enquiry</h2>
                                                        <div class="form-group">
                                                          <label for="name">Name <span class="require">*</span></label>
                                                          <input class="form-control" id="name" name="name" type="text">
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="email">Email</label>
                                                          <input class="form-control" id="email" name="email" type="text">
                                                        </div>
                                                         <div class="form-group">
                                                          <label for="phone">Phone No. <span class="require">*</span></label>
                                                          <input class="form-control" id="phone" type="text" name="phone_no">
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="message">Message</label>
                                                          <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                                                        </div>
                                                       <input type="hidden" value="<?php echo $email_id; ?>" id="email_to" />
                                                        <div class="padding-top-20">                  
                                                        <!--  <button type="submit" class="btn btn-primary">Send</button>-->
                                                          <a class="btn btn-primary" id="notific8_show" >
															<i class="fa fa-mail-forward"></i> Send </a>
                                                            
                                                        </div>
                                                    </form>
                                                      <!-- END FORM--> 
													</div>
												</div>
                                                <div id="enquiry_loading">
                                                </div>
                  </div>
                 
                  <!--   Show Notification    ------->
                                   <input id="notific8_heading" value="Send Your Enquiry"  type="hidden">
                                   <input id="notific8_text" value="Successfully send your message." type="hidden" >
                                    <select id="notific8_life" style="visibility:hidden">
                                        <option value="10000" selected="selected">10 seconds (default)</option>
                                    </select>
                                    <select id="notific8_theme" style="visibility:hidden">
                                        <option value="teal" selected="selected">teal (default)</option>
                                    </select>
									<select id="notific8_pos_hor" style="visibility:hidden">
                                        <option value="top">top (default)</option>
                                    </select>
                                    <select id="notific8_pos_ver" style="visibility:hidden">
                                        <option value="right">right (default)</option>
                                    </select>
								
								<!--   End Notification    ------->
									
								
                
                </div>
 
                <div class="product-page-content">
                  <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#Description" data-toggle="tab" >Description</a></li>
                    <li><a href="#Information" data-toggle="tab">Information</a></li>
                  <!--  <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (2)</a></li>-->
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="Description">
                      <p><?php echo $description ; ?></p>
                    </div>
                    <div class="tab-pane fade" id="Information">
                     
                      <table class="datasheet">
                        <tbody><tr>
                          <th colspan="2">Additional features</th>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Brand</td>
                          <td><?php echo $brand ; ?></td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Stock</td>
                          <td><?php echo $stock ; ?></td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Part No.</td>
                          <td><?php echo $part_no ; ?></td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Year of Manufacturing</td>
                          <td><?php echo $year ; ?></td>
                        </tr>
                       
                      </tbody></table>
                    </div>
                  <!--  <div class="tab-pane fade in active" id="Reviews">
                   
                      <div class="review-item clearfix">
                        <div class="review-item-submitted">
                          <strong>Bob</strong>
                          <em>30/12/2013 - 07:37</em>
                          <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true" data-rateit-readonly="true"><button style="display: none;" id="rateit-reset-3" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-3"></button><div aria-readonly="true" style="width: 80px; height: 16px;" id="rateit-range-3" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-3" aria-valuemin="0" aria-valuemax="5" aria-valuenow="5"><div class="rateit-selected rateit-preset" style="height: 16px; width: 80px;"></div><div class="rateit-hover" style="height:16px"></div></div></div>
                        </div>                                              
                        <div class="review-item-content">
                            <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem.</p>
                        </div>
                      </div>
                      <div class="review-item clearfix">
                        <div class="review-item-submitted">
                          <strong>Mary</strong>
                          <em>13/12/2013 - 17:49</em>
                          <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true" data-rateit-readonly="true"><button style="display: none;" id="rateit-reset-4" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-4"></button><div aria-readonly="true" style="width: 80px; height: 16px;" id="rateit-range-4" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-4" aria-valuemin="0" aria-valuemax="5" aria-valuenow="2.5"><div class="rateit-selected rateit-preset" style="height: 16px; width: 40px;"></div><div class="rateit-hover" style="height:16px"></div></div></div>
                        </div>                                              
                        <div class="review-item-content">
                            <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris bibendum orci, a sodales lectus purus ut lorem.</p>
                        </div>
                      </div>

                     
                      <form action="#" class="reviews-form" role="form">
                        <h2>Write a review</h2>
                        <div class="form-group">
                          <label for="name">Name <span class="require">*</span></label>
                          <input class="form-control" id="" type="text">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input class="form-control" id="" type="text">
                        </div>
                        <div class="form-group">
                          <label for="review">Review <span class="require">*</span></label>
                          <textarea class="form-control" rows="8" id="review"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="email">Rating</label>
                          <input style="display: none;" value="4" step="0.25" id="backing5" type="range">
                          <div class="rateit" data-rateit-backingfld="#backing5" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                          <button style="display: none;" id="rateit-reset-5" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-5"></button><div aria-readonly="false" style="width: 80px; height: 16px;" id="rateit-range-5" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-5" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4"><div class="rateit-selected rateit-preset" style="height: 16px; width: 64px;"></div><div class="rateit-hover" style="height:16px"></div></div></div>
                        </div>
                        <div class="padding-top-20">                  
                          <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                      </form>
                      
                    </div>
                  </div>-->
                </div>

                <div class="sticker sticker-sale"></div>
              </div>
            </div>
          </div>
      </div>
