<script src="<?php echo \helpers\url::get_template_path();?>js/jquery.js"></script>
<script>
    $(document).ready(function () {
        $("span[id^='p']").click(function () {
            var resultTextID = "#" + this.id.toString().replace("p", "");
			
            var resultTextValue = parseInt($(resultTextID).val()) + 1;
			
           
            $(resultTextID).val(resultTextValue.toString());
        });

       

        $("span[id^='m']").click(function () {
            var resultTextID = "#" + this.id.toString().replace("m", "");
			
			if (parseInt($(resultTextID).val()) != 0)
			{
				var resultTextValue = parseInt($(resultTextID).val()) - 1;
				$(resultTextID).val(resultTextValue.toString());
			}
			
           
        });
    });
   
</script>
<style>
    .form-control
    {
        min-width:auto;
        width:20%;
    }
    input[type="text"] 
    {
        width: 30px;
    }
</style>
<?php include 'app/templates/default/menu.php';?>
<div class="container-fluid">
<h2>Observation Detail</h2>

<form>
<input type="hidden" name="ObservationInformationID" />


<div class="dropdown">
Class Activity Code
<br />
<select name="ClassActivityCode">
<?php
	foreach($data['ClassActivityCodes'] as $row) {
		echo '<option>'.$row.'</option>';
	}
?>
</select>	

<br />
<br />
Class Organization Code
<br />
<select name="ClassOrganizationCode">
<?php
	foreach($data['ClassOrganizationCodes'] as $row) {
		echo '<option>'.$row.'</option>';
	}
?>
</select>	
<br />
<br />
Student Disengagement Code
<br />

<select name="StudentDisengagementCode">
	<?php
	foreach($data['StudentDisengagementCodes'] as $row) {
		echo '<option>'.$row.'</option>';
	}
?>
</select>
<br />
<br />
</div>
   

<div>
  GAUGE OR EXPAND
  <div class="container-fluid">
    <div class="row">
        <div class="col-xs-4">solict</div>
        <div class="col-xs-3"><span id="pSolicitCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mSolicitCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="SolicitCount" id="SolicitCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->SolicitCount) ? $data['ObservationDetail']->SolicitCount : 0 ; ?>"/></div>
    </div>
    <div class="row">
        <div class="col-xs-4">facts</div> 
        <div class="col-xs-3"><span id="pFactsCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mFactsCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="FactsCount" id="FactsCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->FactsCount) ? $data['ObservationDetail']->FactsCount : 0 ; ?>"/></div>
    </div>
    <div class="row">
        <div class="col-xs-4">procedural</div>
        <div class="col-xs-3"><span id="pProceduralCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mProceduralCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="ProceduralCount" id="ProceduralCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->ProceduralCount) ? $data['ObservationDetail']->ProceduralCount : 0 ; ?>"/></div>
    </div>
    <div class="row">
        <div class="col-xs-4">explain</div>
        <div class="col-xs-3"><span id="pExplainCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mExplainCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="ExplainCount" id="ExplainCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->ExplainCount) ? $data['ObservationDetail']->ExplainCount : 0 ; ?>"/></div>
    </div>
    <div class="row">
        <div class="col-xs-4">apply</div>
        <div class="col-xs-3"><span id="pApplyCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mApplyCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="ApplyCount" id="ApplyCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->ApplyCount) ? $data['ObservationDetail']->ApplyCount : 0 ; ?>"/></div>
    </div>
     <div class="row">
        <div class="col-xs-4">meta</div>
        <div class="col-xs-3"><span id="pMetaCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mMetaCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="MetaCount" id="MetaCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->MetaCount) ? $data['ObservationDetail']->MetaCount : 0 ; ?>"/></div>
    </div>

</div>
  
  FEEDBACK 
