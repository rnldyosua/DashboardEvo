<?php
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
?>
<div class="page-header"><h1>Edit Survey</h1></div>
<form method="post">
    <div class="form-group">
    	<label for="brand_id">Brand Name :</label>
        <select class="form-control" id="brand_id" name="brand_id">
            <?php
				foreach($brand as $key => $value) {
			?>
            <option value="<?php echo $value->brand_id ?>" <?php if($value->brand_id==$data[0]->survey_brandid) {echo'selected';} ?>><?php echo $value->brand_name; ?></option>
            <?php
				}
			?>
        </select>
    </div>
    <div class="form-group">
    	<label for="survey_title">Survey Title :</label>
        <input type="text" class="form-control" placeholder="Survey Title" id="survey_title" name="survey_title" value="<?php echo $data[0]->survey_title; ?>">
    </div>
    <div class="form-group">
    	<button class="btn btn-large btn-primary pull-right" type="submit">Edit</button>
	</div>
</form>

