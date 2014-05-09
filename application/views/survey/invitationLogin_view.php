<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url(); ?>/assets/themes/bootswatch/flatly.bootstrap.min.css" rel="stylesheet">
        <style>
			body {
				padding-top:20px;	
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
        <div class="container">
            <?php
				if($error!='') {
					echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
				}
			?>
			<form method="post">
				<fieldset>
					<legend><h2>Invitation Information</h2></legend>
				</fieldset>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Email address" name="invitation_email" value="<?php echo $this->input->post('invitation_email'); ?>">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Invitation Code" name="invitation_code" value="<?php echo $this->input->post('invitation_email'); ?>">
				</div>
				<div class="form-group">
					<button class="btn btn-large btn-primary pull-right" type="submit">Login</button>
				</div>
			</form>
        </div>
        <div class="footer navbar-fixed-bottom">
            <div class="container">
                Powered by <a href="https://www.merahciptamedia.co.id/" target="_blank">© PT. Merah Cipta Media 2013</a>
            </div>
        </div>
  	</body>
</html>