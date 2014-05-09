<?php
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
        echo "yourname ".$this->config->item("yourname");
?>
<form method="post">
    <fieldset>
    	<legend><h2>Login Area</h2></legend>
    </fieldset>
    <div class="form-group">
    	<input type="text" class="form-control" placeholder="Email address" name="email" value="<?php echo $this->input->post('email'); ?>">
    </div>
    <div class="form-group">
    	<input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $this->input->post('password'); ?>">
    </div>
    <div class="form-group">
    	<button class="btn btn-large btn-primary pull-right" type="submit">Login</button>
	</div>
</form>

