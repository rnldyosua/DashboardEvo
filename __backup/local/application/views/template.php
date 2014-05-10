<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->config->item("titlepage"); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url(); ?>assets/themes/bootswatch/flatly.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/datatables/DT_bootstrap.css" rel="stylesheet">
        <style>
			body {
				padding-top:71px;
				padding-bottom:51px;	
			}
			.footer .container {
				border-top:solid 1px #ecf0f1;
				padding-top:10px;
				background:#2c3e50;
				color:#FFF;
				padding:10px 20px;
			}
		</style>
          
	</head>
	<body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                </div>
                
                <div class="navbar-collapse collapse" id="navbar-main">
                    <?php if($this->session->userdata('session_admin')) { $session_admin = $this->session->userdata('session_admin'); ?>
                    <ul class="nav navbar-nav ">
                        <li <?php echo $this->router->class=="dashboard"? "class=\"active\"":"";?>><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
                        <li <?php 
                                 echo in_array($this->router->class, array("survey","question"))? "class=\"active\"":"";?>><a href="<?php echo site_url('survey'); ?>">Survey</a></li>                        
                    </ul>
                    
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $session_admin->fullname; ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('admin/profile'); ?>">Profile</a></li>
                                <!--li><a href="<?php //echo site_url('survey/admin/'.$session_admin->id); ?>">My Survey</a></li -->
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('home/logout'); ?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="container">
            <?php echo $content; ?>
        </div>
        <div class="footer navbar-fixed-bottom">
            <div class="container">
                Hap Cipta &copy;&nbsp;<?php echo date("Y");?>&nbsp;&nbsp;<a href="https://www.merahciptamedia.co.id/" target="_blank"><?php echo $this->config->item("myname");?></a>
            </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/themes/jquery/jquery-2.0.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/themes/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>assets/datatables/DT_bootstrap.js"></script>
        <script>
            $(function(){
               //paging
               $('.datatable').dataTable({
                "sDom": "<'pull-right'l>t<'row'<'col-lg-6'f><'col-lg-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "Show _MENU_ entries"
                }
                }); 
                
                //form question
                $("#question_type").change(function(){
                    
                   if($(this).val()=="textarea"){
                       $("#question_option").attr("disabled","disabled");
                   }else{
                       $("#question_option").prop("disabled",false);
                   }
                });
            });
            
        </script>
  	</body>
</html>