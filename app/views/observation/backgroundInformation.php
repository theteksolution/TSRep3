<!-- 
backgroungInformation.php

This is the backgroundInformation view for the Observations controller

-->
<link href="<?php echo \helpers\url::get_template_path();?>css/default.css" rel="stylesheet"> 
<link href="<?php echo \helpers\url::get_template_path();?>css/default.date.css" rel="stylesheet"> 
<link href="<?php echo \helpers\url::get_template_path();?>css/default.time.css" rel="stylesheet"> 
<script src="<?php echo \helpers\url::get_template_path();?>js/picker.js"></script>
<script src="<?php echo \helpers\url::get_template_path();?>js/picker.date.js"></script>
<script src="<?php echo \helpers\url::get_template_path();?>js/picker.time.js"></script> 
<!-- <style>
 .form-control {
  min-width:auto;
  width:50%;
}

     .table
    {
        width:50%;
    }
   
</style> -->
 <script>
$(function() {
    $("#ObservationDate").pickadate({ format: 'mm-dd-yyyy', formatSubmit: 'mm-dd-yyyy'});

    $("#ClassStartTime").pickatime();

    $("#ClassEndTime").pickatime();
	
	$("#Submit1").click(function() {
		var isValid = true;
		
		if (!$("#ClassName").val())
		{
			isValid = false;
		}
		if (!$("#ObservationDate").val())
		{
			isValid = false;
		}
		if (!$("#ClassStartTime").val())
		{
			isValid = false;
		}
		if (!$("#ClassEndTime").val())
		{
			isValid = false;
		}
		if (!$("#StartingNumberOfMales").val())
		{
			isValid = false;
		}
		if (!$("#StartingNumberOfFemales").val())
		{
			isValid = false;
		}
		if (!$("#EndingNumberOfFemales").val())
		{
			isValid = false;
		}
		if (!$("#EndingNumberOfMales").val())
		{
			isValid = false;
		}
		
		if(isValid)
		{
			$("#form1").submit();
		}
		else
		{
			alert("Please Fill Required Fields");
		}
	});
	
});

function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>

<?php include 'app/templates/default/menu.php';?>
<div class="container-fluid">
<h2>Background Information</h2>
	
<br /><br />
<form id="form1" action="<?php echo DIR ?>observation/backgroundInformation" method="post" >
	
    <input type="hidden" id="ObservationID" name="ObservationID" value="<?php echo $data['ObservationID']; ?>"/> 
	 <div class="form-group">
        <label for="ClassName">Class Name</label>
        <input type="text" name="ClassName" id="ClassName" class = "form-control" value="<?php echo  $data['BackgroundInfo']->ClassName; ?>" /> 
    </div>
     <div class="form-group">
        <label for="ObservationDate">Observation Date</label>
        <input type="text" name="ObservationDate" id="ObservationDate" class = "form-control" value="<?php echo  $data['BackgroundInfo'] ? date_format(date_create($data['BackgroundInfo']->ObservationDate),"m-d-Y") : "" ; ?>" /> 
    </div>
    <div class="form-group">
        <label for="ClassStartTime">Class Start Time</label>
		<input type="text" name="ClassStartTime" id="ClassStartTime" class = "form-control" value="<?php echo  $data['BackgroundInfo']->ClassStartTime; ?>"/> 
    </div>
    <div class="form-group">
        <label for="ClassEndTime">Class End Time</label>
       <input type="text" name="ClassEndTime" id="ClassEndTime" class = "form-control" value="<?php echo  $data['BackgroundInfo']->ClassEndTime; ?>"/> 
    </div>
    <div class="form-group">
        <label for="StartingNumberOfMales">Starting Number of Males</label>
		<input type="text" name="StartingNumberOfMales" id="StartingNumberOfMales" class = "form-control" onkeypress = "return isNumber(event)" value="<?php echo  $data['BackgroundInfo']->StartingNumberOfMales; ?>"/> 
    </div>
    <div class="form-group">
        <label for="StartingNumberOfFemales">Starting Number of Females</label>
        <input type="text" name="StartingNumberOfFemales" id="StartingNumberOfFemales" class = "form-control" onkeypress = "return isNumber(event)" value="<?php echo  $data['BackgroundInfo']->StartingNumberOfFemales; ?>"/> 
    </div>
    <div class="form-group">
        <label for="EndingNumberOfMales">Ending Number of Males</label>
		<input type="text" name="EndingNumberOfMales"  id="EndingNumberOfMales" class = "form-control" onkeypress = "return isNumber(event)" value="<?php echo  $data['BackgroundInfo']->EndingNumberOfMales; ?>"/> 
    </div>
    <div class="form-group">
        <label for="EndingNumberOfFemales">Ending Number of Females</label>
		<input type="text" name="EndingNumberOfFemales"  id="EndingNumberOfFemales" class = "form-control" onkeypress = "return isNumber(event)" value="<?php echo  $data['BackgroundInfo']->EndingNumberOfFemales; ?>"/> 
    </div>
    <div >
        <label><input type="checkbox" name="UseInstructionalArtifacts" <?php echo ( $data['BackgroundInfo']->UseInstructionalArtifacts == 'true') ? 'checked="checked"' : ''; ?>/> Did the students use instructional artifacts (e.g., handouts, worksheets, readings, etc.) in this lesson?</label>
    </div>
     <div >
        <label><input type="checkbox" name="ObtainedArtifactsCopy" <?php echo ( $data['BackgroundInfo']->ObtainedArtifactsCopy == 'true') ? 'checked="checked"' : ''; ?>/> Was the observer able to obtain a copy of these artifacts to use in the coding process?</label>
    </div>
	<br />
     <div class="form-group">
        <label for="Notes">Additional Notes</label>
		<textarea name="Notes" class = "form-control"><?php echo  $data['BackgroundInfo']->Notes; ?></textarea>
    </div>
    
    <input id="Submit1" class="btn btn-primary" type="button" value="Save" />
    
       <br /><br />
</form>
</div>