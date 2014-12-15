<?php include 'app/templates/default/menu.php';?>
<!--
index.php

This is the index.php view for the Home controller

-->
<div class="container-fluid">
<h1>Classroom Observations</h1>
<br />

<br />

<?php if ($data['ObsBackgrounds']) { ?>
 <table class="table table-condensed table-striped">
 <?php foreach($data['ObsBackgrounds'] as $row){ ?>
         <tr>
			 <td ><?php echo $row->ClassName ?></td>
             <td><?php echo date_format(date_create($row->ObservationDate),"m-d-Y") ?></td>
             <td><a href="<?php echo DIR ?>observation/backgroundInformation/<?php echo $row->ObservationID ?>"  class="btn btn-large">EDIT</a></td>
         </tr>  
      <?php } ?>
        </table>
<?php } ?>


</div>
<?php
/*
	echo '<pre>';
	print_r($data['poqtypes']);
	echo '</pre>';
	*/
?>


