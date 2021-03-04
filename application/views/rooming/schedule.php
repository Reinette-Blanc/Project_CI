<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('rooming/inc/title') ?>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/table.css">
<?php $this->load->view('rooming/inc/script') ?>
<?php $this->load->view('rooming/inc/css') ?>

<body>
	<?php $this->load->view('rooming/inc/header') ?>
	
	<div class="schedule-head" style="text-align:center">
<div class="form-group" style="margin:1rem 0;">
	<span class="text-header">The select date is <?php echo $monthlist[$month]." ".$day.", ".$year; ?></span>
	</div>
	<form method="get" action="<? echo base_url("Schedule")?>" style="display: inline-block; margin:1rem 0;">
		<input type="hidden" id="date" name="date" value="<?php echo $date;?>">
		<label for="roomid">Choose a meeting room :</label>
		<select name="roomid" id="roomid" class="custom-select">
			<?php foreach ($rooms as $room) { ?>
				<option value=<?php echo $room['room_id'] ?>> <?php echo $room['room_name']; ?> </option>
			<?php } ?>
		</select>
		<button class="btn btn-primary" type="submit"> Go </button>
	</form>

	

	</div>

	<div class="table-center">
		<table>
			<?php for($i = 0; $i < count($starttime)-1; $i++) {?>
				<tr>
					<th><?php echo $time[$i];?></th>
					<?php foreach($reserves as $reserve) {
						if ($reserve['start']==$starttime[$i])
						{
							echo '<td colspan="4" rowspan="'.$reserve['length'].'" class="';
							if($reserve['subject']=="Free")
							{
								echo 'stage-mercury';
							}
							else
							{
								echo 'stage-venus';
							}
							echo '"';
							if($reserve['length']>=3)
							{
								echo 'style = "font-size:1.20rem;"';
							}
							echo '>';
							if($reserve['subject']=="Free")
							{?>
								<form method="post" action="<? echo base_url("Book")?>">
									<input type="hidden" id="starttime" name="starttime" value="<?php echo $reserve['start'];?>">
									<input type="hidden" id="length" name="length" value="<?php echo $reserve['length'];?>">
									<input type="hidden" id="date" name="date" value="<?php echo $date;?>">
									<input type="hidden" id="roomid" name="roomid" value="<?php echo $roomid;?>">
									<input id="booking" type="submit" value="Click here to book the meeting room.">
								</form>
							<?php
							}
							else
							{
								echo $reserve['subject'].'<span>Reserved by '.$reserve['reserver'].'</span></td>';
							}	
						}
					}?>
				</tr>
			<?php }?>
		
		</table>
	</div>
</body>

<script>
	document.getElementById("roomid").value = <?php echo $_GET['roomid']; ?>;
</script>

</html>