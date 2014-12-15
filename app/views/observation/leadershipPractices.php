<!--

leadershipPractices.php

This is the leadershipPractices view from the Observations controller


-->

<!-- <style>
    .panel
    {
         min-width:auto;
         width:60%;
    }
</style> -->
<?php include 'app/templates/default/menu.php';?>
<div class="container-fluid">
<h2>LeadershipPractices</h2>

<form action="<?php echo DIR ?>observation/leadershipPractices" method="post">
<input type="hidden" name="POQType" />
<div class="panel">
     <br />
    <b>LEADERSHIP PRACTICES</b>
     
     
            <?php if($data['LeadershipInfo']){ 
				foreach($data['LeadershipInfo'] as $row){
					if ($row->SubSection == "1") {?>
					
			<div class="checkbox">
                <label><input type="checkbox" name="a<?php echo $row->POQID; ?>" <?php echo ( $row->Answer == 'true') ? 'checked="checked"' : ''; ?> /><?php echo $row->QuestionText; ?> </label>
             </div>
         
      <?php 		} 
				}
			}  ?>
    
	
	<br />
	<?php if($data['LeadershipInfo']){ 
				foreach($data['LeadershipInfo'] as $row){
					if ($row->QuestionType == "text") {?>
			 <div class="form-group">
                <label for="Notes">Additional Notes</label>
                    <textarea class = "form-control" name="a<?php echo $row->POQID; ?>"> <?php echo $row->Answer; ?></textarea >
            </div>
         
      <?php 		} 
				}
			}  ?>
</div>

  <input id="Submit1" class="btn btn-primary" type="submit" value="Save" />
     <br /><br />
</form>
</div>