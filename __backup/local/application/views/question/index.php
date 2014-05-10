<?php 
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
	if($success!='') {
		echo '<div class="alert alert-dismissable alert-success">'.$success.'</div>';
	}
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
</div>
<a href="<?php echo site_url('question/add/'.$id); ?>" class="btn btn-primary pull-right" style="margin-bottom:10px;">ADD</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Type</th>
            <th>Title</th>
            <th>Option</th>
            <th>Mandatory</th>
            <th>Is Publish</th>
            <th>Manage</th>
        </tr>
    </thead>
    <tbody>
    	<?php
		$no = 1;	
                
                foreach($questions as $key => $value) {
		?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $value->question_type !=""? $value->question_type: "checkbox"; ?></td>
            <td><?php echo $value->question_title; ?></td>
            <td><?php echo nl2br($value->question_option); ?></td>
            <td><?php echo $value->question_mandatory=='1'? "Yes": "No"; ?></td>
            <td><?php echo $value->question_status=="1"? "Yes" : "No";?></td>
        	<td>
            	<?php 
					if($survey[0]->admin_id==$session_admin->id) {
				?>
            	<a href="<?php echo site_url('question/edit/'.$survey[0]->survey_id.'/'.$value->question_id); ?>">Edit</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('question/delete/'.$survey[0]->survey_id.'/'.$value->question_id); ?>">Delete</a>
            	<?php } ?>
            </td>
        </tr>
        <?php		
			}
		?>
    </tbody>
</table>