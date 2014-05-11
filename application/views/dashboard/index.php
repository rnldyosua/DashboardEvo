<?php         
	$session_admin = $this->session->userdata('session_admin');         
?>
<style>
.info {
	display:inline-block;
	width:100%;	
}
.info-left {
	float:left;
	width:15%;
	font-weight:bold;
}
.info-right {
	float:left;
	width:85%;
}
</style>
<div class="page-header"><h1>Question from Survey "<?php echo $survey[0]->survey_title; ?>"</h1></div>
<div class="well well-sm">
    <div class="info">
    	<div class="info-left">Date</div>
        <div class="info-right">: <?php echo date("d M Y H:i:s",strtotime($survey[0]->survey_added)); ?></div>
    </div>    
    <div class="info">
    	<div class="info-left">Creator</div>
        <div class="info-right">: <?php echo $survey[0]->admin_fullname; ?> </div>
    </div>
    
    <div class="info">
    	<div class="info-left">Total Responder</div>
        <div class="info-right">: <?php echo count($participants) ?> </div>
    </div>
    
</div>

<?php
  echo "<pre>";
  print_r($questions);
  echo "</pre>";
  foreach($questions as $key => $value){
?>
<div class="form-group">
                    <label for="<?php echo $value->question_id; ?>"><?php echo ($key+1).'.<span style="width:10px; display:inline-block;"></span>'.$value->question_title; ?></label>
                    <?php
						if($value->question_type=='checkbox' || $value->question_type=='radio') {
							$option = explode('<br />',nl2br($value->question_option));
							foreach($option as $key2 => $value2) {
								echo'<label style="padding-left:40px;cursor:pointer;" class="checkbox">'.$value2.'</label>';
							}
						}
						
						if($value->question_type=='textarea') {
							echo'<div class="form-group">';
							echo "ini menampilkan jumlah comment";
							echo'</div>';
						}
					?>
                </div>
             <?php } ?>