<?php 
	if($error!='') {
		echo '<div class="alert alert-dismissable alert-danger">'.$error.'</div>';
	}
        
        if($this->session->flashdata("error")) {
		echo '<div class="alert alert-dismissable alert-danger">'.
                        $this->session->flashdata("error").'</div>';
	}
        	
?>
<div class="page-header"><h1>Survey </h1></div>
<?php echo anchor("survey/add","ADD",array("class"=>"btn btn-primary pull-right",
                  "style"=>"margin-bottom:10px;"));?>

<table class="table table-striped table-bordered datatable">
    <thead>
        <tr>
            <th>No.</th>            
            <th>Title</th>            
            <th>Creator</th>
            <th>Question</th>            
            <th>Is Publish?</th>
            <th>Manage</th>
        </tr>
    </thead>
    <tbody>
    	<?php
            $no = 1;
			foreach($data as $key => $value) {
		?>
        <tr>
        	<td><?php echo $no; ?></td>
            <!--<td><?php echo $value->survey_added; ?></td>-->
            <td><?php echo $value->survey_title; ?></td>
            <td><?php echo $value->admin_fullname; ?></td>
            <td align="center">
                <?php  echo anchor("question/survey/".$value->survey_id,$value->question);?>
            </td>
            <td align="center">
                <?php 
                  $status = $value->survey_status == "1"? "Yes": "No";
                  echo anchor("survey/setpublish/".$value->survey_id."/".
                              $value->survey_status,$status,
                              array("onClick"=>"return confirm('Are you sure?\\n\\All question will (un)publish');"));
                  ?>
            </td>
        	<td>
            	<?php echo anchor("survey/preview/".$value->survey_id,"Preview");?>
            	&nbsp;&nbsp;&nbsp;
                <?php echo anchor("survey/edit/".$value->survey_id,"Edit");?>
                &nbsp;&nbsp;&nbsp;
                <?php echo anchor("survey/remove/".$value->survey_id,"Remove",
                                       array("onClick"=>"return confirm('Are you sure?\\n\\All questions will be deleted.');"));?>
            	
            </td>
        </tr>
        <?php	
                $no++;
			}
		?>
    </tbody>
</table>