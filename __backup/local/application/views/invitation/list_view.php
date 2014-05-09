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
<div class="page-header"><h1>Invitation from Survey "<?php echo $survey[0]->survey_title; ?>"</h1></div>
<div class="well well-sm">
    <div class="info">
    	<div class="info-left">Date</div>
        <div class="info-right">: <?php echo $survey[0]->survey_added; ?></div>
    </div>
    <div class="info">
    	<div class="info-left">Company</div>
        <div class="info-right">: <?php echo $survey[0]->company_name; ?> <a href="<?php echo site_url('brand/company/'.$survey[0]->company_id); ?>">[View]</a></div>
    </div>
    <div class="info">
    	<div class="info-left">Brand</div>
        <div class="info-right">: <?php echo $survey[0]->brand_name; ?> <a href="<?php echo site_url('survey/brand/'.$survey[0]->brand_id); ?>">[View]</a></div>
    </div>
    <div class="info">
    	<div class="info-left">Creator</div>
        <div class="info-right">: <?php echo $survey[0]->admin_fullname; ?> <a href="<?php echo site_url('survey/admin/'.$survey[0]->admin_id); ?>">[View]</a></div>
    </div>
</div>
<a href="<?php echo site_url('invitation/add/'.$survey[0]->survey_id); ?>" class="btn btn-primary pull-right" style="margin-bottom:10px;">ADD</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Date</th>
            <th>Sender</th>
            <th>Type</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    	<?php
			foreach($data as $key => $value) {
		?>
        <tr>
        	<td><?php echo $offset+$key+1; ?></td>
            <td><?php echo $value->invitation_added; ?></td>
            <td><?php echo $value->invitation_sender; ?></td>
            <td><?php echo $value->invitation_type; ?></td>
            <td><?php echo $value->invitation_email; ?></td>
            <td><?php if($value->invitation_status=='0'){echo 'Expired';} else {echo 'Active';} ?></td>
        </tr>
        <?php		
			}
		?>
    </tbody>
</table>