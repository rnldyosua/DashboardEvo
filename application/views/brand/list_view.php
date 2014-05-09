<?php
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
	if($success!='') {
		echo '<div class="alert alert-dismissable alert-success">'.$success.'</div>';
	}
	$session_admin = $this->session->userdata('session_admin');
	if(!isset($company[0]->company_id)) {
		$company[0] = new stdClass();
		$company[0]->company_id = '';	
	}
	if($session_admin->roles=='superadmin') {
?>
<div class="page-header"><h1>Brand <?php if($company[0]->company_id!='') { echo 'in Company "'.$company[0]->company_name.'"';} ?></h1></div>
<a href="<?php echo site_url('brand/add/'.$company[0]->company_id); ?>" class="btn btn-primary pull-right" style="margin-bottom:10px;">ADD</a>
<?php } ?>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
        	<th>No.</th>
            <th>Name</th>
            <th>Company</th>
            <th>Survey</th>
            <?php if($session_admin->roles=='superadmin') {?><th>Manage</th><?php } ?>
        </tr>
    </thead>
    <tbody>
    	<?php
			foreach($data as $key => $value) {
		?>
        <tr>
        	<td><?php echo $offset+$key+1; ?></td>
            <td><?php echo $value->brand_name; ?></td>
            <td><?php echo $value->company_name; ?></td>
            <td><?php echo $value->survey; ?> <a href="<?php echo site_url('survey/brand/'.$value->brand_id); ?>">[View]</a></td>
        	<?php if($session_admin->roles=='superadmin') {?>
            <td>
            	<a href="<?php echo site_url('brand/edit/'.$value->brand_id.'/'.$company[0]->company_id); ?>">Edit</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('brand/delete/'.$value->brand_id.'/'.$company[0]->company_id); ?>">Delete</a>
            </td>
            <?php } ?>
        </tr>
        <?php		
			}
		?>
    </tbody>
</table>
<?php echo $pagination; ?>