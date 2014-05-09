<?php 
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
	if($success!='') {
		echo '<div class="alert alert-dismissable alert-success">'.$success.'</div>';
	}
	$session_admin = $this->session->userdata('session_admin');
	$ext = '';
	if(!isset($brand[0]->brand_id)) {
		$brand[0] = new stdClass();
		$brand[0]->brand_id = '';
	} else {
		$ext = '/'.$brand[0]->brand_id;
	}
	if(!isset($admin[0]->admin_id)) {
		$admin[0] = new stdClass();
		$admin[0]->admin_id = '';	
	} else {
		$ext = '/'.$admin[0]->admin_id;
	}
?>
<div class="page-header"><h1>Survey <?php if($brand[0]->brand_id!='') { echo 'in Brand "'.$brand[0]->brand_name.'"';} ?> <?php if($admin[0]->admin_id!='') { echo 'created By "'.$admin[0]->admin_fullname.'"';} ?></h1></div>
<a href="<?php echo site_url('survey/add/'.$brand[0]->brand_id); ?>" class="btn btn-primary pull-right" style="margin-bottom:10px;">ADD</a>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <!--<th>Date</th>-->
            <th>Title</th>
            <th>Company</th>
            <th>Brand</th>
            <th>Creator</th>
            <th>Question</th>
            <th>Invitation</th>
            <th>Manage</th>
        </tr>
    </thead>
    <tbody>
    	<?php
			foreach($data as $key => $value) {
		?>
        <tr>
        	<td><?php echo $offset+$key+1; ?></td>
            <!--<td><?php echo $value->survey_added; ?></td>-->
            <td><?php echo $value->survey_title; ?></td>
            <td><?php echo $value->company_name; ?> <a href="<?php echo site_url('brand/company/'.$value->company_id); ?>">[View]</a></td>
            <td><?php echo $value->brand_name; ?> <a href="<?php echo site_url('survey/brand/'.$value->brand_id); ?>">[View]</a></td>
            <td><?php echo $value->admin_fullname; ?> <a href="<?php echo site_url('survey/admin/'.$value->admin_id); ?>">[View]</a></td>
            <td><?php echo $value->question; ?> <a href="<?php echo site_url('question/survey/'.$value->survey_id); ?>">[View]</a></td>
            <td><?php echo $value->invitation; ?> <a href="<?php echo site_url('invitation/survey/'.$value->survey_id); ?>">[View]</a> <a href="<?php echo site_url('invitation/add/'.$value->survey_id); ?>">[Invite Here]</a></td>
        	<td>
            	<a href="<?php echo site_url('survey/preview/'.$value->survey_id); ?>">Preview</a>
				<?php 
					if($value->admin_id==$session_admin->id) {
						
				?>
            	&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('survey/edit/'.$value->survey_id.$ext); ?>">Edit</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('survey/delete/'.$value->survey_id.$ext); ?>">Delete</a>
            	<?php } ?>
            </td>
        </tr>
        <?php		
			}
		?>
    </tbody>
</table>