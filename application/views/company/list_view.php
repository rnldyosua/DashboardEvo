<?php
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
	if($success!='') {
		echo '<div class="alert alert-dismissable alert-success">'.$success.'</div>';
	}
	$session_admin = $this->session->userdata('session_admin');
	if($session_admin->roles=='superadmin') {
?>
<div class="page-header"><h1>Company</h1></div>
<a href="<?php echo site_url('company/add'); ?>" class="btn btn-primary pull-right" style="margin-bottom:10px;">ADD</a>
<?php } ?>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
        	<th>No.</th>
            <th>Name</th>
            <th>Brand</th>
            <?php if($session_admin->roles=='superadmin') {?><th>Manage</th><?php } ?>
        </tr>
    </thead>
    <tbody>
    	<?php
			foreach($data as $key => $value) {
		?>
        <tr>
        	<td><?php echo $offset+$key+1; ?></td>
            <td><?php echo $value->company_name; ?></td>
            <td><?php echo $value->brand; ?> <a href="<?php echo site_url('brand/company/'.$value->company_id); ?>">[View]</a></td>
        	<?php if($session_admin->roles=='superadmin') {?>
            <td>
            	<a href="<?php echo site_url('company/edit/'.$value->company_id); ?>">Edit</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('company/delete/'.$value->company_id); ?>">Delete</a>
            </td>
            <?php } ?>
        </tr>
        <?php		
			}
		?>
    </tbody>
</table>
<?php echo $pagination; ?>