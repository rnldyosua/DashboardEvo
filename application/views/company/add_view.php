<?php
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
?>
<div class="page-header"><h1>ADD Company</h1></div>
<form method="post">
    <div class="form-group">
    	<label for="company_name">Company Name :</label>
        <input type="text" class="form-control" placeholder="Company Name" id="company_name" name="company_name" value="<?php echo $this->input->post('company_name'); ?>">
    </div>
    <div class="form-group">
    	<button class="btn btn-large btn-primary pull-right" type="submit">ADD</button>
	</div>
</form>

