<!DOCTYPE html>
<html lang="en" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8"/>
<title>Online Sell and Purchase Non Moving Inventory</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<?php Configure::write('debug', 0); 
echo $this->fetch('meta'); ?>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="<?php echo $this->webroot; ?>theme_admin/assets/global/css/fonts/font.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<!--
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery-notific8/jquery.notific8.min.css"/>
 
     <link href="<?php echo $this->webroot; ?>theme_admin/assets/frontend/onepage/css/style.css" rel="stylesheet">
  <link href="<?php echo $this->webroot; ?>theme_admin/assets/frontend/onepage/css/themes/blue.css" rel="stylesheet">
  <link href="<?php echo $this->webroot; ?>theme_admin/assets/frontend/pages/css/style-shop.css" rel="stylesheet" type="text/css">
-->
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
 <link href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
<link href="<?php echo $this->webroot; ?>theme_admin/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->

<link href="<?php echo $this->webroot; ?>theme_admin/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/admin/layout2/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/admin/layout2/css/themes/grey.css" rel="stylesheet" type="text/css" id="style_color"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="<?php echo $this->webroot; ?>theme_admin/images/shortcut_icon/non-moving-logo.png"/>
<style>

#hoverlog:hover
{
	background-color:#F1F1F1;
}
.mycolour
{
	color:#C2C1C1;
}
@media (max-width: 480px) 
{
  .navbar-brand > img
  {  
 	height:50px;
	width:160px;
	margin-right:10px;
	
  }
}
</style>
  
        <!-- ---------------------------------------------start  java script  header ---------------------------------------------   -->
         <script src="<?php echo $this->webroot; ?>assets/javascripts/jquery-411a53b27134bb9f6289afadeb2ea0b3.js"></script>
    <script src="<?php echo $this->webroot; ?>assets/javascripts/bootstrap-js-9740c835b5d9e905f6e4960383ab36a0.js"></script>
   <?php    
$this->requestAction(array('controller' => 'Nonmovinginventory', 'action' => 'ajax_function'), array());
?>   
</head>
<!-- --------------------------------start  menu  header--------------------------------------------- -->
<body class=" page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed-hide-logo  page-sidebar-closed" >
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div >
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
	
		
		<!-- BEGIN PAGE TOP -->
		<div class="page-top">
         <span class="title-main navbar-brand tk-adelle"><img src="<?php echo $this->webroot; ?>images/project_logo/non-moving-logo.png" width="200" alt="NON MOVING INVENTORY"></span>
      	  <div class="page-actions">
		<!--	<div class="btn-group">
				<button type="button" class="btn btn-circle red-pink dropdown-toggle" data-toggle="dropdown">
				<i class="icon-bar-chart"></i>&nbsp;<span class="hidden-sm hidden-xs">New&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="#">
						<i class="icon-user"></i> New User </a>
					</li>
					<li>
						<a href="#">
						<i class="icon-present"></i> New Event <span class="badge badge-success">4</span>
						</a>
					</li>
					<li>
						<a href="#">
						<i class="icon-basket"></i> New order </a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="#">
						<i class="icon-flag"></i> Pending Orders <span class="badge badge-danger">4</span>
						</a>
					</li>
					<li>
						<a href="#">
						<i class="icon-users"></i> Pending Users <span class="badge badge-warning">12</span>
						</a>
					</li>
				</ul>
			</div>-->
			<div class="btn-group">
				<button type="button" class="btn btn-circle green-haze dropdown-toggle" data-toggle="dropdown">
				<i class="icon-bell"></i>&nbsp;<span class="hidden-sm hidden-xs">Post&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="<?php echo $this->webroot; ?>Nonmovinginventory/ecommerce_new_post">
						<i class="icon-docs"></i> New Post </a>
					</li>
					<li>
						<a href="#">
						<i class="icon-tag"></i> New Comment </a>
					</li>
					<li>
						<a href="#">
						<i class="icon-share"></i> Share </a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="#">
						<i class="icon-flag"></i> Comments <span class="badge badge-success">4</span>
						</a>
					</li>
					<li>
						<a href="#">
						<i class="icon-users"></i> Feedbacks <span class="badge badge-danger">2</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
			<!-- BEGIN HEADER SEARCH BOX -->
			<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
			<form class="search-form search-form-expanded" action="<?php echo $this->webroot; ?>Nonmovinginventory/categories_details" method="GET">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search..." name="search_by_meta">
					<span class="input-group-btn">
					<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
					</span>
				</div>
			</form>
			<!-- END HEADER SEARCH BOX -->
			
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
				
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" class="img-circle" src="<?php echo $this->webroot; ?>theme_admin/assets/admin/layout2/img/avatar3_small.jpg">
						<span class="username username-hide-on-mobile">
						Php Poets </span>
						<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="<?php echo $this->webroot; ?>Nonmovinginventory/user_profile">
								<i class="icon-user"></i> My Profile </a>
							</li>
							
							
							
							<li>
                            <!--<form  action="<?php echo $this->webroot; ?>Nonmovinginventory/index" method="post">
                          <!--  <button type="submit" class="btn btn-default" style="font-size: 14px; font-weight: 300; display: block; clear: both; line-height: 18px; white-space: nowrap; padding: 8px 14px; border:none !important; background-color: transparent; width:100%; border-radius: 0px !important;" name="logout"><i class="icon-key"></i> Log Out</button>-->
                       
                          <!--  </form>-->
								<form id="form1" action="<?php echo $this->webroot; ?>Nonmovinginventory/index" method="post">
                               <input type="hidden" value="logout" name="logout">
                                <a id="hoverlog" style="color: #555; padding: 8px 14px; text-decoration: none; display: block; clear: both; line-height: 18px; white-space: nowrap; " href="#" onclick="document.getElementById('form1').submit();"><i class="icon-key"></i>&nbsp;&nbsp; Logout </a>
                            	</form>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="" >
	<div class="page-container">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar-wrapper">
       		 <div class="page-sidebar navbar-collapse collapse">
				<ul class="page-sidebar-menu page-sidebar-menu-hover-submenu page-sidebar-menu-closed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
					<li class="start active ">
						<a href="<?php echo $this->webroot; ?>Nonmovinginventory/user_index">
						<i class="icon-home"></i>
						<span class="title">Dashboard</span>
						<span class="selected"></span>
						</a>
					</li>
                    <li class="active open">
						<a href="javascript:;">
						<i class="icon-basket"></i>
						<span class="title">eCommerce</span>
						
						
						</a>
						<ul class="sub-menu">
							<li>
                                <a href="<?php echo $this->webroot; ?>Nonmovinginventory/ecommerce_new_post">
                                <i class="icon-docs"></i>
                                <span class="title">New Post</span>
                                <span class="selected"></span>
                                </a>
                            </li>
                          <li>
								<a href="<?php echo $this->webroot; ?>Nonmovinginventory/ecommerce_products">
								<i class="icon-handbag"></i>
								Products</a>
							</li>
							  <!--<li>
								<a href="ecommerce_orders.html">
								<i class="icon-basket"></i>
								Orders</a>
							</li>
							<li>
								<a href="ecommerce_orders_view.html">
								<i class="icon-tag"></i>
								Order View</a>
							</li>
                            	<li>
								<a href="ecommerce_products_edit.html">
								<i class="icon-pencil"></i>
								Product Edit</a>
							</li>-->
                              
						</ul>
					</li>
                  
					
				</ul>
				<!-- END SIDEBAR MENU -->
			</div>
		</div>
		<!-- END SIDEBAR -->
