<?php
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
?>
<div class="page-header"><h1>ADD Survey</h1></div>
<form method="post">    
    <div class="form-group">
    	<label for="survey_title">Survey Title :</label>
        <?php form_input(array("class"=>"form-control","placeholder"=>"Survey Title",
                               "id"=>"survey_title","name"=>"survey_title"));?>                
    </div>
    <div class="form-group">    	
        <?php echo form_submit(array("class"=>"btn btn-large btn-primary pull-right",
                                     "name"=>"save","value"=>"ADD"));?>
	</div>
</form>

