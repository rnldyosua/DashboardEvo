<?php
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
?>
<div class="page-header"><h1>ADD Invitation</h1></div>
<form method="post">
    <div class="form-group">
    	<label for="invitation_email">Invitation Email :</label>
        <input type="text" class="form-control" placeholder="Invitation Email" id="invitation_email" name="invitation_email" value="<?php echo $this->input->post('invitation_email'); ?>">
    </div>
    <div class="form-group">
    	<button class="btn btn-large btn-primary pull-right" type="submit">ADD</button>
	</div>
</form>

