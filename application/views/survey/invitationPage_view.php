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
				padding-bottom:50px;	
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
					<legend><h2><?php echo $survey[0]->survey_title; ?></h2></legend>
				</fieldset>
				<?php
					foreach($question as $key => $value) {
				?>
                <div class="form-group">
                    <label for="<?php echo $value->question_id; ?>"><?php echo ($key+1).'.<span style="width:10px; display:inline-block;"></span>'.$value->question_title; ?></label>
                    <?php
						if($value->question_type=='check') {
							$option = explode('<br />',nl2br($value->question_option));
							foreach($option as $key2 => $value2) {
								echo'<label style="padding-left:40px;cursor:pointer;" class="checkbox"><input type="checkbox" name="'.$value->question_id.'" value="'.$value2.'">'.$value2.'</label>';
							}
						}
						if($value->question_type=='radio') {
							$option = explode('<br />',nl2br($value->question_option));
							foreach($option as $key2 => $value2) {
								echo'<label style="padding-left:40px;cursor:pointer;" class="radio"><input type="radio" name="'.$value->question_id.'" value="'.$value2.'">'.$value2.'</label>';
							}
						}
						if($value->question_type=='textarea') {
							echo'<div class="form-group">';
							echo'<label for="'.$value->question_id.'"></label>';
							echo'<textarea style="margin-left:25px; margin-bottom:30px;" name="'.$value->question_id.'" class="form-control" rows="5"></textarea>';
							echo'</div>';
						}
					?>
                </div>
                <?php
					}
				?>
				<div class="form-group">
					<button class="btn btn-large btn-primary" type="submit" style="margin-left:25px;">SEND</button>
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