<?php    
//$this->requestAction(array('controller' => 'Nonmovinginventory', 'action' => 'menu_header'), array());
?>
<!-- --------------------------------end  menu  header--------------------------------------------- -->
<!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <div class="page-content">
                            <!-- BEGIN PAGE HEADER-->
                                <?php echo $this->fetch('content'); ?>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
 <!-- --------------------------------start  footer menu--------------------------------------------- -->
  
 <!-- BEGIN FOOTER -->
    <div class="page-prefooter">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-6 col-sm-6 padding-top-10 mycolour">
           2014 &copy; PHP POETS ALL Rights Reserved.
          </div>
          <!-- END COPYRIGHT -->
          <!-- BEGIN PAYMENTS -->
          <div class="col-md-6 col-sm-6 padding-top-10" >
            <ul class="social-footer list-unstyled list-inline pull-right">
              <li><a href="<?php echo $this->webroot; ?>Nonmovinginventory/term_services" style="font-size:17px;color:#57C8EB;"> T &amp; C</a></li>
                <li><a href="<?php echo $this->webroot; ?>Nonmovinginventory/faqs" style="font-size:17px;color:#57C8EB;">FAQ</a></li>
                <li><a href="<?php echo $this->webroot; ?>Nonmovinginventory/about_us" style="font-size:17px;color:#57C8EB;">About Us</a></li>
                <li><a href="<?php echo $this->webroot; ?>Nonmovinginventory/contact_us" style="font-size:17px;color:#57C8EB;">Contact Us</a></li>
            </ul>  
          </div>
          <!-- END PAYMENTS -->
        </div>
      </div>
       <div class="scroll-to-top">
			<i class="icon-arrow-up" style="color:#000"></i>
		</div>
    </div>
   
        
    <!-- END FOOTER -->
	<!-- END CONTAINER -->
	
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->


   <script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>

<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<!--
<script src="<?php echo $this->webroot; ?>theme_admin/assets/admin/pages/scripts/form-wizard.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
-->
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/select2/select2.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!--
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery-notific8/jquery.notific8.min.js"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/admin/pages/scripts/ui-notific8.js"></script>
-->
<!-- END PAGE LEVEL SCRIPTS -->
   <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
   	<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>

	<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
	<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->    

    
    <!-- product zoom -->
 <!--
    <script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/zoom/jquery.zoom.min.js" type="text/javascript"></script>
    <script src="<?php echo $this->webroot; ?>theme_admin/assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
-->

<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/admin/layout2/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/admin/pages/scripts/components-form-tools.js"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/scripts/datatable.js"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/admin/pages/scripts/ecommerce-products.js"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/admin/pages/scripts/ecommerce-products-edit.js"></script>


<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
	Metronic.init(); // init metronic core componets
	Layout.init(); // init layout
	Demo.init();  // init layout
	EcommerceProducts.init();
	EcommerceProductsEdit.init();
	Layout.initOWL();
	ComponentsFormTools.init();
});
</script>

<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
</html>


