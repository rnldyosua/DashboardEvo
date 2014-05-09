<table width="100%" cellpadding="5" cellspacing="0" border="0">
	<tr>
    	<td>Hi,<br /></td>
    </tr>
    <tr>
    	<td>
        	Congratulations, you get an survey invitation from PT. Merah Cipta Media<br />
            This is the survey's information :<br><br>
            Email Address : <?php echo $invitation_email; ?><br />
            Invitation Code : <?php echo $invitation_code; ?><br />
            URL : <a href="<?php echo site_url('survey/invitation/'.$survey[0]->survey_code); ?>"><?php echo site_url('survey/invitation/'.$survey[0]->survey_code); ?></a>
        </td>
    </tr>
</table>