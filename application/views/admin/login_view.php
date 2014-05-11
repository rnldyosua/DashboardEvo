<?php
	//form validation
        if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}        
        
        if($this->session->flashdata("error")){
?>
<div class="alert alert-dismissable alert-danger"><?php echo $this->session->flashdata("error");?></div>
<?php } 
      if($this->session->flashdata("success")){  
?>
<div class="alert alert-dismissable alert-success"><?php echo $this->session->flashdata("success");?></div>
<?php }?>

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

