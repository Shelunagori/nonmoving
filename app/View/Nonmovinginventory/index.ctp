<?php
/*
if (session_status() == PHP_SESSION_ACTIVE) 
{
	session_destroy();
}*/
$submit_succ=1;
?>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>
 $(document).ready(function () {
	 
	$('.item').hover(function ( event ) {
			$(this).find('.valign-center-elem').addClass('kk');
        }, function () {
			  $(this).find('.valign-center-elem').removeClass('kk');
        });
		
    });
	</script>
<style>
.pp
{
	font-size:20px;
}
.kk
{
	position: absolute; top: 50%; margin-top: -40.5px; width: 100%; height: 81px; 
}
.portfolio-block .item > a:hover {
  text-decoration: none;
}
.bk:hover
{
	opacity: 0.7;
	filter: alpha(opacity=92);
}	
.col-md-2 {
		padding-right:0px !important;
		}

@media (max-width:1199px) {
    .col-md-2 {
		float:left;
        width:16.66666667%;
		}
    }
	@media (max-width:1150px) {
    .col-md-2 {
		float:left;
       width:18.66666667%;
	    margin-left:5%;;}
    }
	@media (max-width:1000px) {
    .col-md-2 {
		float:left;
       width:18.66666667%;  
	   margin-top:3%;
	   }
	@media (max-width:800px) {
    	.col-md-2 {
		float:left;
       width:25.66666667%;  
	   margin-top:3%;
	   }
	   @media (max-width:600px) {
    .col-md-2 {
		float:left;
       width:35.66666667%;
	    margin-top:0%;
	  
	   }
	@media (max-width:500px) {
    .col-md-2 {
		float:left;
       width:48.66666667%;
	   margin-left:0px;
	   }
	@media (max-width:320px) {
    .col-md-2 {
		float:left;
       width:60.66666667%;
	   }

    }
	</style>
				<!-- END PAGE HEADER-->
		<?php  if($submit_succ==2)
           { ?>
       <!--<div class="alert alert-danger alert-messages" alert-dismissable style="height:50px">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <?php echo $massage ; ?>   
        </div>-->
        <?php } ?>
         <div class="portfolio-block content-center">
            <div class="row">
           
              <?php
                $i=0;
                foreach ($categories_arr as $categories_ftc) 
                {
                    $i++;
                   
				 ?>
                      <div class="item col-md-2">
                        <img src="<?php echo $this->webroot; ?>images/icon_category/<?php echo $categories_ftc['Categorie']['icon']; ?>" alt="NAME" style="height:170px; width:100%;" class="img-responsive">
                        <a href="<?php echo $this->webroot; ?>Nonmovinginventory/categories_details?categories_id=<?php echo $categories_ftc['Categorie']['id']; ?>" class="zoom valign-center">
                          <div class="valign-center-elem" >
                            <strong style="font-size:14px"><?php echo $categories_ftc['Categorie']['categories']; ?></strong>
                            <em></em>
                            <b>Details</b>
                          </div>
                        </a>
                      </div>
                     
                  <?php
                  if($i==5)
                  {
                    $i=0;
                  }
                }
                ?>		
                
          </div>	
	</div>

 <script type="text/javascript" charset="utf-8">
    setTimeout(function(){
      $('.alert-messages').fadeTo(2000, 500).slideUp(1500, function(){
        $(this).alert('close');
      });
    }, 3000);
  </script>