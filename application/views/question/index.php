<?php 
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
        if($this->session->flashdata("error")) {
		echo "<div class=\"alert alert-dismissable alert-danger\">".
                     $this->session->flashdata("error")."</div>";
	}

        
	if($success!='') {
		echo '<div class="alert alert-dismissable alert-success">'.$success.'</div>';
	}
        
        if($this->session->flashdata("success")) {
		echo "<div class=\"alert alert-dismissable alert-success\">".
                     $this->session->flashdata("success")."</div>";
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

<?php echo anchor("survey","Back",array("class"=>"btn btn-primary btn-success pull-right","style"=>"margin-left:10px;"));?>
<a href="<?php echo site_url('question/add/'.$id); ?>" class="btn btn-primary pull-right" style="margin-bottom:10px;">ADD</a>
<table class="table table-striped table-bordered datatable">
    <thead>
        <tr>
            <th>No.</th>
            <th>Order</th>
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
                    //echo $value->show_to_web;
		?>
        <tr <?php echo $value->show_to_web== "1"? "class=\"danger\"":"";?>>
            <td><?php echo $no; ?></td>
            <td><?php echo $value->order_number;?></td>
            <td ><?php echo $value->question_type !=""? $value->question_type: "checkbox";?></td>
            <td><?php echo $value->question_title;?></td>                 
            <td><?php echo nl2br($value->question_option); ?></td>
            <td>
                <?php 
                  $status = $value->question_mandatory == "1"? "Yes": "No";
                  echo anchor("question/setmandatory/".$id."/".$value->question_id."/".
                              $value->question_mandatory,$status,
                              array("onClick"=>"return confirm('Are you sure?');"));
                  ?>
            </td>
            <td align="center">
                <?php 
                  $status = $value->question_status == "1"? "Yes": "No";
                  echo anchor("question/setpublish/".$id."/".$value->question_id."/".
                              $value->question_status,$status,
                              array("onClick"=>"return confirm('Are you sure?');"));
                  ?>
            </td>
        	<td>
            	<?php 
					if($survey[0]->admin_id==$session_admin->id) {
				?>
            	<a href="<?php echo site_url('question/edit/'.$id.'/'.$value->question_id); ?>">Edit</a>&nbsp;&nbsp;&nbsp;
                <?php 
                      echo anchor("question/remove/".$id."/".$value->question_id,"Delete",
                                  array("onClick"=>"return confirm('Are you sure?');"));
                ?>&nbsp;&nbsp;&nbsp;
                <?php
                     if($value->show_to_web == "0"){
                         echo anchor("question/showtoweb/".$id."/".$value->question_id."/".
                              $value->show_to_web,"Show to Web",
                              array("onClick"=>"return confirm('Are you sure?');"));
                     }else{
                         echo "";
                     }
                ?>
                
            	<?php } ?>
            </td>
        </tr>
        <?php		
                 $no++;
			}
		?>
    </tbody>
</table>