<div class="container-fluid">
     <div class="row">
        <div class="col-xs-4">acknowledge</div>
        <div class="col-xs-3"><span id="pAcknowledgeCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mAcknowledgeCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="AcknowledgeCount" id="AcknowledgeCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->AcknowledgeCount) ? $data['ObservationDetail']->AcknowledgeCount : 0 ; ?>"/></div>
    </div>
     <div class="row">
        <div class="col-xs-4">rephrase</div>
        <div class="col-xs-3"><span id="pRephraseCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mRephraseCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="RephraseCount" id="RephraseCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->RephraseCount) ? $data['ObservationDetail']->RephraseCount : 0 ; ?>"/></div>
    </div>
     <div class="row">
        <div class="col-xs-4">correct</div>
        <div class="col-xs-3"><span id="pCorrectCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mCorrectCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="CorrectCount" id="CorrectCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->CorrectCount) ? $data['ObservationDetail']->CorrectCount : 0 ; ?>"/></div>
    </div>
     <div class="row">
        <div class="col-xs-4">praise</div>
        <div class="col-xs-3"><span id="pPraiseCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mPraiseCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="PraiseCount" id="PraiseCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->PraiseCount) ? $data['ObservationDetail']->PraiseCount : 0 ; ?>"/></div>
    </div>

</div>
    
 SIGNPOSTS 
    <div class="container-fluid">
     <div class="row">
        <div class="col-xs-4">new and old</div>
        <div class="col-xs-3"><span id="pNewAndOldCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mNewAndOldCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="NewAndOldCount" id="NewAndOldCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->NewAndOldCount) ? $data['ObservationDetail']->NewAndOldCount : 0 ; ?>"/></div>
    </div>
     <div class="row">
        <div class="col-xs-4">itinerary</div>
        <div class="col-xs-3"><span id="pItineraryCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mItineraryCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="ItineraryCount" id="ItineraryCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->ItineraryCount) ? $data['ObservationDetail']->ItineraryCount : 0 ; ?>"/></div>
    </div>
     <div class="row">
        <div class="col-xs-4">directions</div>
        <div class="col-xs-3"><span id="pDirectionsCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mDirectionsCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="DirectionsCount" id="DirectionsCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->DirectionsCount) ? $data['ObservationDetail']->DirectionsCount : 0 ; ?>"/></div>
    </div>
     <div class="row">
        <div class="col-xs-4">foreshadow</div>
        <div class="col-xs-3"><span id="pForeshadowCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mForeshadowCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="ForeshadowCount" id="ForeshadowCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->ForeshadowCount) ? $data['ObservationDetail']->ForeshadowCount : 0 ; ?>"/></div>
    </div>
     <div class="row">
        <div class="col-xs-4">situate</div>
        <div class="col-xs-3"><span id="pSituateCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mSituateCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="SituateCount" id="SituateCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->SituateCount) ? $data['ObservationDetail']->SituateCount : 0 ; ?>"/></div>
    </div>

</div>    
 
 PROMPT THINKING AND REDUCE COMPLEXITY
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-4">give info</div>
        <div class="col-xs-3"><span id="pGiveInfoCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mGiveInfoCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="GiveInfoCount" id="GiveInfoCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->GiveInfoCount) ? $data['ObservationDetail']->GiveInfoCount : 0 ; ?>"/></div>
    </div>
     <div class="row">
        <div class="col-xs-4">suggest</div>
        <div class="col-xs-3"><span id="pSuggestCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mSuggestCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="SuggestCount" id="SuggestCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->SuggestCount) ? $data['ObservationDetail']->SuggestCount : 0 ; ?>"/></div>
    </div>
     <div class="row">
        <div class="col-xs-4">think aloud</div>
        <div class="col-xs-3"><span id="pThinkAloudCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mThinkAloudCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="ThinkAloudCount" id="ThinkAloudCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->ThinkAloudCount) ? $data['ObservationDetail']->ThinkAloudCount : 0 ; ?>"/></div>
    </div>
     
     <div class="row">
        <div class="col-xs-4">summarize</div>
        <div class="col-xs-3"><span id="pSummarizeCount" class="glyphicon glyphicon-plus"></span></div>
        <div class="col-xs-3"><span id="mSummarizeCount" class="glyphicon glyphicon-minus"></span></div>
        <div class="col-xs-2"><input type="text" name="SummarizeCount" id="SummarizeCount" readonly=true value="<?php echo is_numeric($data['ObservationDetail']->SummarizeCount) ? $data['ObservationDetail']->SummarizeCount : 0 ; ?>"/></div>
    </div>


</div>
 <div class="form-group">
        <label for="Notes">Additional Notes</label>
		<textarea id="Notes" name="Notes" class = "form-control"></textarea>
    </div>

<input id="Submit1" class="btn btn-primary" type="submit" value="submit" />

     <br /><br />
</div>
</form>
    </div>
