<?php
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
	if(!isset($company[0]->company_id)) {
		$company[0] = new stdClass();
		$company[0]->company_id = '';	
	}
?>
<div class="page-header"><h1>Edit Brand <?php if($company[0]->company_id!='') { echo 'in Company "'.$company[0]->company_name.'"';} ?></h1></div>
<form method="post">
    <div class="form-group">
    	<label for="company_id">Company Name :</label>
        <select class="form-control" id="company_id" name="company_id">
            <?php
				foreach($company as $key => $value) {
			?>
            <option value="<?php echo $value->company_id ?>" <?php if($value->company_id==$data[0]->brand_companyid) {echo'selected';} ?>><?php echo $value->company_name; ?></option>
            <?php
				}
			?>
        </select>
    </div>
    <div class="form-group">
    	<label for="brand_name">Brand Name :</label>
        <input type="text" class="form-control" placeholder="Brand Name" id="brand_name" name="brand_name" value="<?php echo $data[0]->brand_name; ?>">
    </div>
    <div class="form-group">
    	<button class="btn btn-large btn-primary pull-right" type="submit">Edit</button>
	</div>
</form>

