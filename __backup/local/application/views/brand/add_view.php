<?php
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
	if(!isset($company[0]->company_id)) {
		$company[0] = new stdClass();
		$company[0]->company_id = '';	
	}
?>
<div class="page-header"><h1>ADD Brand <?php if($company[0]->company_id!='') { echo 'in Company "'.$company[0]->company_name.'"';} ?></h1></div>
<form method="post">
    <div class="form-group">
    	<label for="company_id">Company Name :</label>
        <select class="form-control" id="company_id" name="company_id">
            <?php
				foreach($company as $key => $value) {
			?>
            <option value="<?php echo $value->company_id ?>"><?php echo $value->company_name; ?></option>
            <?php
				}
			?>
        </select>
    </div>
    <div class="form-group">
    	<label for="company_name">Brand Name :</label>
        <input type="text" class="form-control" placeholder="Brand Name" id="brand_name" name="brand_name" value="<?php echo $this->input->post('brand_name'); ?>">
    </div>
    <div class="form-group">
    	<button class="btn btn-large btn-primary pull-right" type="submit">ADD</button>
	</div>
</form>

