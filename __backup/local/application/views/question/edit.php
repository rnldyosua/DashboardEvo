<?php
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
?>
<div class="page-header"><h1>ADD Question</h1></div>
<form method="post">
    <div class="form-group">
    	<label for="question_type">Type :</label>
        <select class="form-control" id="question_type" name="question_type">
            <option value="checkbox" <?php if($data[0]->question_type=="checkbox") {echo'selected';} ?>>Checkbox</option>
            <option value="radio" <?php if($data[0]->question_type=="radio") {echo'selected';} ?>>Radio</option>
            <option value="textarea" <?php if($data[0]->question_type=="textarea") {echo'selected';} ?>>Textarea</option>
        </select>
    </div>
    <div class="form-group">
    	<label for="question_title">Question :</label>        
        <?php echo form_input(array("class"=>"form-control","placeholder"=>"Question",
                                    "id"=>"question_title","name"=>"question_title",
                                    "value"=>$data[0]->question_title));?>
    </div>
    <div class="form-group">
    	<label for="question_option">Option :</label>
        <textarea type="text" class="form-control" rows="5" placeholder="Question Option" id="question_option" name="question_option"><?php echo $data[0]->question_option; ?></textarea>
    	<div class="pull-right"><small>Enter each choice on a separate line.	</small></div>
    </div>
    <div class="form-group">
    	<label for="question_mandatory">Mandatory :</label>
        <select class="form-control" id="question_mandatory" name="question_mandatory">
            <option value="0" <?php if($data[0]->question_mandatory=="0") {echo'selected';} ?>>No</option>
            <option value="1" <?php if($data[0]->question_mandatory=="1") {echo'selected';} ?>>Yes</option>
        </select>
    </div>
    <div class="form-group">
    	<label for="with_notes">Include Notes? :</label>
        <select class="form-control" id="with_notes" name="with_notes">
            <option value="0" <?php if($data[0]->with_notes=="0") {echo'selected';} ?>>No</option>
            <option value="1" <?php if($data[0]->with_notes=="1") {echo'selected';} ?>>Yes</option>
        </select>
    </div>
    
    <div class="form-group">
    	<label for="is_publish">Is Publish? :</label>
        <select class="form-control" id="is_publish" name="is_publish">
            <option value="1" <?php if($data[0]->question_status=="1") {echo'selected';} ?>>Yes</option>
            <option value="0" <?php if($data[0]->question_status=="0") {echo'selected';} ?>>No</option>            
        </select>
    </div>
    <?php echo form_hidden("idq",$idq);?>
    
    <div class="form-group">    	
        <?php 
             echo anchor("question/survey/".$ids,"Cancel",array("class"=>"btn btn-large btn-success pull-right",
                                                 "style"=>"margin-left:10px;"));
             echo form_submit(array("class"=>"btn btn-large btn-primary pull-right",
                                    "value"=>"EDIT"));
         ?>
	</div>
</form>

