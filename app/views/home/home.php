<?php include 'app/templates/default/menu.php';?>

<div class="container-fluid">
<h1>Classroom Observations</h1>
<br />


<br />
	<?php if($data['ObsBackgrounds']){ ?>
	
    <table class="table table-striped">
 <?php foreach($data['ObsBackgrounds'] as $row){ ?>
         <tr>
             <td ><?php echo $row->ObservationID ?></td>
             <td><?php echo date_format(date_create($row->ObservationDate),"m-d-Y") ?></td>
             <td><a href="<?php echo DIR ?>observation/backgroundInformation/<?php echo $row->ObservationID ?>"  class="btn btn-large">EDIT</a></td>
         </tr>  
      <?php } ?>
        </table>
	<?php	}?>
		
</div>

<?php
	/*if($data['ObsBackgrounds']){
		foreach($data['ObsBackgrounds'] as $row){
		echo $row->ObservationID.' -- '.$row->ObservationDate.'<br />';
		}
	}
	
	
	echo '<pre>';
	print_r($data['poqtypes']);
	echo '</pre>';
	*/
?>


