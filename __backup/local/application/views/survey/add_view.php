<?php
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
?>
<div class="page-header"><h1>ADD Survey</h1></div>
<form method="post">
    <div class="form-group">
    	<label for="company_id">Brand Name :</label>
        <select class="form-control" id="brand_id" name="brand_id">
            <?php
				foreach($brand as $key => $value) {
			?>
            <option value="<?php echo $value->brand_id ?>"><?php echo $value->brand_name; ?></option>
            <?php
				}
			?>
        </select>
    </div>
    <div class="form-group">
    	<label for="survey_title">Survey Title :</label>
        <input type="text" class="form-control" placeholder="Survey Title" id="survey_title" name="survey_title" value="<?php echo $this->input->post('survey_title'); ?>">
    </div>
    <div class="form-group">
    	<button class="btn btn-large btn-primary pull-right" type="submit">ADD</button>
	</div>
</form>

