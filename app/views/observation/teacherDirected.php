<style>
    .panel
    {
         min-width:auto;
         width:60%;
    }
</style>
<?php include 'app/templates/default/menu.php';?>
<div class="container-fluid">
<h2>Teacher Directed</h2>

<form>
<input type="hidden" name="POQType" />
<div class="panel">
     <br />
   
	  QUESTIONING / EXPLORATION
     
	 <?php if($data['TeacherInfo']){ 
				foreach($data['TeacherInfo'] as $row){
					if ($row->SubSection == "1") {?>
					
			<div class="checkbox">
                <label><input type="checkbox" name="a<?php echo $row->POQID; ?>" <?php echo ( $row->Answer == 'true') ? 'checked="checked"' : ''; ?> /><?php echo $row->QuestionText; ?> </label>
             </div>
         
      <?php 		} 
				}
			}  ?>
   DESIGN
    <?php if($data['TeacherInfo']){ 
				foreach($data['TeacherInfo'] as $row){
					if ($row->SubSection == "2") {?>
					
			<div class="checkbox">
                <label><input type="checkbox" name="a<?php echo $row->POQID; ?>"<?php echo ( $row->Answer == 'true') ? 'checked="checked"' : ''; ?>/><?php echo $row->QuestionText; ?> </label>
             </div>
         
      <?php 		} 
				}
			}  ?>
    
	
	
	<?php if($data['TeacherInfo']){ 
				foreach($data['TeacherInfo'] as $row){
					if ($row->QuestionType == "text") {?>
			 <div class="form-group">
                <label for="Notes">Additional Notes</label>
                    <textarea class = "form-control"> <?php echo $row->Answer; ?></textarea >
            </div>
         
      <?php 		} 
				}
			}  ?>
	
	
            
        
</div>

  <input id="Submit1" class="btn btn-primary" type="submit" value="Save" />
     <br /><br />
</form>
</div>