<?php
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
?>
<div class="page-header"><h1>Edit Question</h1></div>
<form method="post">
    <div class="form-group">
    	<label for="question_type">Type :</label>
        <select class="form-control" id="question_type" name="question_type">
            <option value="check" <?php if($data[0]->question_type=="check") {echo'selected';} ?>>Check</option>
            <option value="radio" <?php if($data[0]->question_type=="radio") {echo'selected';} ?>>Radio</option>
            <option value="textarea" <?php if($data[0]->question_type=="textarea") {echo'selected';} ?>>Textarea</option>
        </select>
    </div>
    <div class="form-group">
    	<label for="question_title">Title :</label>
        <input type="text" class="form-control" placeholder="Question Title" id="question_title" name="question_title" value="<?php echo $data[0]->question_title; ?>">
    </div>
    <div class="form-group">
    	<label for="question_option">Option :</label>
        <textarea type="text" class="form-control" rows="5" placeholder="Question Option" id="question_option" name="question_option"><?php echo $data[0]->question_option; ?></textarea>
    	<div class="pull-right"><small>Enter each choice on a separate line.</small></div>
    </div>
    <div class="form-group">
    	<label for="question_mandatory">Mandatory :</label>
        <select class="form-control" id="question_mandatory" name="question_mandatory">
            <option value="0" <?php if($data[0]->question_mandatory=="0") {echo'selected';} ?>>No</option>
            <option value="1" <?php if($data[0]->question_mandatory=="1") {echo'selected';} ?>>Yes</option>
        </select>
    </div>
    <div class="form-group">
    	<button class="btn btn-large btn-primary pull-right" type="submit">Edit</button>
	</div>
</form>

