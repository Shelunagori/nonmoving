<!DOCTYPE html>
<html lang="en">
<head>
<title>
Online Sell and Purchase Non Moving Inventory</title>
<!-- Include external files and scripts here (See HTML helper for more info.) -->
<?php
echo $this->fetch('meta');
 Configure::write('debug', 0); echo $this->fetch('meta'); 
 ?>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo $this->webroot; ?>theme_admin/assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo $this->webroot; ?>theme_admin/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo $this->webroot; ?>theme_admin/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
</head>
<body class="login" >
<!-- --------------------------------start  menu  header--------------------------------------------- -->
<?php    
?>
<!-- --------------------------------end  menu  header--------------------------------------------- -->
<!-- Here's where I want my views to be displayed-->
<?php echo $this->fetch('content'); ?>
 <!-- --------------------------------start  footer menu--------------------------------------------- -->
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo $this->webroot; ?>theme_admin/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo $this->webroot; ?>theme_admin/assets/admin/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Login.init();
Demo.init();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
</html>


